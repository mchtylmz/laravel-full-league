<?php

namespace App\Livewire\Users;

use App\Enums\RoleTypeEnum;
use App\Enums\StatusEnum;
use App\Models\User;
use App\Traits\CustomLivewireAlert;
use App\Traits\LivewireTableConfigure;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ArrayColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\WireLinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use App\Models\Role;

class UserTable extends DataTableComponent
{
    use CustomLivewireAlert, LivewireTableConfigure;

    protected $model = User::class;

    public function builder(): Builder
    {
        return User::with('roles')->where('has_login', 1);
    }

    public function filters(): array
    {
        return [
            MultiSelectFilter::make(__('Yetkiler'))
                ->options(
                    Role::orderBy('name')
                        ->get()
                        ->keyBy('name')
                        ->map(fn($role) => $role->name)
                        ->toArray()
                )
                ->filter(function(Builder $builder, array $value) {
                    $builder->role($value);
                }),

            SelectFilter::make(__('Durum'), 'status')
                ->options(['' => __('Tümü'), ...StatusEnum::options()])
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('users.status', $value);
                }),

            DateRangeFilter::make(__('Son Giriş'))
                ->config([
                    'placeholder' => __('Tarih Seçiniz'),
                    'locale' => app()->getLocale(),
                ])
                ->filter(function (Builder $builder, array $dateRange) { // Expects an array.
                    $builder
                        ->whereDate('users.last_login_at', '>=', $dateRange['minDate'])
                        ->whereDate('users.last_login_at', '<=', $dateRange['maxDate']);
                }),

            DateRangeFilter::make(__('Kayıt Tarihi'))
                ->config([
                    'placeholder' => __('Tarih Seçiniz'),
                    'locale' => app()->getLocale(),
                ])
                ->filter(function (Builder $builder, array $dateRange) { // Expects an array.
                    $builder
                        ->whereDate('users.created_at', '>=', $dateRange['minDate'])
                        ->whereDate('users.created_at', '<=', $dateRange['maxDate']);
                }),
        ];
    }

    public function columns(): array
    {
        return [
            ArrayColumn::make(__('Yetki'), 'name')
                ->data(fn($value, $row) => $row->getRoleNames())
                ->outputFormat(fn($index, $value) => $value)
                ->separator('<br>')
                ->emptyValue('-'),
            Column::make(__('Kullanıcı Adı'), "username")
                ->searchable()
                ->sortable(),
            Column::make(__('Ad Soyad'), "name")
                ->searchable()
                ->collapseOnMobile()
                ->sortable(),
            Column::make(__('E-posta Adresi'), "email")
                ->searchable()
                ->collapseOnMobile()
                ->sortable(),
            ComponentColumn::make(__('Durum'), "status")
                ->collapseOnMobile()
                ->component('table.status')
                ->attributes(fn ($value, $row, Column $column) => [
                    'type' => $value->class(),
                    'label' => $value->name(),
                ])
                ->searchable()
                ->sortable(),
            Column::make(__('Son Giriş'), "last_login_at")
                ->collapseOnMobile()
                ->format(fn ($value) => !$value ?: Carbon::parse($value)->isoFormat('DD MMM YYYY HH:mm'))
                ->sortable(),
        ];
    }

    public function appendColumns(): array
    {
        return [
            LinkColumn::make(__('Düzenle'))
                ->collapseOnMobile()
                ->title(fn($row) => sprintf('<i class="fa fa-user mx-1"></i> %s', __('Görüntüle')))
                ->location(fn($row) => route('admin.users.edit', $row->id))
                ->attributes(fn($row) => ['class' => 'btn btn-info btn-sm'])
                ->html(),

            WireLinkColumn::make(__('Sil'))
                ->collapseOnMobile()
                ->hideIf(auth()?->user()->cannot('users:delete'))
                ->title(fn($row) => sprintf('<i class="fa fa-trash-alt mx-1"></i> %s', __('Sil')))
                ->confirmMessage(__('Kullanıcı silinecektir, işleme devam edilsin mi?'))
                ->action(fn($row) => 'delete("'.$row->id.'")')
                ->attributes(fn($row) => ['class' => 'btn btn-danger btn-sm'])
                ->html(),
        ];
    }

    public function delete(User $user)
    {
        if (auth()->user()->cannot('users:delete')) {
            $this->message(__('Kullanıcı silinemez, yetkiniz bulunmuyor!'))->toast(true)->error();
            return false;
        }

        if ($user->id == auth()->id()) {
            $this->message(__('Kendi kullanıcınızı silemezsiniz!'))->toast(true)->error();
            return false;
        }

        $this->message(__('Kullanıcı silindi!'))->toast(true)->success();

        return $user->delete();
    }
}
