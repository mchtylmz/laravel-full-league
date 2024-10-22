<?php

namespace App\Actions\News;

use App\Models\Board;
use App\Models\Category;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateOrUpdateCategoryAction
{
    use AsAction;

    public function handle(array $data, ?Category $category = null)
    {
        if (is_null($category)) {
            $category = Category::create($data);
        } else {
            $category->update($data);
        }

        return $category;
    }
}
