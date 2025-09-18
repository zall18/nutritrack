<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('testPage.page1', [
            'title' => 'Dashboard',
            'breadcrumb' => ['Home' => route('dashboard'), 'Dashboard' => null],
        ]);
    }
}
