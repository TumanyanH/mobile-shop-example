@extends('layouts.admin')

@section('content')

<div class="container">
    <a href="{{ route('admin.brands.create') }}">+ Create new </a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                <i class="material-icons">branding_watermark</i>
                </div>
                <h4 class="card-title">Brands</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Brand name</th>
                        <th class="text-right">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands_list as $brand)
                    <tr>
                        <td>
                            <img style="width: 100px;" src="/uploads/brands/{{ $brand->logo }}" alt="">
                        </td>
                        <td>
                        {{ $brand->name }}
                        </td>
                        
                        <td class="td-actions text-right">
                            <a href="{{ route('admin.brands.edit', ['brand' => $brand->id]) }}" class="btn btn-success" style="color: white;">
                                <i class="material-icons">edit</i>
                            </a>
                            <a href="{{ route('admin.brands.destroy', ['brand' => $brand->id]) }}" class="btn btn-danger" style="color: white;">
                                <i class="material-icons">close</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        
</div>

@endsection

@section('scripts')

<script>
$(document).ready(function() {
    @if(Session::get('added'))
    alert()
    @endif
})
</script>

@endsection