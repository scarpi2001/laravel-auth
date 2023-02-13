@extends('layouts.main-layout')

@section('content')
    
    {{-- dati accurati progetto --}}
    <h1>Project: {{ $project -> name }}</h1>
    <img src="{{ asset('storage/' . $project -> main_image) }}" alt="{{ $project -> name }}">
    <h3>Release date: {{ $project -> release_date }}</h3>
    <h2>
        Description:
        {{ 
            $project -> description 
            ? $project -> description 
            : " - no description -"
        }}
    </h2>

    {{-- link alla repo --}}
    <h4>
        repo link: 
        <a href="{{ $project -> repo_link }}">
            GitHub
        </a>
    </h4>

@endsection