@extends('admin.layouts.layout')
@section('content')
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Product List</h4>
            <h6>Manage your products</h6>
        </div>
        <div class="page-btn">
            <a href="{{route('admin.product.create')}}" class="btn btn-added"><img src="{{asset('assets/img/icons/plus.svg')}}" alt="img"
                    class="me-1">Add New Product</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-path">
                        <a class="btn btn-filter" id="filter_search">
                            <img src="{{asset('assets/img/icons/filter.svg')}}" alt="img">
                            <span><img src="{{asset('assets/img/icons/closes.svg')}}" alt="img"></span>
                        </a>
                    </div>
                    <div class="search-input">
                        <a class="btn btn-searchset"><img src="{{asset('assets/img/icons/search-white.svg')}}"
                                alt="img"></a>
                    </div>
                </div>

            </div>

            <div class="table-responsive">
                <table class="table datanew">
                    <thead>
                        <tr>
                            {{-- <th>
                                <label class="checkboxs">
                                    <input type="checkbox" id="select-all">
                                    <span class="checkmarks"></span>
                                </label>
                            </th> --}}
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Unit</th>
                            <th>Qty</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            {{-- <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td> --}}

                            <td class="productimgname"> <img style="height: 70px; width:70px;" src="{{ $product->product_image }}" alt="product"></td>

                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->category }}</td>

                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->unit }}</td>
                            <td>{{ $product->minimum_qty }}</td>

                            <td>
                                <a class="me-3" href="{{ route('admin.product.edit', $product->id) }}">
                                    <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                </a>
                             <a href="{{ route('admin.product.destroy', $product->id) }}" class="delete-item">
                                <img src="{{asset('assets/img/icons/delete.svg')}}" alt="img"></a>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection
