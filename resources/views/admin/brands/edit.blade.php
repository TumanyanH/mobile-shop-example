@extends('layouts.admin')

@section('content')

<div class="container">
    @include('admin.brands.form', ['url' => 'admin.brands.update', 'brand_id' => $brand->id])
</div>

@endsection