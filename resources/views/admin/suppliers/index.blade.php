@extends('admin.layouts.layout')
@section('content')
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Supplier List</h4>
            <h6>Manage your Suppliers</h6>
        </div>
        <div class="page-btn">
            <a href="{{route('admin.supplier.create')}}" class="btn btn-added"><img src="{{asset('assets/img/icons/plus.svg')}}"
                    alt="img">Add Supplier</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">

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
                            <th>
                                <label class="checkboxs">
                                    <input type="checkbox" id="select-all">
                                    <span class="checkmarks"></span>
                                </label>
                            </th>
                            <th>Supplier Name</th>


                            <th>Phone</th>
                            <th>email</th>
                            <th>Address</th>
                            <th>Country</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $supplier)
                        <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>

                            <td>{{ $supplier->supplier_name }}</td>


                            <td>{{ $supplier->phone }}</td>
                            <td><a href="{{ $supplier->emailLink }}" class="__cf_email__">{{ $supplier->email }}</a></td>
                            <td>{{ $supplier->address }}</td>
                            <td>{{ $supplier->country }}</td>
                            <td>
                                <a class="me-3" href="{{ route('admin.supplier.edit', $supplier->id) }}">
                                    <img src="{{asset('assets/img/icons/edit.svg')}}" alt="img">
                                </a>

                             <a href="{{ route('admin.supplier.destroy', $supplier->id) }}" class="delete-item"> <img src="{{asset('assets/img/icons/delete.svg')}}" alt="img"></a>
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
