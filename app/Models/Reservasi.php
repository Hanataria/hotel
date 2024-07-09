<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_reservasi';

    protected $fillable = [
        'id_customer',
        'id_kamar',
        'check_in',
        'check_out',
        'jumlah_orang',
        'jumlah_pembayaran'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'id_kamar', 'id_kamar');
    }
}
