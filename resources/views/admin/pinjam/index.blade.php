@extends('template.home')
@section('sub-judul', 'Data Peminjaman')
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

    <a href="{{ route('pinjam.create') }}" class="btn btn-success btn-sm">Tambah Peminjaman</a>
    <br><br>

    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
        <tr>
            <th>No Pinjam</th>
            <th>ID Anggota</th>
            <th>ID Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pinjams as $result => $hasil)
            <tr>
                <td>{{ $result + $pinjams -> firstitem() }}</td>
                <td>{{ $hasil -> anggotas -> id_anggota }}</td>
                <td>
                    @foreach($hasil -> bukus as $bukus)
                        <ul>
                            <li>{{ $bukus -> id_buku }}</li>
                        </ul>
                    @endforeach
                </td>
                <td>{{ $hasil ->  tgl_pinjam }}</td>
                <td>{{ $hasil ->  tgl_kembali }}</td>
                <td>
                    <form action="{{ route('pinjam.destroy', $hasil -> id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('pinjam.edit', $hasil -> id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $pinjams -> links() }}

@endsection
