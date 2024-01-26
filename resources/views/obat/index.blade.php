@extends('layout.header')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col text-center">
            <h1>Tabel Obat</h1>
            @if (session()->has('berhasil'))
            <br>
            <div class="alert alert-primary mt-2">
                {{session('berhasil')}}
                </div>
            @endif


        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <a href="{{ route('obat.create') }}" class="btn btn-primary">Tambah Obat</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Merek</th>
                    <th scope="col">Supplayer</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($obat as $value)

                  <tr>
                    <th scope="row">{{($obat->currentPage() - 1) * $obat->perPage() + $loop->iteration}}</th>
                    <td>{{$value->nama_obat}}</td>
                    <td>{{$value->merek}}</td>
                    <td>{{$value->supplayer}}</td>
                    <td>{{$value->jumlah}}</td>
                    <td>{{$value->tanggal_exp}}</td>
                    <td>

                        <a href="{{ route('obat.edit', $value->id) }}" class="btn btn-primary">Edit</a>
                        <form onsubmit="return confirm('Apakah anda yakin untuk menghapus ini?')" action="{{ route('obat.destroy', $value->id) }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                  </tr>

                  @endforeach
                </tbody>
              </table>
              {{ $obat->links() }}
        </div>
    </div>
</div>


@endsection
