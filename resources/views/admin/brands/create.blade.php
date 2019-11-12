@extends('layouts.admin')

@section('content')
<div class="container">
    @include('admin.brands.form', ['url' => 'admin.brands.store']) 
</div>

@endsection