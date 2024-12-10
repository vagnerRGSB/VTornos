<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function principal()
    {
        return view('home/principal', []);
    }
}
