@extends('layouts.layout')

@section('content')
<!-- template -->

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="page-title">
                <h3>Data Pegawai</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Pegawai</li>
                </ul>
            </div>
            <div class="page-btn">
                <a href="/pegawai/create" class="btn btn-added"><i data-feather="plus"></i><span>Pegawai</span></a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawai as $index => $p)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $p->nip }}</td>
                                            <td>{{ $p->nama }}</td>
                                            <td>{{ $p->email }}</td>
                                            <td>

                                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#emailModal{{ $p->id }}">
                                                    <i class="fa fa-envelope"></i>
                                                </button>
                                                <!-- Edit button -->
                                                <a href="{{ route('pegawai.edit', $p->id) }}" class="btn btn-primary btn-sm" title="Ubah Data">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <!-- Delete button -->
                                                <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Kamu Yakin Ingin Hapus Produk Ini?');">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>

                                                <a href="{{ route('pegawai.show', $p->id) }}" class="btn btn-success btn-sm" title="lihat Data">
                                                    <i class="fa fa-tags"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- Modal kirim Email --}}
<div class="modal fade" id="emailModal{{ $p->id }}" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('pegawai.sendEmail', $p->id) }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="emailModalLabel">Kirim Email ke {{ $p->nama }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="subject">Subjek</label>
                        <input type="text" name="subject" class="form-control" placeholder="Masukkan subjek email" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="message">Pesan</label>
                        <textarea name="message" class="form-control" rows="5" required>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida.</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
