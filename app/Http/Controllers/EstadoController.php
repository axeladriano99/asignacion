<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class EstadoController
 * @package App\Http\Controllers
 */
class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     
        
     public function __construct(){
        //$this->middleware('can:areas.index');
    }
    public function index()
    {
        $estados = Estado::all()->where('estado','=','1');
        return view('estado.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = new Estado();
        return view('estado.create', compact('estado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Estado::$rules);

        $estado = Estado::create($request->all());

        return redirect()->route('estados.index')
            ->with('exito', 'Estado creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estado = Estado::find($id);

        return view('estado.show', compact('estado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estado = Estado::find($id);

        return view('estado.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Estado $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado $estado)
    {
       // return 'dasdas';
       request()->validate(Estado::$rules);

        $estado->update($request->all());

        return redirect()->route('estados.index')
            ->with('exito', 'Estado actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user= Auth::id();
        $estado= Estado::find($id);
        $estado->estado=2;
        $estado->save();
        return redirect()->route('estados.index')
            ->with('exito', 'Estado eliminado correctamente');
        /*
        $estado = Estado::find($id)->delete();

        */
    }
    public function listaEstados(){
        $estado = Estado::all()->where('estado','=',1);
        return datatables()->collection($estado)->toJson();

    }
}