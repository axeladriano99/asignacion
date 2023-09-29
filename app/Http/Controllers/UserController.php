<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Area;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\Http\Controllers\ValidationException;
use Laravel\Ui\Presets\React;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->where('estado', '=', 1);
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable(){
        $users = DB::Table('users')
        ->join('areas','users.idArea','=','areas.id')
        ->select('users.*','areas.nombre as idArea')
        ->where('users.estado',1)
        ->get();
        return datatables()->collection($users)->toJson();
    }

    public function create()
    {
        $user = new User();
        $area =  Area::pluck('nombre', 'id');
        return view('user.create', compact('user', 'area'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(User::validationRules(), User::validationMessages());

        $user = User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $area = Area::pluck('nombre', 'id');
        return view('user.edit', compact('user', 'area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        $user->update($request->all());

        return redirect('users')
            ->with('success', 'Usuario actualizado correctamente');
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
        $usuario = User::find($id);
        $usuario->estado = 2;
        $usuario->save();
        return redirect('users')
            ->with('success', 'Usuario eliminado correctamente');
    }
    public function dni(Request $request)
    {
        $userId = $request->input('buscar');
        $client = new Client();
        $url = 'http://mundoapu.com:7415/?documento='.$userId; // Reemplaza esto con la URL de la API que deseas consumir
        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);
        return view('user.index',compact('data'));
       
    }
}
