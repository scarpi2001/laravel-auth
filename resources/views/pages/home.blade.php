@extends('layouts.main-layout')

@section('content')

{{-- lista completa progetti --}}
<h1>Projects</h1>
<ul>
    @foreach ($projects as $project)
        <a href="{{ route('project.show', $project) }}">
            <li>
                <h1>
                    {{ $project -> name }}
                </h1>
                <img src="{{ asset('storage/' . $project -> main_image) }}" alt="{{ $project -> name }}">
            </li>
        </a>
    @endforeach
</ul>


@endsection