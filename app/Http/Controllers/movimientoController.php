<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\tarjeta;
use Illuminate\Support\Facades\Auth;
use DB;

class movimientoController extends Controller
{
    public function index()
    {   
        $us = Auth::user();
        $user = user::find($us);
        $tarjeta = tarjeta::all();
        return view('movimiento', compact('tarjeta', 'user'));
    }
}
