<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    /**
     * Switch application language locale.
     */
    public function switch(Request $request, string $locale): RedirectResponse
    {
        $cookie = null;

        if (in_array($locale, ['id', 'en'], true)) {
            $request->session()->put('locale', $locale);
            $request->session()->save();
            $cookie = cookie('app_locale', $locale, 60 * 24 * 365);
        }

        $referer = $request->headers->get('referer');

        $response = ($referer && ! str_contains($referer, '/lang/'))
            ? redirect()->to($referer)
            : redirect()->route('home');

        if ($cookie !== null) {
            $response->withCookie($cookie);
        }

        return $response;
    }
}
