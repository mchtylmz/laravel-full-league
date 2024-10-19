<?php

namespace App\Http\Controllers\Backend;

use App\Actions\Settings\SettingSaveAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('backend.settings.index', [
            'title' => __('Site Ayarları')
        ]);
    }

    public function user()
    {
        return view('backend.settings.user', [
            'title' => __('Kullanıcı Ayarları')
        ]);
    }

    public function maintenance()
    {
        return view('backend.settings.maintenance', [
            'title' => __('Bakım Ayarları')
        ]);
    }

    public function contact()
    {
        return view('backend.settings.contact', [
            'title' => __('İletişim Ayarları')
        ]);
    }

    public function cookieConsent()
    {
        return view('backend.settings.cookie-consent', [
            'title' => __('Çerez Politikası Ayarları')
        ]);
    }

    public function store(Request $request)
    {
        if ($request->user()->cannot('settings:update')) {
            abort(403, __('Ayarlar güncellenemez, yetkiniz bulunmuyor!'));
        }

        SettingSaveAction::run($request);

        return response()->json([
            'message' => __('Ayarlar başarıyla kayıt edildi'),
            'refresh' => true
        ]);
    }
}
