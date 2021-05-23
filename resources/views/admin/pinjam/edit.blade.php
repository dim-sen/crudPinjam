@extends('template.home')
@section('sub-judul', 'Edit Peminjaman')
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

    <form action="{{ route('pinjam.update', $pinjams -> id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group">
            <label>ID Anggota</label>
            <select class="form-control" name="id_anggota">
                <option value="" holder>Pilih ID Anggota</option>
                @foreach($anggotas as $result)
                    <option value="{{ $result -> id }}"
                            @if($pinjams -> id_anggota == $result -> id)
                                selected
                            @endif
                    >{{ $result -> id_anggota }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>ID Buku</label>
            <select class="form-control select2" multiple="" name="bukus[]">
                @foreach($bukus as $buku)
                    <option value="{{ $buku -> id }}"
                            @foreach($pinjams -> bukus as $value)
                                @if($buku -> id == $value -> id)
                                    selected
                                @endif
                            @endforeach
                    >{{ $buku -> id_buku }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal Pinjam</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar"></i>
                    </div>
                </div>
                <input type="date" name="tgl_pinjam" value="{{ $pinjams -> tgl_pinjam }}">
            </div>
        </div>
        <div class="form-group">
            <label>Tanggal Kembali</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar"></i>
                    </div>
                </div>
                <input type="date" name="tgl_kembali" value="{{ $pinjams -> tgl_kembali }}">
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-success">Update Data</button>
        </div>
    </form>
@endsection
