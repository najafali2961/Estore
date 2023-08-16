@extends('admin.layouts.layout')

@section('content')
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Supplier Management</h4>
            <h6>Edit Supplier</h6>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.supplier.update', $supplier->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Add the method field for PUT request -->

                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="supplier_name">Supplier Name</label>
                            <input type="text" id="supplier_name" name="supplier_name" class="form-control" required value="{{ $supplier->supplier_name }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required value="{{ $supplier->email }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control" required value="{{ $supplier->phone }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="country">Choose Country</label>
                            <select id="country" name="country" class="form-control">
                                <option value="">Choose Country</option>
                                <option value="India" @if($supplier->country === 'India') selected @endif>India</option>
                                <option value="Pakistan" @if($supplier->country === 'Pakistan') selected @endif>Pakistan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="city">City</label>
                            <select id="city" name="city" class="form-control">
                                <option value="">Choose City</option>
                                <option value="City 1" @if($supplier->city === 'City 1') selected @endif>City 1</option>
                                <option value="City 2" @if($supplier->city === 'City 2') selected @endif>City 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" required value="{{ $supplier->address }}">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control">{{ $supplier->description }}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Update</button>
                        <a href="{{ route('admin.supplier.index') }}" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
