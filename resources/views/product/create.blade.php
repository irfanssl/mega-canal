@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-5">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
             @endif
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <form action="/products" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="noPesanan" class="form-label">No pesanan</label>
                    <input type="text" class="form-control" id="noPesanan" name="noPesanan" placeholder="masukkan nomor pesanan" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" id="date" required>
                </div>
                <div class="mb-3">
                    <label for="namaSupplier" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control" id="namaSupplier" name="namaSupplier" placeholder="masukkan nama supplier" required>
                </div>
                <div class="mb-3">
                    <label for="namaProduk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="namaProduk" name="namaProduk" placeholder="masukkan nama produk" required>
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input type="number" class="form-control" id="total" name="total" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
