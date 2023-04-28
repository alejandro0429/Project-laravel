<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Morosidad;
use Illuminate\Support\Facades\Auth;

class MorosoController extends Controller
{
    public function index()
    {   
        $use = Auth::user();
        $user = user::find($use);
        $morosidad = Morosidad::all();

        return view('moroso', compact('morosidad', 'user'));
    }
}
