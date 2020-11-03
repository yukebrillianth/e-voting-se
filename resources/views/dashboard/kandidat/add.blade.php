@extends('vendor.adminLTE.master')

@section('title', 'Data Kandidat')

@push('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
@endpush

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Tambah Data Kandidat</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kandidat') }}">Data Kandidat</a></li>
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-deafult">
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="POST" action="{{ Route('storeKandidat') }}" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
              <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                    <label for="nama">Nama Kandidat</label>
                    <input type="text" name="nama_kandidat" class="form-control" id="nama" placeholder="Masukkan nama kandidat" required autofocus>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" name="class_id" required>
                            <option disabled selected>Pilih kelas</option>
                            @foreach ($data as $item)
                            <option value="{{$item->id}}">{{$item->class_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
              </div>
            <div class="row">
                <div class="col-sm-6">
                  <!-- textarea -->
                  <div class="form-group">
                    <label>Visi</label>
                    
                    <textarea class="form-control" rows="3" name="visi" placeholder="Enter ..." spellcheck="false" required></textarea>
                    
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Misi</label>
                    
                    <textarea class="form-control" rows="3"name="misi" placeholder="Enter ..." spellcheck="false" required></textarea>
                    
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" required>
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text" id="">Upload</span>
                  </div>
                </div>
              </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
</div>
<!-- /.container-fluid -->
@endsection
@push('scripts')
<script src="{{ asset('tinymce/tinymce.min.js')}}"></script>
<script>tinymce.init({
    selector:'textarea',
    setup: function (editor) {
        editor.on('change', function (e) {
            editor.save();
        });
    }
    });
</script>
<script src="{{ asset('adminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('change', '#image', function() {
            let img = $('#image').val()
            $(".custom-file-label").text(img);
        })
    });
</script>
<!-- bs-custom-file-input -->
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
@endpush