@extends('layouts.app')

@section('content')

<title>DriftSale add</title>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4" style=" padding-bottom:20px;">
            <div class="card text-center" style="width: 18rem;">
                <img class="card-img-top" src=".../100px180/" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text"><small class="text-muted">&euro;{{ $product->price }}<br> {{ $product->created_at }} </small></p>
                </div>
            </div>
        </div>
    </div>
</div>
 <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
@endsection
