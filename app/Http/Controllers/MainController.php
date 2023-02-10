<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    //SHOW
    public function projectShow(Project $project) {

        return view('pages.project.show', compact('project'));
    }
    
    //CREATE
    public function projectStore(Request $request) {

        $data = $request -> validate([
            'name' => 'required|string|max:64|unique:projects,name',
            'description' => 'nullable|string',
            'main_image' => 'required|url|unique:projects,main_image',
            'release_date' => 'required|date|before:today',
            'repo_link' => 'required|url|unique:projects,repo_link',
        ]);
    
        $project = new Project();
    
        $project -> name = $data['name'];
        $project -> description = $data['description'];
        $project -> main_image = $data['main_image'];
        $project -> release_date = $data['release_date'];
        $project -> repo_link = $data['repo_link'];
    
        $project -> save();
    
        return redirect() -> route('admin');
    }

    //DELETE
    public function projectDelete(Project $project) {

        $project -> delete();
    
        return redirect() -> route('admin');
    }

    //EDIT
    public function projectEdit(Project $project) {

        return view('pages.project.edit', compact('project'));
    }

    public function projectUpdate(Request $request, Project $project) {

        $data = $request -> validate([
            'name' => 'required|string|max:64|unique:projects,name',
            'description' => 'nullable|string',
            'main_image' => 'required|url|unique:projects,main_image',
            'release_date' => 'required|date|before:today',
            'repo_link' => 'required|url|unique:projects,repo_link',
        ]);
    
        $project -> name = $data['name'];
        $project -> description = $data['description'];
        $project -> main_image = $data['main_image'];
        $project -> release_date = $data['release_date'];
        $project -> repo_link = $data['repo_link'];
    
        $project -> save();
    
        return redirect() -> route('admin');
    }
    
    
}
