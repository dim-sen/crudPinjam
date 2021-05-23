@extends('template.home')
@section('sub-judul', 'Tambah Buku')
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

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>ID Buku</label>
            <input type="text" class="form-control" name="id_buku">
        </div>
        <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" class="form-control" name="buku">
        </div>
        <div class="form-group">
            <button class="btn btn-success">Save Data</button>
        </div>
    </form>
@endsection
