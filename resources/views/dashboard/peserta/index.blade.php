@extends('vendor.adminLTE.master')

@section('title', 'Data Peserta')

@section('header')
<div class="row mb-2" id="header">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Data Peserta</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ Route('/') }}">Home</a></li>
      <li class="breadcrumb-item active">Data Peserta</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
{{-- Container start --}}
<div class="container-fluid" id="content">
  {{-- Row start --}}
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="btn-group">
            <a type="button" href="{{ Route('tambahPeserta') }}" class="btn btn-success text-white">Tambah Data</a>
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <span class="sr-only">Toggle Dropdown</span>
              <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, 37px, 0px);">
                <a class="dropdown-item" href="#">Import XLS</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Download XLS Template</a>
              </div>
            </button>
          </div>
              <button  id="btndelall" class="btn btn-default ml-2"><i class="fas fa-trash"></i> Hapus Semua</button>
          </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $i = 1;
              @endphp
              @foreach ($data as $key => $item)
              <tr>
                <td width="5%">{{ $i++ }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->class->class_name }}</td>
                <td>{{ $item->has_voted == true ? "Sudah Memilih" : "Belum Memilih" }}</td>
                <td>
                  <a href="{{ Route('editKandidat', ['id' => $item->id]) }}" class="badge badge-success text-white" role="button">Ubah</a>
                  <a href="{{ Route('editKandidat', ['id' => $item->id]) }}" class="badge badge-warning text-white" role="button">Blacklist</a>
                  <a href="#" class="badge badge-danger btn-del text-white" id="singledel" data-id="{{ $item->id }}" role="button">Hapus</a>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <form id="deleteAll" method="POST">
    @method('DELETE')
    @csrf
  </form>
  <form id="delete" method="POST">
    @method('DELETE')
    @csrf
  </form>
</div>
<!-- /.container-fluid -->
@endsection
@push('scripts')
<!-- jQuery -->
<script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('adminLTE/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "ordering": true,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $('#btndelall').click( function() {
    Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Anda tidak akan dapat mengembalikan ini!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, hapus!'
  }).then((result) => {
    if (result.isConfirmed) {
      $("#deleteAll").submit();
    }
  })
  });

  $('.btn-del').click( function() {
    Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Anda tidak akan dapat mengembalikan ini!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, hapus!'
  }).then((result) => {
    if (result.isConfirmed) {
      const id = $(this).data("id");
      $("#delete").attr('action', 'peserta/'+id).submit();
    }
  })
  });


</script>
@endpush