<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table("table_kategori")->get();
        return view('categories.index', [
            'data' => $data
        ]);
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
        DB::table("table_kategori")->insert([
            'kategori_name' => $request->name
        ]);

        return redirect('kategori')->with('success', 'Category Data Added Successfully.');
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
        $data = DB::table("table_kategori")->where("id", $id)->get();
        return view('categories.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('table_kategori')->where('id', $id)->update([
            'kategori_name' => $request->name,
        ]);

        return redirect('kategori')->with('update', 'Update Data Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("table_kategori")->where('id', $id)->delete();

        return redirect('kategori');
    }
}
