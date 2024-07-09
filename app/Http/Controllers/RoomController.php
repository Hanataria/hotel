<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $room = Room::all();
        return view('welcome', compact('room'));
    }
}
