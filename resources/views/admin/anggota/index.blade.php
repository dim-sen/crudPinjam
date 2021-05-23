@extends('template.home')
@section('sub-judul', 'Data Anggota')
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

    <a href="{{ route('anggota.create') }}" class="btn btn-success btn-sm">Tambah Anggota</a>
    <br><br>

    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>ID Anggota</th>
            <th>Nama</th>
            <th>No. Telepon</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($anggotas as $result => $hasil)
        <tr>
            <td>{{ $result + $anggotas -> firstitem() }}</td>
            <td>{{ $hasil ->  id_anggota }}</td>
            <td>{{ $hasil ->  nama }}</td>
            <td>{{ $hasil ->  no_telp }}</td>
            <td>
                <form action="{{ route('anggota.destroy', $hasil -> id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('anggota.edit', $hasil -> id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $anggotas -> links() }}
@endsection
