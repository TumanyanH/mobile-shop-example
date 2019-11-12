@extends('layouts.admin')

@section('content')

<div class="container">
    <h2 class="title">{{ $brand->name }}</h2>
    <img width="200px" src="/uploads/brands/{{ $brand->logo }}" alt="">
</div>

@endsection