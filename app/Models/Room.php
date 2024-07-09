<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_kamar';

    protected $fillable = [
        'no_kamar',
        'tipe_kamar',
        'status_kamar',
        'harga_permalam',
        'foto'
    ];
}

