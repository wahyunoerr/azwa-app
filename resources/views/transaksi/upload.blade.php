@extends('template.index')
@section('title', 'Upload Bukti Pembayaran')
@section('content-head', 'Upload Bukti Pembayaran')
@section('breadcrumb', 'Upload Bukti Pembayaran')
@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- Form Edit --}}
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Upload Bukti Pembayaran</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @foreach ($data as $upload)
                        <form action="{{ route('pesanan.update', $upload->id) }}" method="POST" enctype="multipart/form-data"
                            class="p-3">
                            @csrf
                            <input type="hidden" name="kategori_id" value="{{ $upload->kategori_id }}">
                            <input type="hidden" name="nama_produk" value="{{ $upload->nama_produk }}">
                            <input type="hidden" name="user_id" value="{{ $upload->user_id }}">
                            <input type="hidden" name="kategori_id" value="{{ $upload->kategori_id }}">
                            <input type="hidden" name="harga" value="{{ $upload->harga }}">
                            <input type="file" name="bukti"">
                            <br>
                            <button type="submit" class="btn btn-primary btn-rounded btn-sm mt-2">Upload <i
                                    class="fas fa-arrow-up"></i></button>
                        </form>
                    @endforeach
                </div>
            </div>
            {{-- End --}}

            {{-- Data Tables --}}

            {{-- End --}}
            <!-- /.row -->
        </div>
    </div>
@endsection
