<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Data Reservasi</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Data Reservasi</h5>
                <form action="{{ route('welcome.update', $reservasi->id_reservasi) }}" method="POST">
                    @csrf
                    @method('PUT')
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
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
