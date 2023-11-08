<?php

namespace App\Http\Controllers\Admin\Home;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $boards = Board::with('members')->where('status', StatusEnum::ACTIVE)->get();

        /*
        $board = Board::find(1);
        $board->members()->create([
            'first_name' => 'İsim 1',
            'last_name' => 'soyisim 1',
            'position_tr' => 'pozisyon 1',
            'position_en' => 'pozisyon en',
            'grid' => 6,
            'sort' => 2,
            'status' => StatusEnum::ACTIVE
        ]);
        */

        return view('admin.home.index', compact('boards'));
    }
}
