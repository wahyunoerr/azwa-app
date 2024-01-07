<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('table_transaksi')
            ->join('table_product', 'table_transaksi.nama_produk', '=', 'table_product.id')
            ->join('table_kategori', 'table_transaksi.kategori_id', '=', 'table_kategori.id')
            ->join('users', 'table_transaksi.user_id', '=', 'users.id')
            ->select('table_transaksi.*', 'table_product.name as nmprd', 'table_kategori.kategori_name', 'users.name')
            ->get();
        return view('transaksi.index', compact('data'));
    }

    function order()
    {

        $order = DB::table('table_product')->get();
        return view('order.index', compact('order'));
    }

    function orderGetId(string $id)
    {
        $order = DB::table('table_product')->where('id', $id)->first();
        return view('order.index', compact('order'));
    }

    function orderStore(Request $request)
    {
        $kd = "KDP" . "-" . time();
        $produk = DB::table('table_product')->first();

        DB::table('table_transaksi')->insert([
            'kode_transaksi' => $kd,
            'nama_produk' => $produk->id,
            'gambar' => $produk->gambar,
            'kategori_id' => $produk->kategori_id,
            'user_id' => Auth::id(),
            'harga' => $produk->harga,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('transaksi')->with('success', 'Pesanan Berhasil, Segera Unggah Bukti Pembayaran!');
    }


    public function status(string $id)
    {
        $data = DB::table('table_transaksi')->where('id', $id)->first();

        $status_sekarang = $data->status;

        if ($status_sekarang == 1) {
            DB::table('table_transaksi')->where('id', $id)->update([
                'status' => 0
            ]);
        } else {
            DB::table('table_transaksi')->where('id', $id)->update([
                'status' => 1
            ]);
        }
        return redirect('transaksi');
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
        // 
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
        $data = DB::table('table_transaksi')->where('id', $id)->get();
        return view('transaksi.upload', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('table_transaksi')->where('id', $id)->update([
            'nama_produk' => $request->nama_produk,
            'user_id' => $request->user_id,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'bukti_transaksi' => $request->bukti->store('photo/bukti-transaksi', 'public')
        ]);

        return redirect('transaksi')->with('update', 'Bukti Pembayaran Berhasil Di Upload.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('table_transaksi')->where('id', $id)->delete();
        return redirect('transaksi');
    }
}
