<?php

namespace App\Actions\Files;

use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\UploadedFile;

class UploadFileAction
{
    use AsAction;

    public function handle(UploadedFile $file, string $folder = '/')
    {
        $filename = $this->name($file->getClientOriginalName());

        if (!str_starts_with($folder, '/')) {
            $folder = '/' . $folder;
        }
        if (!str_ends_with($folder, '/')) {
            $folder = $folder . '/';
        }

        if ($file->storeAs($folder, $filename, 'public')) {
            return sprintf('uploads%s%s', $folder, $filename);
        }

        return false;
    }

    protected function name(string $name): string
    {
        return sprintf(
            '%s-%s.%s',
            date('YmdHi'),// Str::slug(pathinfo($name, PATHINFO_FILENAME)),
            Str::random(12),
            pathinfo($name, PATHINFO_EXTENSION)
        );
    }
}
