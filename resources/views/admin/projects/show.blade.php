@extends('layouts.app')

@section('title')
    | {{$project->name}}
@endsection

@section('content')
<div class="container py-3">

    @if (session('message'))
         <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif




    <h1 class="my-3"> {{$project->name}} <a class="btn btn-warning " href="{{route('admin.projects.edit', $project)}}">EDIT</a> </h1>

    @if($project->type)
    <span class="mb-3 badge text-bg-info">{{$project->type?->name}}</span>
    <div class="mb-3"><a  href="{{route('admin.types_project')}}">Go to the list of types</a>
    </div>
    @endif

    <div><p><strong>Client:</strong> {{$project->client_name}}</p></div>

    @if($project->cover_image)
        <div>
            <img width="500" src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->cover_image_original_name}}">
            <figcaption>{{$project->cover_image_original_name}}</figcaption>
        </div>
    @endif


    <p>
        {!!$project->summary!!}
    </p>

    <a class="btn btn-primary" href="{{route('admin.projects.index')}}">Back to index</a>



</div>
@endsection
