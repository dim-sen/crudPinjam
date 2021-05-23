@extends('template.home')
@section('sub-judul', 'Data Buku')
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

    <a href="{{ route('buku.create') }}" class="btn btn-success btn-sm">Tambah Buku</a>
    <br><br>

    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>ID Buku</th>
            <th>Judul</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bukus as $result => $hasil)
            <tr>
                <td>{{ $result + $bukus -> firstitem() }}</td>
                <td>{{ $hasil ->  id_buku }}</td>
                <td>{{ $hasil ->  buku }}</td>
                <td>
                    <form action="{{ route('buku.destroy', $hasil -> id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('buku.edit', $hasil -> id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $bukus -> links() }}

@endsection
