@extends('template.index')
@section('title', 'Product')
@section('content-head', 'Product')
@section('breadcrumb', 'Product')
@section('content')
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i> {{ session('update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            {{-- Form Add --}}
            <div class="col-md-4">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Input Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('produk.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1"
                                    placeholder="Product Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kategori Name</label>
                                <select class="form-control" name="kategori_id" id="">
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->kategori_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Harga</label>
                                <input type="number" name="harga" class="form-control" id="exampleInputEmail1"
                                    placeholder="Harga">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">gambar</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex">
                            <button type="submit" class="btn btn-primary ml-auto"><i
                                    class="fas fa-solid fa-plus"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- End --}}

            {{-- Data Tables --}}
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">List Tables Categories</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="20px">No</th>
                                    <th>Product Name</th>
                                    <th>Kategori Name</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th class="text-center" width="20px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $prod)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $prod->name }}</td>
                                        <td>{{ $prod->kategori_name }}</td>
                                        <td>{{ $prod->harga }}</td>
                                        <td><img src="{{ Storage::disk('public')->url($prod->gambar) }}" alt=""
                                                width="50px"></td>
                                        <td>
                                            <a href="{{ route('produk.edit', $prod->id) }}"><i
                                                    class="fas fa-solid fa-pen"></i></a> |
                                            <a href="{{ route('produk.delete', $prod->id) }}" class="text-danger"><i
                                                    class="fas fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th widht="10px">No</th>
                                    <th>Product Name</th>
                                    <th>Kategori Name</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            {{-- End --}}
            <!-- /.row -->
        </div>
    </div>

    @push('datatables')
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
    @endpush
@endsection
