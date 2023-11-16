<?php

namespace App\Repositories\Admin\Season;

use App\Models\Season;

class SeasonRepository
{
    public $data;

    public function all()
    {
        return $this->data = Season::all();
    }

    public function active()
    {
        return $this->data = Season::active()->get();
    }
}
