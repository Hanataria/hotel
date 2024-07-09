<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Customer;
use App\Models\Room;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasi = Reservasi::all();
        $customers = Customer::all();
        $rooms = Room::all();
        return view('welcome', compact('reservasi', 'customers', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_customer' => 'required',
            'id_kamar' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'jumlah_orang' => 'required|integer',
            'jumlah_pembayaran' => 'required|numeric'
        ]);

        Reservasi::create($request->all());

        return redirect()->route('welcome')->with('success', 'Data Reservasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $customers = Customer::all();
        $rooms = Room::all();
        $reservasi = Reservasi::findOrFail($id);
        return view('edit-data-reservasi', compact('reservasi', 'customers', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_customer' => 'required',
            'id_kamar' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'jumlah_orang' => 'required|integer',
            'jumlah_pembayaran' => 'required|numeric'
        ]);

        $reservasi = Reservasi::findOrFail($id);
        $reservasi->update($request->all());

        return redirect()->route('welcome')->with('success', 'Data Reservasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->delete();

        return redirect()->route('welcome')->with('success', 'Data Reservasi berhasil dihapus');
    }
}
