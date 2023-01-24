@extends('layouts.app')

@section('content')

<div class="container p-3">

    <h1 class="my-3">Projects list</h1>

    @if (session('deleted'))
        <div class="alert alert-success" role="alert">
            {{session('deleted')}}
        </div>
    @endif



    <table class="table">
        <thead>
          <tr>
            <th scope="col">Type</th>
            <th scope="col">Project</th>
          </tr>
        </thead>
        <tbody>

            @forelse ($types as $type)
            <tr>
                <td>{{$type->name}}</td>
                <td>
                    <ul class="my-2">
                        @foreach ($type->projects as $project)
                            <li>
                                <a href="{{route('admin.projects.show', $project)}}">{{$project->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </td>

            </tr>
            @empty

                <tr>
                    <td colspan="4"><h3>No results</h3></td>
                </tr>

            @endforelse

        </tbody>
      </table>




</div>

</div>


@endsection
