@extends('template.home')
@section('sub-judul', 'Edit Anggota')
@section('content')

    @if(count($errors) > 0)
        @foreach($errors -> all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success') }}
        </div>
    @endif

    <form action="{{ route('anggota.update', $anggotas -> id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group">
            <label>ID Anggota</label>
            <input type="text" class="form-control" name="id_anggota" value="{{ $anggotas -> id_anggota }}">
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ $anggotas -> nama }}">
        </div>
        <div class="form-group">
            <label>Nomor Telepon</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-phone"></i>
                    </div>
                </div>
                <input type="text" class="form-control phone-number" name="no_telp" value="{{ $anggotas -> no_telp }}">
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-success">Update Data</button>
        </div>
    </form>
@endsection
