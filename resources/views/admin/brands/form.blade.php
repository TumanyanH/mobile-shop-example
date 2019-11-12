@php 
$args = [];
if($brand) {
    $args['brand'] = $brand_id;
}
@endphp

<form action="{{ route($url, $args) }}" enctype="multipart/form-data"> 
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @csrf
    <div class="form-group">
        <h4 class="title">Brand logo</h4>
        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
            <div class="fileinput-new thumbnail">
                <img src="{{ $brand->logo ? '/uploads/brands/'.$brand->logo : '/assets/img/image_placeholder.jpg' }}">
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail"></div>
            <div>
                <span class="btn btn-rose btn-round btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="logo">
                </span>
                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 col-form-label">Brand name</label>
            <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                <input type="text" class="form-control" name="name" value="{{ $brand->name ?? $brand->name }}">
                <span class="bmd-help">Type here the full name that you want to be displayed with products.</span>
            </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-fill btn-rose">Submit<div class="ripple-container"></div></button>
</form>