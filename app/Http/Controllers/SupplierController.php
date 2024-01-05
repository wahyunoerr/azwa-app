<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $data = DB::table('tb_supplier')->get();
        return view('supplier.index', compact('data'));
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
        DB::table('tb_supplier')->insert([
            'nama' => $request->nama_sup,
            'prd_name' => $request->produk_nama,
            'prd_masuk' => $request->jlh_masuk
        ]);

        return redirect('supplier');
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
        $data = DB::table('tb_supplier')->where('id', $id)->get();
        return view('supplier.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('tb_supplier')->where('id', $id)->update([
            'nama' => $request->nama_sup,
            'prd_name' => $request->produk_nama,
            'prd_masuk' => $request->jlh_masuk,
        ]);

        return redirect('supplier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('tb_supplier')->where('id', $id)->delete();

        return redirect('supplier');
    }
}
