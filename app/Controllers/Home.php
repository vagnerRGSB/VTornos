<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function principal()
    {
        return view('home/principal', [], [
            "cache" => 60,
            "cache_name" => "tela_principal"
        ]);
    }
}
