@extends('layouts.front')

@section('title')
    {{ $products->name }}
@endsection

<script src="https://releases.jquery.com/git/jquery-1.x-git.min.js"></script>
<script src="script.js"></script>

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
      <!-- <h6 class="mb-0">Collections / {{ $products->category->name }} / {{ $products->name }} </h6>    -->
        <h6 class="container">
            <a href="{{ url('category') }}">
                Collections
            </a> /
            <a href="{{ url('category/'.$products->category->slug) }}">
                {{ $products->category->name }}
            </a> /
            <a href="{{ url('category/'.$products->category->slug.'/'.$products->slug) }}">
                {{ $products->name }}
            </a>
        </h6>
    </div>
</div>

<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row product_data">
                <div class="col-md-4 border-right">
                    <img src="{{ asset('assets/uploads/products/'.$products->image) }}" class ="w-100" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{ $products->name }}
                        <!-- {{ $products->small_description }} -->
                        @if($products->trending == '1')
                           <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                        @endif
                    </h2>

                    <hr>
                    <label class="me-3">Original Price : <s>Tk {{ $products->original_price }}</s></label>
                    <label class="fw-bold">Selling Price : Tk {{ $products->selling_price }}</label>
                    <p class="mt-3 ">
                        {!! $products->small_description !!}
                    </p>
                    <hr>

                    @if($products->qty > 0)
                        <label class="badge bg-success">In Stock</label>
                    @else
                        <label class="badge bg-danger">Out of Stock</label>
                    @endif

                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{ $products->id }}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width:130px;">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <br/>
                            <!-- <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist <i class="fa fa-heart-o" aria-hidden="true"></i> </button>
                            <button type="button" class="btn btn-primary me-3 float-start">Add to Cart <i class="fa fa-shopping-cart"></i> </button> -->
                            <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to Cart </button>
                            <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist </button>

                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-12">
                <hr>
                <h3>Description</h3>
                <p class="mt-3">
                    {!! $products->description !!}
                </p>
            </div> -->
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
            var value = parseInt(inc_value, 10);

            value = isNaN(value) ? 0 : value;  //value num na hoile 0 banay dbe
            if(value < 10)
            {
                value++;
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();

            var dec_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(dec_value, 10);

            value = isNaN(value) ? 0 : value;  //value num na hoile 0 banay dbe
            if(value>1)
            {
                value--;
                $(this).closest('.product_data').find('.qty-input').val(value);

            }
        });
    // });


    $(document).ready(function () {

        $('.delete-cart-item').click(function (e) { 
        e.preventDefault();
        
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            
            $.ajax({
                method: "POST",
                url: "delete-cart-item",
                data: {
                    'prod_id': prod_id,
                },
                success: function (response) {
                    window.location.reload();
                    swal("", response.status, "success");
                }
            });
        });
    });
    });
</script>

@endsection 