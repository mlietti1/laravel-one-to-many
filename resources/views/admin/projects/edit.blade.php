@extends('layouts.app')

@section('title')
    | Edit project {{$project->name}}
@endsection

@section('content')


<div class="container py-3">

    <h1 class="my-3">Edit project {{$project->name}}
    </h1>

    @if ($errors->any())

        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>


    @endif

    <form action="{{route('admin.projects.update', $project)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', $project->name)}}" placeholder="Name">
            @error('name')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">Client name</label>
            <input

             type="text" class="form-control @error('client_name') is-invalid @enderror"  id="client_name" name="client_name" value="{{old('client_name', $project->client_name)}}">
            @error('client_name')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror

        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover image</label>
            <input
            onchange="showImage(event)"
             type="file" class="form-control @error('cover_image') is-invalid @enderror"  id="cover_image" name="cover_image" value="{{old('cover_image', $project->cover_image)}}" placeholder="Image URL">
            @error('cover_image')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
            <div class="image mt-2" >
                <img id='output-image' width="150" src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->cover_image_original_name}}">
            </div>
        </div>
          <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <textarea name="summary"  id="summary" rows="10">{{old('summary', $project->summary)}}</textarea>
            @error('summary')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
    </form>

    <div class="my-3">
        <span class="text-danger me-1">Delete Project:</span>
        @include('admin.partials.form-delete')
    </div>


</div>

<script>
ClassicEditor
        .create( document.querySelector( '#summary' ),{
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        })
        .catch( error => {
            console.error( error );
        } );
function showImage(event){
    const tagImage = document.getElementById('output-image');
    tagImage.src = URL.createObjectURL(event.target.files[0]);
}
</script>


@endsection
