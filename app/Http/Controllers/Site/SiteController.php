<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index() {
        // return view('vendor.adminlte.login');
        return view('introduction');
    }

    public function teste() {
        return view('teste');
    }
}
