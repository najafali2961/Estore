@extends('admin.layouts.layout')
@section('content')


<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Product Sub Category list</h4>
            <h6>View/Search product Category</h6>
        </div>
        <div class="page-btn">
            <a href="{{route('admin.subcategory.create')}}" class="btn btn-added"><img src="{{asset('assets/img/icons/plus.svg')}}"
                    class="me-2" alt="img"> Add Sub Category</a>
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
                <table class="table table-bordered table-striped datanew">
                    <thead>
                        <tr>
                            <th>
                                <label class="checkboxs">
                                    <input type="checkbox" id="select-all">
                                    <span class="checkmarks"></span>
                                </label>
                            </th>

                            <th>Sub-Category</th>
                            <th>Parent category</th>
                            <th>Sub-Category Code</th>
                            <th>Description</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $subcategory)
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td>{{ $subcategory->name }}</td>
                                <td>{{ $subcategory->category->name }}</td>
                                <td>{{ $subcategory->code }}</td>
                                <td>{{ $subcategory->description }}</td>


                                <td>
                                    <a class="me-3" href="{{ route('admin.subcategory.edit', $subcategory->id) }}">
                                        <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                    </a>
                                 <a href="{{ route('admin.subcategory.destroy', $subcategory->id) }}" class="delete-item">
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
