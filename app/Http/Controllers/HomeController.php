<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Tarea;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $userId = Auth::id();
            $area_admi =DB::table('users')
            ->select('idArea')
            ->where('id','=',$userId)
            ->first();
            $personal_sistemas= DB::table('users')
            ->select('users.*')
            ->where('idArea','=',$area_admi->idArea)
            ->get();
            $tareas_iniciadas = DB::table('tareas')
                ->join('estados', 'tareas.idEstado', '=', 'estados.id')
                ->join('users','tareas.idCreador','=','users.id')
                ->select('tareas.*','estados.name as estados_id','users.name as idCreador')
                ->where('tareas.idUsuario', $userId)
                ->where('tareas.idEstado', 2)
                ->where('tareas.estado',1)
                ->get();
            $tareas_sin_iniciar =  DB::table('tareas')
            ->join('estados', 'tareas.idEstado', '=', 'estados.id')
            ->join('users','tareas.idCreador','=','users.id')
            ->select('tareas.*','estados.name as estados_id','users.name as idCreador')
            ->where('tareas.idUsuario', $userId)
            ->where('tareas.idEstado', 1)
            ->where('tareas.estado',1)
            ->get();

            $tareas_terminadas = DB::table('tareas')
            ->join('estados', 'tareas.idEstado', '=', 'estados.id')
            ->join('users','tareas.idCreador','=','users.id')
            ->select('tareas.*','estados.name as estados_id','users.name as idCreador')
            ->where('tareas.idUsuario', $userId)
            ->where('tareas.idEstado', 3)
            ->where('tareas.estado',1)
            ->get();
            return view('home',compact('tareas_iniciadas','tareas_sin_iniciar','tareas_terminadas','personal_sistemas'));
    }

    // este metodo edit edita la ta tarea y lo pasa a estado de sin iniciar a iniciado y terminado,

       
        /*
        $userId = Auth::id();

        $tareas_sin_iniciar = DB::table('tareas')
            ->join('estados', 'tareas.idEstado', '=', 'estados.id')
            ->select('tareas.*','estados.name as estados_id')
            ->where('tareas.idUsuario', $userId)
            ->where('tareas.idEstado', 1)
            ->get();

        
        $tareas_iniciadas = DB::table('tareas')
        ->join('estados', 'tareas.idEstado', '=', 'estados.id')
        ->select('tareas.*','estados.name as estados_id')
        ->where('tareas.idUsuario', $userId)
        ->where('tareas.idEstado', 2)
        ->get();

        $tareas_terminadas = DB::table('tareas')
        ->join('estados', 'tareas.idEstado', '=', 'estados.id')
        ->select('tareas.*','estados.name as estados_id')
        ->where('tareas.idUsuario', $userId)
        ->where('tareas.idEstado', 3)
        ->get();
        return view('home',compact('tareas_sin_iniciar','tareas_iniciadas','tareas_terminadas'));*/
    

    public function update($id){
       $idEstadoCambiado =  Tarea::find($id);
        if($idEstadoCambiado->idEstado==1){
            $idEstadoCambiado->idEstado=2;
            
        }
        if($idEstadoCambiado->idEstado==2)
            $idEstadoCambiado->idEstado=3;
            
               
        $idEstadoCambiado->save();
        return redirect('home');
    }
}