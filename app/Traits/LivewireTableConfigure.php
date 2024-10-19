<?php

namespace App\Traits;

use Rappasoft\LaravelLivewireTables\Views\Column;

trait LivewireTableConfigure
{
    public function configure(): void
    {
        $class = get_class($this);

        $this
            ->setPrimaryKey('id')
            ->setPerPageAccepted([$this->defaultPerPage ?? 20, 25, 25, 50, 100])
            ->setDefaultPerPage($this->defaultPerPage ?? 20)
            ->setSingleSortingEnabled()
            ->setUseHeaderAsFooterEnabled()
            ->setHideBulkActionsWhenEmptyEnabled()
            ->enableAllEvents()
            ->setLoadingPlaceholderEnabled()
            ->setLoadingPlaceholderContent(__('Yükleniyor...'))
            ->setFilterLayoutSlideDown()
            ->setEagerLoadAllRelationsStatus(true)
            ->setQueryStringDisabled()
            ->setShouldRetrieveTotalItemCountEnabled()
            ->setQueryStringEnabled()
            ->useComputedPropertiesDisabled();

        // UserTable
        if (str_contains($class, 'UserTable')) {
            $this
                ->setDefaultSort('id', 'desc')
                ->setAdditionalSelects(['*']);
        }

        // RoleTable
        if (str_contains($class, 'RoleTable')) {
            $this->setThAttributes(
                fn(Column $column) => $column->isField('id') ? ['class' => 'mw-100 w-50'] : []
            );
        }
    }
}
