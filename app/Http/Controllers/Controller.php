<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    public function __construct(Request $request)
    {
        $this->middleware(function($request, $next){
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            if (session('info')) {
                Alert::info(session('info'));
            }

            if (session('warning')) {
                Alert::warning(session('warning'));
            }

            if (session('toast_success')) {
                Alert::toast(session('toast_success'), 'success');
            }

            if (session('toast_error')) {
                Alert::toast(session('toast_error'), 'error');
            }

            return $next($request);
        });
    }
}
