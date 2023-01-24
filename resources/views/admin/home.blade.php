@extends('layouts.app')

@section('title')

| Admin

@endsection

@section('content')
<div class="container py-4">
    <h2>Questa è la dashboard di {{ Auth::user()->name }}</h2>
    <div><strong>Email: </strong>{{ Auth::user()->email }}</div>
</div>
@endsection
