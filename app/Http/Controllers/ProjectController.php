<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Project;

class ProjectController extends Controller
{
    //SHOW
    public function projectShow(Project $project) {

        return view('pages.project.show', compact('project'));
    }
    
    //CREATE
    public function projectStore(Request $request) {

        $data = $request -> validate([
            'name' => 'required|string|max:64|unique:projects,name',
            'description' => 'nullable|string',
            'main_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'release_date' => 'required|date|before:today',
            'repo_link' => 'required|url|unique:projects,repo_link',
        ]);
        
        $img_path = Storage::put('uploads', $data['main_image']);
        $data['main_image'] = $img_path;
        
        $project = new Project();
            
        $project -> name = $data['name'];
        $project -> description = $data['description'];
        $project -> main_image = $data['main_image'];
        $project -> release_date = $data['release_date'];
        $project -> repo_link = $data['repo_link'];
    
        $project -> save();

        // $project = Project::create($data);
    
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
            'name' => 'required|string|max:64',
            'description' => 'nullable|string',
            'main_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'release_date' => 'required|date|before:today',
            'repo_link' => 'required|url|',
        ]);
        
        $img_path = Storage::put('uploads', $data['main_image']);
        $data['main_image'] = $img_path;

        $project -> name = $data['name'];
        $project -> description = $data['description'];
        $project -> main_image = $data['main_image'];
        $project -> release_date = $data['release_date'];
        $project -> repo_link = $data['repo_link'];
    
        $project -> save();

        // $project -> update($data);
        // $project -> save();
    
        return redirect() -> route('admin');
    }
}
