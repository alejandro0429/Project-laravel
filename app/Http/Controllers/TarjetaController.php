<?php

namespace App\Http\Controllers;

use App\Models\tarjeta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class TarjetaController extends Controller
{
    public function index(User $id) {

        $user = Auth::user();
        return view ('tarjeta', compact("user"));
    }


    public function guardar(Request $request, User $user) {

        $request->validate([
            'banco' => 'required',
            'referencia' => 'required',
            'pdf' => 'required', 
            'fecha' =>'required',
        ],[
            'banco.required' => 'el campo no puede estar vacio',
            'referencia.required' => 'el campo no puede estar vacio',
            'PDF.required' => 'el campo no puede estar vacio',
            'fecha.required' => 'el campo no puede estar vacio'
        ]);

        $tarjeta = new tarjeta;
        $user = auth()->id();
        $tarjeta->banco = $request->input('banco');
        $tarjeta->referencia = $request->input('referencia');
        if($request->hasFile('pdf')){
            $archivo = $request->file('pdf');
            $archivo->move(public_path().'/Archivos/',$archivo->getClientOriginalName());
            $tarjeta->PDF = $archivo->getClientOriginalName();
        }
        $tarjeta->fecha = $request->input('fecha');
        $tarjeta->status = $request->input('status');
        $tarjeta->save();
        $tarjeta->users()->attach($user);
        session()->flash('status', '¡Su pago ha sido realizado exitosamente!');
        return redirect()->route('movimiento');
    }

    public function create(User $user, tarjeta $tarjeta){
        
        $user = User::pluck('cedula', 'id');
        return view ('tarjetaC', compact("user", 'tarjeta'));
    }

    public function store(Request $request, User $user) {

       

        $request->validate([
            'banco' => 'required',
            'referencia' => 'required',
            'pdf' => 'required', 
            'fecha' =>'required',
        ],[
            'banco.required' => 'el campo no puede estar vacio',
            'referencia.required' => 'el campo no puede estar vacio',
            'PDF.required' => 'el campo no puede estar vacio',
            'fecha.required' => 'el campo no puede estar vacio'
        ]);
        $tarjeta = new tarjeta();
        $user->id = $request->input('user_id');
        $tarjeta->banco = $request->input('banco');
        $tarjeta->referencia = $request->input('referencia');
        if($request->hasFile('pdf')){
            $archivo = $request->file('pdf');
            $archivo->move(public_path().'/Archivos/',$archivo->getClientOriginalName());
            $tarjeta->PDF = $archivo->getClientOriginalName();
        }
        $tarjeta->fecha = $request->input('fecha');
        $tarjeta->status = $request->input('status');
        $tarjeta->save();
        $tarjeta->users()->attach($user);
        session()->flash('status', '¡Se ha notificado el retraso del pago!');
        return back();
    }

    public function edit(tarjeta $tarjeta){     
        return view('tarjetaE',  compact ('tarjeta'));
}

    public function update(Request $request, $id){
    $tarjeta = Tarjeta::findOrFail($id);     
    $tarjeta->banco = $request->input('banco');
        $tarjeta->referencia = $request->input('referencia');
        if($request->hasFile('pdf')){
            $archivo = $request->file('pdf');
            $archivo->move(public_path().'/Archivos/',$archivo->getClientOriginalName());
            $tarjeta->PDF = $archivo->getClientOriginalName();
        }
        $tarjeta->fecha = $request->input('fecha');
        $tarjeta->status = $request->input('status');
    $tarjeta->update();
    return redirect()->route('movimiento')->with('success', 'Se ha actualizado el pago');
}
}