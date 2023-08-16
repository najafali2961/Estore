@extends('admin.layouts.layout')
@section('content')
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Customer List</h4>
            <h6>Manage your Customers</h6>
        </div>
        <div class="page-btn">
            <a href="{{route('admin.customer.create')}}" class="btn btn-added"><img src="{{asset('assets/img/icons/plus.svg')}}"
                    alt="img">Add Customer</a>
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
                            <th>Customer Name</th>


                            <th>Phone</th>
                            <th>email</th>
                            <th>Address</th>
                            <th>Country</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>

                            <td>{{ $customer->customer_name }}</td>


                            <td>{{ $customer->phone }}</td>
                            <td><a href="{{ $customer->emailLink }}" class="__cf_email__">{{ $customer->email }}</a></td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->country }}</td>
                            <td>
                                <a class="me-3" href="{{ route('admin.customer.edit', $customer->id) }}">
                                    <img src="{{asset('assets/img/icons/edit.svg')}}" alt="img">
                                </a>

                             <a href="{{ route('admin.customer.destroy', $customer->id) }}" class="delete-item"> <img src="{{asset('assets/img/icons/delete.svg')}}" alt="img"></a>
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
