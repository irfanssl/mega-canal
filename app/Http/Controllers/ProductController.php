<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Pesanan;


class ProductController extends Controller
{
    /**
     * return view
     *
     * @return Illuminate\Support\Facades\View;
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     * return view
     *
     * @return Illuminate\Support\Facades\View;
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * return view
     * @param Illuminate\Http\Request;
     * @return Illuminate\Support\Facades\View;
     */
    public function store(Request $request)
    {
        $pesanan = new Pesanan();
        $pesanan->no_pesanan = $request->noPesanan;
        $pesanan->tanggal = Carbon::createFromFormat('Y-m-d',$request->tanggal);
        $pesanan->nm_supplier = $request->namaSupplier;
        $pesanan->nm_produk = $request->namaProduk;
        $pesanan->total = $request->total;
        $pesanan->created_by = auth()->user()->id;
        $pesanan->saveOrFail();
        return redirect($to = '/products/create', $status = 201)
                ->with('status', 'Succes ! '.$request->noPesanan.' saved to database!');
    }
}
