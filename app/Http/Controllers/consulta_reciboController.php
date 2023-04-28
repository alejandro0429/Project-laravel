<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\tarjeta;
use App\Models\consulta_recibo;
use App\Models\consultas_recibo;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class consulta_reciboController extends Controller
{
    public function index()
    {   
        $user = user::all();
        $tarjeta = tarjeta::all();

        return view('consulta_recibo.index', compact('tarjeta', 'user'));
    }
}
