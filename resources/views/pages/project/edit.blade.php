@extends('layouts.main-layout')

@section('content')
    
    <h1>Edit Project</h1>
    <form method="POST" action="{{ route('project.update') }}">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name">
        <br>
        <label for="description">Description</label>
        <input type="text" name="description">
        <br>
        <label for="main_image">image</label>
        <input type="text" name="main_image">
        <br>
        <label for="release_date">release date</label>
        <input type="date" name="release_date">
        <br>
        <label for="repo_link">repo link</label>
        <input type="text" name="repo_link">
        <br>
        
        <input type="submit" value="EDIT">
    </form>

@endsection