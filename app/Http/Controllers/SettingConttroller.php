<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;

class SettingConttroller extends Controller
{
    public function switchLang($lang)
    {
        if (Arr::has(config('languages'), $lang)) {
            session()->put('applocale', $lang);
        }

        return back();
    }

    public function switchMode($mode)
    {
        if (Arr::has([0, 1], $mode)) {
            session()->put('isDark', $mode);
        }

        return back();
    }
}
