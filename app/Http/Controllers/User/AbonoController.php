<?php

namespace App\Http\Controllers\User;

use App\Abono;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        return view('User.Abonos.create')->with(['prestamo_id'=>$request->prestamoid,'vlrcuota'=>$request->vlrcuota]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd( $request);
        $objabono = Abono::create([

            'abono_id' => $request->input('abono_id'),
            'prestamo_id' => $request->input('prestamo_id'),
           
            'nrocuotas' => request('nrocuotas'),
            'valor' => $request->input('vlrcuota'),
            // variable->funcion de la relacion -> campo 
            
        ]);
        
        return redirect()->route('abonos.create', $objabono->id)->with('info', 'Abono creado con éxito');
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
}
