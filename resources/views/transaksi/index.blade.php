@extends('template.index')
@section('title', 'Transaction')
@section('content-head', 'Transaction')
@section('breadcrumb', 'Transaction')
@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- Form Edit --}}
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">List Tables Transaction</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
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
                                                class="product-image" alt="Product Image" style="width: 150px">
                                        </td>
                                        <td>
                                            @foreach ($data as $upload)
                                                <img src="{{ Storage::disk('public')->url($upload->bukti_transaksi) }}"
                                                    alt="" class="product-image" alt="Bukti Image"
                                                    style="width: 150px">
                                            @endforeach
                                        </td>
                                        <td>
                                            <label
                                                class="label d-flex align-items-center {{ $item->status == 0 ? 'btn btn-sm btn-warning rounded-pill' : 'btn btn-sm btn-success rounded-pill' }}">{{ $item->status == 1 ? 'Berhasil' : 'Pending' }}</label>
                                        </td>
                                        <td class="d-flex justify-content-start">
                                            @hasrole('admin')
                                                <div class="dropdown d-flex align-items-center">
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Status
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        @if ($item->status == 1)
                                                            <a class="dropdown-item"
                                                                href="{{ route('status', $item->id) }}">Pending</a>
                                                        @elseif ($item->status == 0)
                                                            <a class="dropdown-item"
                                                                href="{{ route('status', $item->id) }}">Berhasil</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endhasrole
                                            @foreach ($data as $upload)
                                                @hasrole('user')
                                                    <a href="{{ route('pesanan.upload', $upload->id) }}"
                                                        class="btn btn-outline-primary btn-xm m-3"><i
                                                            class="fas fa-solid fa-file"></i> Upload Bukti</a>
                                                @endhasrole
                                                <a href="{{ route('pesanan.delete', $upload->id) }}"
                                                    class="btn btn-outline-danger btn-xm m-3"><i
                                                        class="fas fa-solid fa-trash"></i> Hapus Pesanan</a>
                                            @endforeach
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
                </div>
            </div>
            {{-- End --}}
            <!-- /.row -->
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
        </div>
    </div>
@endsection
