<?php

namespace App\Http\Controllers;

use App\Models\Morosidad;
use App\Models\User;
use App\Models\tarjeta;
use Illuminate\Http\Request;

/**
 * Class MorosidadController
 * @package App\Http\Controllers
 */
class MorosidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $morosidads = Morosidad::paginate();

        return view('morosidad.index', compact('morosidads'))
            ->with('i', (request()->input('page', 1) - 1) * $morosidads->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = user::pluck('cedula','id', 'name');
        $tarjeta = tarjeta::all();
        $morosidad = new Tarjeta();
        return view('morosidad.create', compact('morosidad','tarjeta', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Morosidad::$rules);

        $morosidad = Morosidad::create($request->all());

        return redirect()->route('morosidads.index')
            ->with('success', 'Se ha notificado del retraso de pago.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $morosidad = Morosidad::find($id);

        return view('morosidad.show', compact('morosidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = user::pluck('cedula','id');
        $morosidad = Morosidad::find($id);

        return view('morosidad.edit', compact('morosidad', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Morosidad $morosidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Morosidad $morosidad)
    {
        request()->validate(Morosidad::$rules);

        $morosidad->update($request->all());

        return redirect()->route('morosidads.index')
            ->with('success', 'Morosidad updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $morosidad = Morosidad::find($id)->delete();

        return redirect()->route('morosidads.index')
            ->with('success', 'Morosidad deleted successfully');
    }
}
