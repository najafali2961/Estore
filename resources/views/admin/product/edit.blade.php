@extends('admin.layouts.layout')
@section('content')
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Product Edit</h4>
            <h6>Edit product</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input name="product_name" type="text" value="{{ $product->product_name }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="select" id="categoryDropdown">
                                <option>Choose Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Subcategory</label>
                            <select name="sub_category" class="select" id="subcategoryDropdown">
                                <option>Choose Subcategory</option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" data-category="{{ $subcategory->category_id }}" {{ $product->sub_category == $subcategory->id ? 'selected' : '' }}>
                                        {{ $subcategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Brand</label>
                            <select name="brand" class="select" id="brandDropdown">
                                <option>Choose Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $product->brand == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Unit</label>
                            <select name="unit" class="select">
                                <option>Choose Unit</option>
                                <option value="pc" {{ $product->unit == 'pc' ? 'selected' : '' }}>pc</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>SKU</label>
                            <input type="text" name="sku" value="{{ $product->sku }}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" name="minimum_qty" value="{{ $product->minimum_qty }}">
                        </div>
                    </div>
                    <!-- Other fields with values populated from $product object -->

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="quantity_description">{{ $product->quantity_description }}</textarea>
                        </div>
                    </div>
                    <!-- Other fields with values populated from $product object -->

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Tax</label>
                            <select name="tax" class="select" id="taxSelect">
                                <option>Choose Tax</option>
                                <option value="2" {{ $product->tax == 2 ? 'selected' : '' }}>Tax Option 2</option>
                            </select>
                        </div>
                    </div>
                    <!-- Other fields with values populated from $product object -->

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Discount Type</label>
                            <select name="discount_type" class="select" id="discountSelect">
                                <option>Percentage</option>
                                <option value="2" {{ $product->discount_type == 2 ? 'selected' : '' }}>Discount Type 2</option>
                            </select>
                        </div>
                    </div>
                    <!-- Other fields with values populated from $product object -->

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" value="{{ $product->price }}">
                        </div>
                    </div>
                    <!-- Other fields with values populated from $product object -->

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="select" name="status">
                                <option value="Closed" {{ $product->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                                <option value="Open" {{ $product->status == 'Open' ? 'selected' : '' }}>Open</option>
                            </select>
                        </div>
                    </div>
                    <!-- Other fields with values populated from $product object -->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Product Image</h5>
                            </div>
                            <div class="card-body">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Upload Product Image <a href="javascript:void(0)"
                                            class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                            accept="image/*" name="product_image">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview">
                                        @if ($product->product_image)
                                            <img src="{{ asset($product->product_image) }}" alt="Product Image">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" value="submit" class="btn btn-submit me-2">Submit</button>
                        <a href="{{ route('admin.product.index') }}" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

