<?php

namespace App\Actions\News;

use App\Models\News;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateOrUpdateNewsAction
{
    use AsAction;

    public function handle(array $data, ?News $news = null)
    {
        if (is_null($news)) {
            $news = News::create($data);
        } else {
            $news->update($data);
        }

        return $news;
    }
}
