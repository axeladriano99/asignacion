<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Estado;
use App\Models\Historial;
use Illuminate\Http\Request;

/**
 * Class TareaController
 * @package App\Http\Controllers
 */
class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tareas = Tarea::join('estados', 'tareas.idEstado', '=', 'estados.id')
        ->select("tareas.*",'estados.name as idEstado')
        ->get();
        return view('tarea.index', compact('tareas'));
        /*
        $tareas = Tarea::all()->where('estado','=',1)->join('estados.*');
        return view('tarea.index', compact('tareas'));*/
    }
    public function listarTareas()
{
    $tareas = DB::table('tareas')
        ->join('estados', 'tareas.idEstado', '=', 'estados.id')
        ->join('users as creador', 'tareas.idCreador', '=', 'creador.id')
        ->join('users as asignado', 'tareas.idUsuario', '=', 'asignado.id')
        ->select('tareas.*', 'estados.name as estados_id', 'creador.name as idCreador', 'asignado.name as nombre')
        ->where('tareas.estado', 1)
        ->get();

    return datatables()->collection($tareas)->toJson();
}
   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tarea = new Tarea();
        $estado = Estado::pluck('name','id');
        $usuarios = User::pluck('name','id');
        return view('tarea.create', compact('tarea','estado','usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tarea::$rules);
        $request['fecha_creacion'] = date('Y-m-d H:i:s');
        $request['idCreador'] = Auth::id();
        //dd($request);
        //$tarea->update($request->all());
        $tarea = Tarea::create($request->all());
        return redirect()->route('tareas.index')
            ->with('success', 'Tarea creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarea = Tarea::find($id);
        $estado = Estado::pluck('name','id');
        return view('tarea.show', compact('tarea'.'estado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = Tarea::find($id);
        $usuarios = User::pluck('name','id');
        $estado = Estado::pluck('name','id');
        return view('tarea.edit', compact('tarea','estado','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tarea $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        request()->validate(Tarea::$rules);
        $tarea->update($request->all());

        return redirect('tareas')->with('success', 'Tarea actualizada correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        //optener usuario ingresado
        $userId = Auth::id();
        $tareas = Tarea::find($id);
        $tareas->estado = 2;
        $tareas->save();
        $actualizacion = DB::table('historial')
            ->insert([
                'idUsuario' => $userId,
                'idTarea' => $tareas->id,
                'descripcion' => 'se trato de eliminar la tarea'
            ]);
          return redirect()->route('tareas.index')
            ->with('success', 'Tarea eliminada correctamente');
        }   
     


        /*
        
        $actualizacion= DB::table('historial')
        ->update(['idUsuario'=>$userId])
        ->update(['idTarea'=>$tareas->id])
        ->update(['descripcion'=>'trato de eliminar la tarea ']);


        ->update(['name' => 'John Doe']);
        $tarea = Tarea::find($id)->delete();
        
        return redirect()->route('tareas.index')
            ->with('success', 'Tarea deleted successfully');

            */
    
}