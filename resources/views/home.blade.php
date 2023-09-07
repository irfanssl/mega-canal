@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title">Products page</h5>
                  <p>List of products from dummyjson</p>
                  <a href="/products" class="btn btn-primary">Go</a>
                </div>
              </div>
        </div>
        <div class="col-3">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title">Create new product</h5>
                  <p>Submit new product to database</p>
                  <a href="/products/create" class="btn btn-primary">Go</a>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
