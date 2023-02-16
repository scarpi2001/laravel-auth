<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Project;

class MainController extends Controller
{
    //HOME
    public function home() {

        $projects = Project :: orderBy('created_at', 'DESC') -> get();
        return view('pages.home', compact('projects'));
    }

    //ADMIN
    public function admin() {
        $projects = Project :: orderBy('created_at', 'DESC') -> get();
        return view('pages.admin', compact('projects'));
    }

}
