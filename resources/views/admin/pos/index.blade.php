<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Dreams Pos</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owlcarousel/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    <div class="main-wrappers">

        {{-- @include('admin.layouts.sidebar') --}}
        <div class="page-wrapper ms-0">
            <div class="content">
                <div class="">
                    <div  class="col-lg-8 col-sm-12 tabs_wrapper">
                        <div class="page-header ">
                            <div class="page-title">
                                <h4>Categories</h4>
                                <h6>Manage your purchases</h6>
                            </div>
                        </div>
                        <ul class="tabs owl-carousel owl-theme owl-product border-0">
                            @foreach ($categories as $category)
                                <li class="{{ $loop->first ? 'active' : '' }}" id="{{ $category->id }}">
                                    <div class="product-details">
                                        <img src="{{ asset($category->category_image) }}" alt="img">
                                        <h6>{{ $category->name }}</h6>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tabs_container">
                            <!-- Loop through categories and products -->
                            @foreach ($categories as $category)
                                <div class="tab_content {{ $loop->first ? 'active' : '' }}"
                                    data-tab="{{ $category->id }}">
                                    <div class="row">
                                        @foreach ($category->products as $product)
                                            <div class="col-lg-3 col-sm-6 d-flex">
                                                <div class="productset flex-fill">
                                                    <div class="productsetimg">

                                                        <img src="{{ asset($product->product_image) }}" alt="img">



                                                    </div>
                                                    <!-- Add a "Add to Cart" button or link -->


                                                    <div class="productsetcontent">
                                                        <h5>{{ $category->name }}</h5>
                                                        <h4 >{{ $product->product_name }}</h4>
                                                        <h6>{{ $product->price }}</h6>
                                                        <button style="justify-content: center; width:100%" id="add-to-cart-btn" class="add-to-cart-btn btn btn-primary"
                                                        data-product-id="{{ $product->id }}"
                                                        data-route="{{ route('admin.cart.add', $product->id) }}">Add to
                                                        Cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>



    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script>
        // Listen for click events on "Add to Cart" buttons
        $(document).on('click', '.add-to-cart-btn', function(event) {
            event.preventDefault();

            var productId = $(this).data('product-id');
            var route = $(this).data('route');

            // Send AJAX request to add the product to the cart
            $.ajax({
                type: 'POST',
                url: route,
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId
                },
                success: function(response) {
                    // Handle the response (if needed)
                    // You can update the cart count or display a success message here
                    // Example: $("#cart-count").text(response.cartCount);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>



</body>

</html>
