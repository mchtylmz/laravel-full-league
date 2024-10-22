<?php

namespace App\Actions\News;

use App\Enums\NewsInfoEnum;
use App\Models\News;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateNewsMetaAction
{
    use AsAction;

    public function handle(News $news, string $key, mixed $data)
    {
        $news->setMeta($key, is_array($data) ? json_encode($data) : $data);

        return $news->getMeta($key);
    }
}
