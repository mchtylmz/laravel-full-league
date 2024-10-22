<?php

namespace App\Livewire\News;

use App\Actions\News\CreateOrUpdateCategoryAction;
use App\Models\Category;
use App\Traits\CustomLivewireAlert;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class CategoryForm extends Component
{
    use CustomLivewireAlert;

    public ?Category $category;

    public string $name;
    public ?string $description;
    public ?string $keywords;

    public string $slug;

    public string $permission = 'category:add';

    public function mount(int $categoryId = 0): void
    {
        $this->category = Category::find($categoryId);
        if (!empty($this->category) && $this->category->exists) {
            $this->name = $this->category->name;
            $this->slug = $this->category->slug;
            $this->description = $this->category->description;
            $this->keywords = $this->category->keywords;

            $this->permission = 'category:update';
        }
    }

    public function updatedName(): void
    {
        $this->slug = Str::slug($this->name);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'slug' => [
                'required',
                'string',
                'min:3',
                Rule::unique('categories', 'slug')->ignore($this->category->id ?? 0)
            ],
            'description' => 'nullable|string',
            'keywords' => 'nullable|string',
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'name' => __('Kategori Adı'),
            'slug' => __('Kategori kısa url (slug)'),
            'description' => __('Açıklama'),
            'keywords' => __('Anahtar Kelimeler')
        ];
    }

    public function save()
    {
        $this->validate();

        if (user()->cannot($this->permission)) {
            $this->message(__('Kategori kayıt edilemez, yetkiniz bulunmuyor!'))->error();
            return false;
        }

        CreateOrUpdateCategoryAction::run(
            data: [
                'name' => $this->name,
                'slug' => $this->slug,
                'description' => $this->description ?? '',
                'keywords' => $this->keywords ?? '',
            ],
            category: !empty($this->category) && $this->category->exists ? $this->category : null,
        );

        return redirect()->route('admin.news.category')->with([
           'status' => 'success',
            'message' => __('Kategori kayıt edildi')
        ]);
    }

    public function render()
    {
        return view('livewire.backend.news.category-form');
    }
}
