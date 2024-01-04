<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = DB::table('table_kategori')->get();
        $data = DB::table('table_product')
            ->join('table_kategori', 'table_product.kategori_id', '=', 'table_kategori.id')
            ->select('table_product.*', 'table_kategori.kategori_name')
            ->get();
        return view('produk.index', compact('data', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        DB::table('table_product')->insert([
            'name' => $request->nama_produk,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'gambar' => $request->gambar->store('photo/produk', 'public')
        ]);

        return redirect('produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
