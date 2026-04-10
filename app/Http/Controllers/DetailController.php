<?php

namespace App\Http\Controllers;

class DetailController extends Controller
{
    public function index($slug = null)
    {
        return view('pages.detail');
    }
}
