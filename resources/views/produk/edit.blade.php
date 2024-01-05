@extends('template.index')
@section('title', 'Edit Produk')
@section('content-head', 'Edit Product')
@section('breadcrumb', 'Edit Product')
@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- Form Add --}}
            <div class="col-md-4">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Categories</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @foreach ($data as $prod)
                        <form action="{{ route('produk.update', ['id' => $prod->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" name="nama_produk" value="{{ $prod->name }}"
                                        class="form-control" id="exampleInputEmail1" placeholder="Product Name">
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
                                    <input type="number" name="harga" value="{{ $prod->harga }}" class="form-control"
                                        id="exampleInputEmail1" placeholder="Harga">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">gambar</label>
                                    <input type="file" name="gambar"
                                        value="{{ Storage::disk('public')->url($prod->gambar) }}" class="form-control">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer d-flex">
                                <button type="submit" class="btn btn-primary ml-auto"><i
                                        class="fas fa-solid fa-plus"></i></button>
                            </div>
                        </form>
                    @endforeach


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
                                    <th>Categories Name</th>
                                    <th class="text-center" width="20px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $prod)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $prod->name }}</td>
                                        <td>{{ $prod->kategori_id }}</td>
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
                                    <th>Categories Name</th>
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
    <!-- /.modal -->
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
