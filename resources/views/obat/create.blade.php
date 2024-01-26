@extends('layout.header')

@section('content')

<div class="row">
    <div class="col">
        <h1>Tambah Obat</h1>
        <form action="{{ route('obat.store') }}" method="POST" >
            @csrf
            <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat</label>
                <input name="nama_obat" type="text" class="form-control" id="nama_obat" value="{{ old('nama_obat')}}" required>
                <div id="nama_obat" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="merek" class="form-label">Merek</label>
                <input name="merek" type="text" class="form-control" id="merek" value="{{ old('merek')}}" required>
                <div id="merek" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="supplayer" class="form-label">Supplayer</label>
                <input name="supplayer" type="text" class="form-control" id="supplayer" value="{{ old('supplayer')}}">
                <div id="supplayer" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input name="jumlah" type="text" class="form-control" id="jumlah" value="{{ old('jumlah')}}" required>
                <div id="jumlah" class="form-text"></div>
                @error('jumlah')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tanggal_exp" class="form-label">Tanggal Expired</label>
                <input name="tanggal_exp" type="date" class="form-control" id="tanggal_exp" value="{{ old('tanggal_exp')}}" required>
                <div id="tanggal_exp" class="form-text"></div>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn yellow">Reset</button>
        </form>
    </div>
</div>

@endsection
