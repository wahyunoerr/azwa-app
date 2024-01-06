@extends('template.index')
@section('title', 'Pesanan')
@section('content-head', 'Pesanan')
@section('breadcrumb', 'Pesanan')
@section('content')
    <div class="container-fluid">
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <form action="{{ route('order.save') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none"></h3>
                            <div class="col-12">
                                {{-- <input type="file" value="{{ Storage::disk('public')->url($order->gambar) }}" multiple> --}}
                                <img src="{{ Storage::disk('public')->url($order->gambar) }}" class="product-image"
                                    alt="Product Image">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="text" name="name_prd" value="{{ $order->name }}" class="form-control"
                                    id="exampleInputEmail1" placeholder="Product Name" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Categories Name</label>
                                <input type="text" name="kategori_id" value="{{ $order->kategori_id }}"
                                    class="form-control" id="exampleInputEmail1" placeholder="Categories Name" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name User</label>
                                <input type="text" name="username" value="{{ Auth::user()->id }}" class="form-control"
                                    id="exampleInputEmail1" placeholder="Product Name" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="number" name="harga" value="{{ $order->harga }}" class="form-control"
                                    id="exampleInputEmail1" placeholder="Price" disabled>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-flat rounded"><i
                                        class="fas fa-regular fa-money-bill"></i>
                                    Bayar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->



    </div>
@endsection
