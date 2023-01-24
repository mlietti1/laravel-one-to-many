@extends('layouts.app')

@section('title')

| Admin

@endsection

@section('content')
<div class="container py-4">

    <h1>My projects</h1>

    @if (session('deleted'))
        <div class="alert alert-success" role="alert">
            {{session('deleted')}}
        </div>
    @endif



    <table class="table">
        <thead>
            <tr>
                <th scope="col"><a href="{{route('admin.projects.orderby', ['id', $direction])}}">ID</a></th>
                <th scope="col"><a href="{{route('admin.projects.orderby', ['name', $direction])}}">Name</a></th>
                <th scope="col"><a href="{{route('admin.projects.orderby', ['client_name', $direction])}}">Client name</a></th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
            <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->name}}</td>
                <td>{{$project->client_name}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('admin.projects.show', $project)}}" title="show"><i class="fa-regular fa-eye"></i></a>
                    <a class="btn btn-warning " href="{{route('admin.projects.edit', $project)}}" title="edit"><i class="fa-solid fa-pencil"></i></a>
                    {{-- qui partial delete --}}
                    @include('admin.partials.form-delete')
                </td>
            </tr>
            @empty

            <tr>
                <td colspan="4"><h3>No projects found</h3></td>
            </tr>

            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$projects->links()}}
    </div>
</div>
@endsection
