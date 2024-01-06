@extends('template.index')
@section('title', 'Transaction')
@section('content-head', 'Transaction')
@section('breadcrumb', 'Transaction')
@section('content')
    <div class="container-fluid">
        <div class="row">

            {{-- Data Tables --}}
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">List Tables Transaction</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="20px">No</th>
                                    @hasrole('admin')
                                        <th>Kode Transaksi</th>
                                    @endhasrole
                                    <th>Nama Poduk</th>
                                    @hasrole('admin')
                                        <th>Pembeli</th>
                                    @endhasrole
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th>Bukti Transaksi</th>
                                    <th>Status</th>
                                    <th class="text-center" width="20px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @hasrole('admin')
                                            <td>{{ $item->kode_transaksi }}</td>
                                        @endhasrole
                                        <td>{{ $item->nmprd }}</td>
                                        @hasrole('admin')
                                            <td>{{ $item->name }}</td>
                                        @endhasrole
                                        <td>{{ $item->kategori_name }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td> <img src="{{ Storage::disk('public')->url($item->gambar) }}"
                                                class="product-image" alt="Product Image"></td>
                                        <td>
                                            <input type="file">
                                        </td>
                                        <td></td>
                                        <td>
                                            <a href="#"><i class="fas fa-solid fa-pen"></i></a> |
                                            <a href="#" class="text-danger"><i class="fas fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th widht="10px">No</th>
                                    @hasrole('admin')
                                        <th>Kode Transaksi</th>
                                    @endhasrole
                                    <th>Nama Poduk</th>
                                    @hasrole('admin')
                                        <th>Pembeli</th>
                                    @endhasrole
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th>Bukti Transaksi</th>
                                    <th>Status</th>
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
