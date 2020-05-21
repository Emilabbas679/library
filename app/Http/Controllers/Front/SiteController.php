<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
//        $file = file_get_contents('mail.docx', true);

        return view('site.index');
    }
}
