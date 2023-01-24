@extends('layouts.app')

@section('title')
    | {{$project->title}}
@endsection

@section('content')
<div class="container">

    @if (session('message'))
         <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif




    <h1 class="my-5"> {{$project->title}} <a class="btn btn-warning " href="{{route('admin.projects.edit', $project)}}">EDIT</a> </h1>


    @if($project->cover_image)
        <div>
            <img width="500" src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->cover_image_original_name}}">
            <div><i>{{$project->cover_image_original_name}}</i></div>
        </div>
    @endif

    <img  src="{{ $project->cover_image}}" alt="{{ $project->name }}">



    <p>
        {!!$project->summary!!}
    </p>

    <a class="btn btn-primary" href="{{route('admin.projects.index')}}">Back to index</a>



</div>
@endsection
