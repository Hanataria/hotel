<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data Reservasi</title>
    <style>
        .modal {
            z-index: 1050;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                    Tambah Data Reservasi
                </button>

                <!-- Modal -->
                <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahModalLabel">Tambah Data Reservasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="form-tambah" action="{{ route('welcome.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="id_customer" class="form-label">Pelanggan</label>
                                        <select class="form-control" id="id_customer" name="id_customer" required>
                                            <option value="">Pilih Pelanggan</option>
                                            @foreach($customers as $customer)
                                                <option value="{{ $customer->id_customer }}">{{ $customer->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_kamar" class="form-label">Kamar</label>
                                        <select class="form-control" id="id_kamar" name="id_kamar" required>
                                            <option value="">Pilih Kamar</option>
                                            @foreach($rooms as $room)
                                                <option value="{{ $room->id_kamar }}">{{ $room->no_kamar }} - {{ $room->tipe_kamar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="check_in" class="form-label">Check-in</label>
                                        <input type="date" class="form-control" id="check_in" name="check_in" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="check_out" class="form-label">Check-out</label>
                                        <input type="date" class="form-control" id="check_out" name="check_out" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah_orang" class="form-label">Jumlah Orang</label>
                                        <input type="number" class="form-control" id="jumlah_orang" name="jumlah_orang" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah_pembayaran" class="form-label">Jumlah Pembayaran</label>
                                        <input type="number" class="form-control" id="jumlah_pembayaran" name="jumlah_pembayaran" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" form="form-tambah">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h5 class="card-title">Data Reservasi</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">No Kamar</th>
                            <th scope="col">Check in</th>
                            <th scope="col">Check Out</th>
                            <th scope="col">Jumlah Pembayaran</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservasi as $item)
                            <tr>
                                <td>{{ $item->id_reservasi }}</td>
                                <td>{{ $item->customer->nama }}</td>
                                <td>{{ $item->room->no_kamar }} - {{ $item->room->tipe_kamar }}</td>
                                <td>{{ $item->check_in }}</td>
                                <td>{{ $item->check_out }}</td>
                                <td>{{ $item->jumlah_pembayaran }}</td>
                                <td>
                                    <a href="edit-data-reservasi/{{ $item->id_reservasi }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('welcome.destroy', $item->id_reservasi) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https
