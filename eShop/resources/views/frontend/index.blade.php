@extends('layouts.front')

@section('title')
    Welcome to E-Shop
@endsection

@section('content')
    @include('layouts.inc.slider')
    <!-- <h1>Welcome</h1> -->

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Products</h2>
                @foreach ($featured_products as $prod)
                    <div class="col-md-3 mt-3">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="Product image">
                            <div class="card-body">
                                <h5>{{ $prod->name }}</h5>
                                <span class="float-start">{{ $prod->selling_price }}</span>
                                <span class="float-end"> <s> {{ $prod->original_price }} </s></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection