{{-- @extends('admin.layouts.layout')

@section('content')
    <div class="content">
        <div class="col-lg-12 col-sm-12">

            <div class="card">
                <div class="page-header ">
                    <div class="page-title">
                        <h4>Cart</h4>
                        <h6>Manage your purchases</h6>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $cartItem)
                                <tr>
                                    <td>
                                        <img src="{{ asset($cartItem->product->product_image) }}" alt="Product Image"
                                            width="50">
                                        {{ $cartItem->product->product_name }}
                                    </td>
                                    <td>
                                        <div class="quantity-input">
                                            <input type="number" min="1" value="{{ $cartItem->quantity }}"
                                                data-price="{{ $cartItem->product->price }}" data-id="{{ $cartItem->id }}"
                                                class="quantity">
                                        </div>
                                    </td>


                                    <td>{{ $cartItem->product->price }}</td>
                                    <td class="total">{{ $cartItem->quantity * $cartItem->product->price }}</td>
                                    <td>
                                        <form action="{{ route('admin.cart.remove', $cartItem->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="remove-from-cart-btn btn btn-danger">Remove from
                                                Cart</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card">
                        <div class="page-header ">
                            <div class="page-title">
                                <p style="text-align: center">CheckOUt</p>
                            </div>
                        </div>
                        <div class="card-body">

                                <div class="setvalue">
                                    <ul>
                                    <li>
                                    <h5>Subtotal </h5>
                                    <h6>55.00$</h6>
                                    </li>
                                    <li>
                                    <h5>Tax </h5>
                                    <h6>5.00$</h6>
                                    </li>
                                    <li class="total-value">
                                    <h5>Total </h5>
                                    <h6>60.00$</h6>
                                    </li>
                                    </ul>
                                    </div>
                                <div class="btn-totallabel">
                                    <h5>Checkout</h5>
                                    <h6>60.00$</h6>
                                    </div>


                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>
    <script>
        const quantityInputs = document.querySelectorAll('.quantity');

        quantityInputs.forEach(input => {
            input.addEventListener('change', function() {
                const quantity = parseInt(this.value);
                const price = parseFloat(this.getAttribute('data-price'));
                const totalCell = this.parentElement.parentElement.nextElementSibling;
                const total = quantity * price;

                totalCell.textContent = total.toFixed(2);

                // Update the total value on the server using AJAX if needed
                const itemId = this.getAttribute('data-id');
                updateTotalOnServer(itemId,
                total); // Implement this function to update the total on the server
            });
        });

        // Function to update the total on the server using AJAX
        function updateTotalOnServer(itemId, total) {
            // Implement AJAX request here
        }
    </script>
@endsection --}}
@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Cart</h4>
                <h6>Manage Cart</h6>
            </div>
        </div>
        <div class="col-lg-12 col-sm-12">

            <div class="card">

                <div class="card-body">


                            <div class="page-btn">
                                <a href="{{route('admin.customer.create')}}" class="btn btn-added btn-adds">
                                        <i class="fa fa-plus me-2"></i>Add Customer</a>
                            </div>
                            <div class="col-lg-12">
                                <div class="select-split ">
                                    <div class="select-group w-100">
                                        <select class="select">
                                            <option>Walk-in Customer</option>
                                        @foreach ($customer as $customers )
                                        <option>{{$customers->customer_name}}</option>
                                        @endforeach


                                        </select>
                                    </div>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $cartItem)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($cartItem->product->product_image) }}" alt="Product Image"
                                                    width="50">

                                            </td>
                                            <td>
                                                {{ $cartItem->product->product_name }}
                                            </td>
                                            <td>
                                                <div class="quantity-input ">
                                                    <input style="border-radius: 5px; border-color: orange;" type="number" min="1" value="{{ $cartItem->quantity }}"
                                                        data-price="{{ $cartItem->product->price }}" data-id="{{ $cartItem->id }}"
                                                        class="quantity">
                                                </div>
                                            </td>
                                            <td class="total">{{ $cartItem->quantity * $cartItem->product->price }}</td>
                                            <td>{{ $cartItem->product->price }}</td>
                                            <td>
                                                <form action="{{ route('admin.cart.remove', $cartItem->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="remove-from-cart-btn btn btn-danger">Remove from
                                                        Cart</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="totalitem">

                                <h4>Total items: {{ $totoalitem }}</h4>

                            </div>
                            <div class="setvalue">
                                <ul>
                                    <li>
                                        <h5>Subtotal</h5>
                                        <h6 id="subtotal">0.00$</h6>
                                    </li>
                                    <li>
                                        <h5>Tax 10%</h5>
                                        <h6 id="tax">0.00$</h6>
                                    </li>
                                    <li class="total-value">
                                        <h5>Total</h5>
                                        <h6 id="total">0.00$</h6>
                                    </li>
                                </ul>
                            </div>
                            <button style="width:100% " class="btn-totallabel btn btn-primary">
                                <h5>Checkout</h5>
                                <h6 id="checkoutTotal">0.00$</h6>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const quantityInputs = document.querySelectorAll('.quantity');
        const subtotalElement = document.getElementById('subtotal');
        const taxElement = document.getElementById('tax');
        const totalElement = document.getElementById('total');
        const checkoutTotalElement = document.getElementById('checkoutTotal');

        // Update cart totals based on quantity changes
        function updateCartTotals() {
            let subtotal = 0;
            quantityInputs.forEach(input => {
                const quantity = parseInt(input.value);
                const price = parseFloat(input.getAttribute('data-price'));
                subtotal += quantity * price;
            });

            const tax = subtotal * 0.1; // Assuming 10% tax
            const total = subtotal + tax;

            subtotalElement.textContent = subtotal.toFixed(2) + '$';
            taxElement.textContent = tax.toFixed(2) + '$';
            totalElement.textContent = total.toFixed(2) + '$';
            checkoutTotalElement.textContent = total.toFixed(2) + '$';
        }

        quantityInputs.forEach(input => {
            input.addEventListener('change', function() {
                updateCartTotals();
                const itemId = this.getAttribute('data-id');
                updateTotalOnServer(itemId, parseFloat(this.value) * parseFloat(this.getAttribute(
                    'data-price')));
            });
        });

        // Initial update
        updateCartTotals();

        // Function to update the total on the server using AJAX
        function updateTotalOnServer(itemId, total) {
            // Implement AJAX request here
        }
    </script>
@endsection
