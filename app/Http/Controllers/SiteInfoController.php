<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteInfoController extends Controller
{
    public function indexWithPrivacy()
    {
        return view("site.privacy.index");
    }
    public function indexWithInfo()
    {
        return view("site.info.index");
    }

}
