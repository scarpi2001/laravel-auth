@extends('layouts.main-layout')

@section('content')

{{-- form crea nuovo progetto --}}
<h1>New Project</h1>
    <form method="POST" action="{{ route('project.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name">
        <br>
        <label for="description">Description</label>
        <input type="text" name="description">
        <br>
        <label for="main_image">image</label>
        <input type="file" name="main_image">
        <br>
        <label for="release_date">release date</label>
        <input type="date" name="release_date">
        <br>
        <label for="repo_link">repo link</label>
        <input type="text" name="repo_link">
        <br>
        
        <input type="submit" value="CREATE NEW PROJECT">
    </form>

    {{-- lista progetti --}}
    <ul>
        @foreach ($projects as $project)
            <li>
                {{ $project -> name }}

                {{-- delete --}}
                <a href="{{ route('project.delete', $project) }}">X</a>

                {{-- edit --}}
                <a href="{{ route('project.edit', $project) }}">edit</a>
            </li>
        @endforeach
    </ul>
    

@endsection