@extends('admin.layouts.layout')
@section('content')
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Brand ADD</h4>
            <h6>Create new Brand</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="">
                <div class="col-lg-12 col-sm-12 col-12">
                    <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <label>Brand Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Product Image</label>
                            <div class="image-upload" style="overflow:hidden">
                                <input type="file" name="image_path" id="imageInput">
                                <div class="image-uploads" >
                                    <img id="uploadedImage"  src="{{ asset('assets/img/icons/upload.svg') }}" alt="Uploaded Image">
                                </div>
                            </div>
                        </div>
                        <div class="form-group  display: flex;
                        justify-content: space-between;
                        align-items: center;">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('admin.brand.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
