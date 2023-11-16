<?php

namespace App\Traits;

use Pharaonic\Laravel\Uploader\Upload;

trait HasPhotoBelongsTrait
{
    public function photo()
    {
        return $this->belongsTo(Upload::class, 'upload_id');
    }
}
