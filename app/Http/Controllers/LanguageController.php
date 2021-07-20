<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request){
        $language = config('app.locale');
        if ($request->language != $language) {
            $language = $request->language;
        }
        Session::put('language', $language);

        return redirect()->back();
    }
}
