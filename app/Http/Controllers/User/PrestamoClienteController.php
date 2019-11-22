<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Prestamo;


class PrestamoClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($objcliente)
    {
        $objprestamo = Prestamo::orderBy('id', 'DESC')
        ->where('user_id', $objcliente->id)
        ->paginate();

        return view('User.prestamos.listxcliente', compact('objprestamo','objcliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function buscarcliente()
    {


        return view('User.prestamos.buscarclientexcliente');
    }



    public function getclientebuscarcliente(Request $request)
    {
        $objcliente = DB::table('clientes')->select('id','cedula', 'nombre');

        $buscar=$request->input('buscar');

        $objcliente = $objcliente->where('cedula', 'like', '%' .$buscar .'%')->orWhere('nombre', 'like', '%'.$buscar.'%')->first();


        $objprestamo = Prestamo::orderBy('id', 'DESC')
        ->where('user_id', $objcliente->id)
        ->paginate();

        return view('User.Prestamos.indexxcliente', compact('objprestamo','objcliente'));

    }
}
