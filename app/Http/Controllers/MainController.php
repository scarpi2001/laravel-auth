<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class MainController extends Controller
{
    //INDEX
    public function home() {

        $projects = Project :: all();

        return view('pages.home', compact('projects'));
    }

    //ADMIN
    public function admin() {
        return view('pages.admin');
    }
    
}
