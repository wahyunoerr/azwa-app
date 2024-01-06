@extends('template.index')
@section('title', 'Supplier')
@section('content-head', 'Supplier')
@section('breadcrumb', 'Supplier')
@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- Form Add --}}
            @hasrole('supplier')
                <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Input Supplier</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('supplier.save') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Supplier Name</label>
                                    <input type="text" name="nama_sup" class="form-control" id="exampleInputEmail1"
                                        placeholder="Supplier Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" name="produk_nama" class="form-control" id="exampleInputEmail1"
                                        placeholder="Product Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Qty Product In</label>
                                    <input type="number" name="jlh_masuk" class="form-control" id="exampleInputEmail1"
                                        placeholder="Qty">
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
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">List Tables Supplier</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="20px">No</th>
                                        <th>Supplier Name</th>
                                        <th>Product Name</th>
                                        <th>Qty Product In</th>
                                        <th class="text-center" width="20px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $sup)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sup->nama }}</td>
                                            <td>{{ $sup->prd_name }}</td>
                                            <td>{{ $sup->prd_masuk }}</td>
                                            <td>
                                                <a href="{{ route('supplier.edit', $sup->id) }}"><i
                                                        class="fas fa-solid fa-pen"></i></a> |
                                                <a href="{{ route('supplier.delete', $sup->id) }}" class="text-danger"><i
                                                        class="fas fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th width="20px">No</th>
                                        <th>Supplier Name</th>
                                        <th>Product Name</th>
                                        <th>Qty Product In</th>
                                        <th class="text-center" width="20px">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            @endhasrole
            {{-- End --}}

            {{-- Data Tables --}}
            @hasrole('admin')
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">List Tables Supplier</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="20px">No</th>
                                        <th>Supplier Name</th>
                                        <th>Product Name</th>
                                        <th>Qty Product In</th>
                                        <th class="text-center" width="20px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $sup)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sup->nama }}</td>
                                            <td>{{ $sup->prd_name }}</td>
                                            <td>{{ $sup->prd_masuk }}</td>
                                            <td>
                                                <a href="{{ route('supplier.edit', $sup->id) }}"><i
                                                        class="fas fa-solid fa-pen"></i></a> |
                                                <a href="{{ route('supplier.delete', $sup->id) }}" class="text-danger"><i
                                                        class="fas fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th width="20px">No</th>
                                        <th>Supplier Name</th>
                                        <th>Product Name</th>
                                        <th>Qty Product In</th>
                                        <th class="text-center" width="20px">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            @endhasrole
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
