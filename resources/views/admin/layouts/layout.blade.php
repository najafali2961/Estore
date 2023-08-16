<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Estore</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">


</head>


<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="{{route('dashboard')}}" class="logo">
                    <img src="{{asset('assets/img/logo.png')}}" alt="">
                </a>
                <a href="{{route('dashboard')}}" class="logo-small">
                    <img src="{{asset('assets/img/logo-small.png')}}" alt="">
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="{{asset('assets/img/profiles/avator1.jpg')}}" alt="">
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img"><img src="{{asset('assets/img/profiles/avator1.jpg')}}" alt="">
                                   </span>
                                <div class="profilesets">
                                    {{-- <h4>{{$user->name}}</h4> --}}

                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item" href="{{route('profile.edit')}}"> <i class="me-2" data-feather="user"></i>
                                My Profile</a>

                            <hr class="m-0">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item logout pb-0" href="{{route('logout')}}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"><img
                                            src="{{asset('assets/img/icons/log-out.svg')}}" class="me-2" alt="img">Logout</a>
                                    </form>
                        </div>
                    </div>
                </li>
            </ul>


            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="generalsettings.html">Settings</a>
                    <a class="dropdown-item" href="signin.html">Logout</a>
                </div>
            </div>

        </div>



        <div class="page-wrapper">
            @include('admin.layouts.sidebar')

             @yield('content')
        </div>
    </div>


    <script>
        @if (!empty($errors->all()))
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>

    <script src="{{asset('assets/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{asset('assets/plugins/sweetalert/sweetalerts.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/plugins/fileupload/fileupload.min.js')}}"></script>

    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/apexchart/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/plugins/apexchart/chart-data.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('body').on('click', '.delete-item', function(e) {
                e.preventDefault();
                let deleteUrl = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type:  'DELETE',
                            url: deleteUrl,
                            success: function(data) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                window.location.reload();
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        })

                    }
                })
            })
        })
    </script>
    <script>
        const imageInput = document.getElementById('imageInput');
        const uploadedImage = document.getElementById('uploadedImage');

        imageInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    uploadedImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

{{-- <script>
    $(document).ready(function () {
        $('#categoryDropdown').on('change', function () {
            var selectedCategoryId = $(this).val();
            $('#subcategoryDropdown option').hide();
            $('#subcategoryDropdown option[data-category="' + selectedCategoryId + '"]').show();
            $('#subcategoryDropdown').val($('#subcategoryDropdown option[data-category="' + selectedCategoryId + '"]').eq(0).val());
        });
    });
</script> --}}

    {{-- <script>
        $(document).ready(function () {
            // Dynamic Tax Options
            var taxOptions = ['2%', '5%', '10%']; // Example tax options
            var taxSelect = $('#taxSelect');

            $.each(taxOptions, function (index, value) {
                taxSelect.append($('<option>', {
                    value: value,
                    text: value
                }));
            });

            // Dynamic Discount Options
            var discountOptions = ['10%', '20%', '30%']; // Example discount options
            var discountSelect = $('#discountSelect');

            $.each(discountOptions, function (index, value) {
                discountSelect.append($('<option>', {
                    value: value,
                    text: value
                }));
            });
        });
    </script> --}}



{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

</body>

</html>

