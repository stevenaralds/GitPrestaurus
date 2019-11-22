<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Cliente;
use App\Prestamo;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objcliente = Cliente::paginate();

        return view('User.Clientes.index', compact('objcliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.Clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$objcliente = Cliente::create($request->all());
        $objcliente = Cliente::create([

            'cedula' => request('cedula'),
            'nombre' => request('nombre'),
            'tel' => request('tel'),
            'cel' => request('cel'),
            'dir' => request('dir'),
            'email' => request('email'),
            'user_id' => auth()->id()
        ]);
        return redirect()->route('clientes.edit', $objcliente->id)->with('info', 'Cliente creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objcliente = Cliente::find($id);

        $objprestamo = Prestamo::orderBy('id', 'DESC')
        ->where('cliente_id', $objcliente->id)
        ->paginate();

        

        return view('User.Clientes.show', compact('objcliente','objprestamo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objcliente = Cliente::find($id);


        return view('User.Clientes.edit', compact('objcliente'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $objcliente = Cliente::find($id);
        $objcliente->fill($request->all())->save();
        return redirect()->route('clientes.edit', $objcliente->id)->with('info', 'Cliente actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $objcliente=Cliente::find($id)->delete();

            return response()->json([
                'mensaje' =>   ' El Cliente fue eliminado con éxito'

            ]);

        }

        return back();
    }
}
