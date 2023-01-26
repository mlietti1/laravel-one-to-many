@extends('layouts.app')

@section('title')
    | Admin
@endsection

@section('content')
<div class="container py-3">

    <h1 class="my-3">Types manager</h1>

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif

    <div class="w-50">
        <form  action="{{route('admin.projects.store')}}" method="POST">
            @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="New type">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                            <i class="fa-solid fa-circle-plus"></i>
                            Add</button>
                    </div>
        </form>
    </div>
    <table class="table w-50">
        <tr>
            <th scope="col">Type</th>
            <th scope="col">Project Count</th>
        </tr>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td class="d-flex">
                        <form action="{{route('admin.projects.update', $project)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input class="border-0" type="text" name="name" value="{{$project->name}}">
                            <button type="submit" class="btn btn-warning me-3">Update</button>
                        </form>
                        @include('admin.partials.form-delete',[
                            'route' => 'types',
                            'message' => "Are you sure you want to delete the type: $type->name ?",
                            'entity' => $type])
                    </td>
                    <td>{{count($type->projects)}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
