<?php

namespace App\Actions\Settings;

use App\Actions\Files\UploadFileAction;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Lorisleiva\Actions\Concerns\AsAction;

class SettingSaveAction
{
    use AsAction;

    protected array $data = [];

    public function handle(Request $request)
    {
        if ($request->hasFile('images')) {
            $this->images($request->file('images'));
        }

        if ($request->get('settings')) {
            $this->settings($request->get('settings'));
        }

        settings()->set($this->data);
        settings()->save();

        // TODO: log
    }

    protected function images(Array $images): void
    {
        foreach ($images as $key => $image) {
            if ($image = UploadFileAction::run(file: $image)) {
                $this->data[$key] = $image;
            }
        }
    }

    protected function settings(array $settings): void
    {
        foreach ($settings as $key => $value) {
            $this->data[$key] = trim($value);
        }
    }
}
