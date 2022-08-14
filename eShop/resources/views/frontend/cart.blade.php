@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/') }}">
                Home
            </a> /
            <a href="{{ url('cart') }}">
                Cart
            </a> 
        </h6>
    </div>
</div>


<div class="container my-5">
    <div class="card shadow product_data">
        <div class="card-body">
            @foreach ($cartitems as $item)

                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" height="70px" width="70px" alt="Image here">
                    </div>
                    <div class="col-md-5">
                        <h6> {{ $item->products->name }} </h6>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" class="prod_id">
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width:130px;">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->prod_qty }}">
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h6>Remove</h6>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
</div>

@endsection


<script src="https://releases.jquery.com/git/jquery-1.x-git.min.js"></script>
<script src="script.js"></script>

@section('scripts')
<script>
    $(document).ready(function(e) {

        $('.addToCartBtn').click(function (e) { 
            e.preventDefault();

            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty-input').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/add-to-cart",
                data: {
                    'product_id' : product_id,  //will fetch in the controller by field name 'product_id'
                    'product_qty' : product_qty
                },
                success: function (response) {
                    swal(response.status);
                }
            });

        });

        $('.increment-btn').click(function (e) {
            e.preventDefault();

            var inc_value = $(this).closest('.product_data').find('.qty-input').val();
            // var inc_value = $('.qty-input').val();
            var value = parseInt(inc_value, 10);

            value = isNaN(value) ? 0 : value;  //value num na hoile 0 banay dbe
            if(value < 10)
            {
                value++;
                // $('.qty-input').val(value);
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();

            var dec_value = $('.qty-input').val();
            var value = parseInt(dec_value, 10);

            value = isNaN(value) ? 0 : value;  //value num na hoile 0 banay dbe
            if(value>1)
            {
                value--;
                $('.qty-input').val(value);
            }
        });

    });
</script>

@endsection