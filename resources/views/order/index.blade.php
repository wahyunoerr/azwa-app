@extends('template.index')
@section('title', 'Pesanan')
@section('content-head', 'Pesanan')
@section('breadcrumb', 'Pesanan')
@section('content')
    <div class="container-fluid">
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none"></h3>
                        <div class="col-12">
                            <img src="{{ Storage::disk('public')->url($order->gambar) }}" class="product-image"
                                alt="Product Image">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">Nama Produk: {{ $order->name }}</h3>
                        <h3 class="my-3">Kategori: {{ $order->kategori_id }}</h3>
                        <h3 class="my-3">Nama Pembeli: {{ Auth::user()->name }}</h3>
                        {{-- <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                    aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure
                                    terr.</p> --}}
                        <hr>

                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                Rp.{{ $order->harga }}
                            </h2>
                        </div>

                        <div class="mt-4">
                            <div class="btn btn-primary btn-lg btn-flat">
                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                Pembayaran
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->



    </div>
@endsection
