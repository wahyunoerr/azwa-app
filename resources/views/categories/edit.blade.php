@extends('template.index')
@section('title', 'Edit Categories')
@section('content-head', 'Edit Categories')
@section('breadcrumb', 'Edit Categories')
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
                    @foreach ($data as $kat)
                        <form action="{{ route('kategori.update', ['id' => $kat->id]) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="id" value="{{ $kat->id }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Categories Name</label>
                                    <input type="text" name="name" value="{{ $kat->kategori_name }}"
                                        class="form-control">
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
                                @foreach ($data as $kat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kat->kategori_name }}</td>
                                        <td>
                                            <a href="{{ route('kategori.edit', $kat->id) }}"><i
                                                    class="fas fa-solid fa-pen"></i></a> |
                                            <a href="#" class="text-danger"><i class="fas fa-solid fa-trash"></i></a>
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
