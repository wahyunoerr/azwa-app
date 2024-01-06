@extends('template.index')
@section('title', 'Pesanan')
@section('content-head', 'Pesanan')
@section('breadcrumb', 'Pesanan')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Input Order</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route() }}" method="POST">
                    @csrf
                    @foreach ($order as $item)
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="text" name="name" value="{{ $item->name }}" class="form-control"
                                    id="exampleInputEmail1" placeholder="Categories Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Harga</label>
                                <input type="number" name="harga" value="{{ $item->harga }}" class="form-control"
                                    id="exampleInputEmail1" placeholder="Categories Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Gambar</label>
                                <img src="{{ Storage::disk('public')->url($item->gambar) }}" alt="" width="50px">
                            </div>
                        </div>
                    @endforeach
                    <!-- /.card-body -->
                    <div class="card-footer d-flex">
                        <button type="submit" class="btn btn-primary ml-auto"><i class="fas fa-solid fa-plus"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
