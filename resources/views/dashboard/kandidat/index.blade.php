@extends('vendor.adminLTE.master')

@section('title', 'Data Kandidat')

@section('header')
<div class="row mb-2" id="header">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Data Kandidat</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ Route('/') }}">Home</a></li>
      <li class="breadcrumb-item active">Data Kandidat</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="container-fluid" id="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Action &nbsp;
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
              <a class="dropdown-item" id="btnAdd" href="{{ Route('tambahKandidat') }}">Tambah Data</a>
              <a class="dropdown-item" href="#">Import XLS</a>
              <a class="dropdown-item" href="#">Import CSV</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Print Out</a>
            </div>
          </div>
          <form id="deleteAll" method="POST" class="d-inline">
            @method('DELETE')
            @csrf
          </form>
          <button type="submit" id="btndelall" value="confirm" class="btn btn-default ml-2"><i class="fas fa-trash"></i> Hapus Semua</button>
        </div>
      
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>Nama Kandidat</th>
                <th>Foto Kandidat</th>
                <th>Visi</th>
                <th>Misi</th>
                <th>kelas</th>
                <th>Suara</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
              <tr>
                <td width="10%">{{ $item["nama_kandidat"] }}</td>
                <td width="10%"><img src="{{ asset('storage/' . $item->image ) }}" width="70px" alt=""></td>
                <td>{{ substr(strip_tags($item->visi), 0, 100) }}{{ strlen($item->visi ) > 100 ? "..." : "" }}</td>
                <td>{{ substr(strip_tags($item->misi), 0, 100) }}{{ strlen($item->misi ) > 100 ? "..." : "" }}</td>
                <td>{{ $item->class->class_name }}</td>
                <td>{{ $item["jumlah_pemilih"] }}</td>
                <td>
                  <a href="{{ Route('showKandidat', ['id' => $item->id]) }}" class="badge badge-success text-white"
                    role="button">Lihat</a><br>
                  <a class="badge badge-success text-white" role="button">Edit</a><br>
                  <a class="badge badge-danger text-white" role="button">Hapus</a>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Nama Kandidat</th>
                <th>Foto Kandidat</th>
                <th>Visi</th>
                <th>Misi</th>
                <th>kelas</th>
                <th>Suara</th>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
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
</script>
@endpush