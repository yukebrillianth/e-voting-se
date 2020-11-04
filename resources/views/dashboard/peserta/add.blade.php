@extends('vendor.adminLTE.master')

@section('title', 'Tambah Data Peserta')

@section('header')
<div class="row mb-2" id="header">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tambah Data Peserta</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('peserta') }}">Data Peserta</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="container-fluid" id="content">
    <div class="card card-deafult">
        <!-- form start -->
        <form method="POST" action="{{ Route('storePeserta') }}">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama">Nama Peserta</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama peserta" required autofocus>
                            @error('name')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control @error('class_id') is-invalid @enderror" id="class_id" name="class_id" required>
                                <option disabled selected>Pilih kelas</option>
                                @foreach ($data as $item)
                                <option value="{{ $item->id }}">{{ $item->class_name }}</option>
                                @endforeach
                            </select>
                            @error('class_id')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('name') }}" name="email" id="email" autocomplete="false" placeholder="Masukkan email">
                            @error('email')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="password">Kata Sandi</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" id="password" autocomplete="hidden" placeholder="Password">
                            @error('password')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="password-confirm">Konfirmasi Kata Sandi</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password-confirm') }}" name="password_confirmation" id="password-confirm" autocomplete="false" placeholder="Password">
                            @error('password_confirmation')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
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