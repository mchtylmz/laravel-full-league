<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        if (user()->cannot('news:view')) {
            abort(403, __('Haberler sayfası görüntülenemez, yetkiniz bulunmuyor!'));
        }

        return view('backend.news.index', [
            'title' => __('Haberler'),
        ]);
    }

    public function create()
    {
        if (user()->cannot('news:add')) {
            abort(403, __('Haber ekleme sayfası görüntülenemez, yetkiniz bulunmuyor!'));
        }

        return view('backend.news.create', [
            'title' => __('Haber Ekle')
        ]);
    }

    public function edit(News $news)
    {
        if (user()->cannot('news:update')) {
            abort(403, __('Haber düzenleme sayfası görüntülenemez, yetkiniz bulunmuyor!'));
        }

        return view('backend.news.edit', [
            'title' => __('Haber Düzenle'),
            'news' => $news,
        ]);
    }

    public function category()
    {
        if (user()->cannot('category:view')) {
            abort(403, __('Kategori sayfası görüntülenemez, yetkiniz bulunmuyor!'));
        }

        return view('backend.news.category', [
            'title' => __('Haber Kategorileri'),
        ]);
    }
}
