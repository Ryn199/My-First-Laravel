<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Project1Controller extends Controller
{
    public function hom(){
        return view('home');
    }
    public function nama(){
        return "Muhammad Ridho Yudiana";
    }
    public function prodi(){
        return "Teknologi Informasi";
    }

}
