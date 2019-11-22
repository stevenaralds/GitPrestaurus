<?php

namespace App\Http\Controllers\User;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Prestamo;
use App\Abono;

use Illuminate\Support\Facades\Auth;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Auth::id()

        $objprestamo = Prestamo::orderBy('id', 'DESC')
        ->where('user_id', auth()->user()->id)
        ->paginate();

        return view('User.prestamos.index', compact('objprestamo','objcliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


         $objcliente = Cliente::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        //$objcliente = DB::table('clientes')->select('id', 'nombre');
       // dd($objcliente);
        return view('User.Prestamos.create', compact('objcliente'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->get('dias'));
        $objprestamo = Prestamo::create([

            'cliente_id' => $request->input('cliente_id'),

            'monto' => request('monto'),
            'interes' => $request->input('interes'),
            'totalapagar' => $request->input('totalapagar'),
            'formapago' => $request->input('formapago'),
            'nrocuotas' => $request->input('nrocuotas'),
            'vlrcuota' => $request->input('vlrcuota'),

            'diaspago' => $request->input('dias'),
            'saldo' => $request->input('totalapagar'),

            'estado' => 'Activo',

            'user_id' => Auth::id()

        ]);
        return redirect()->route('prestamos.create')->with('info', 'Prestamo creado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objprestamo = Prestamo::find($id);

        $objabono = Abono::orderBy('id', 'DESC')
        ->where('prestamo_id', $objprestamo->id)
        ->paginate();

        return view('User.Prestamos.show', compact('objprestamo','objabono'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objprestamo = Prestamo::find($id);

        $objcliente = Cliente::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        //dd(json_decode($objprestamo->diaspago));
        //dd(isset($objprestamo)?(in_array('monday',json_decode($objprestamo->diaspago))?true:false):'hola');
        return view('User.Prestamos.edit', compact('objprestamo','objcliente'));


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
        $objprestamo = Prestamo::find($id);
        $objprestamo->fill($request->all())->save();
        return redirect()->route('prestamos.edit', $objprestamo->id)->with('info', 'Prestamo actualizado con éxito');
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
            $objprestamo=Prestamo::find($id)->delete();

            return response()->json([
                'mensaje' =>   ' El prestamo fue eliminado con éxito'

            ]);

        }

        return back();
    }

    public function getcliente(Request $request)
    {
        $objcliente = DB::table('clientes')->select('id','cedula', 'nombre');

        $buscar=$request->input('buscar');

        $objcliente = $objcliente->where('cedula', 'like', '%' .$buscar .'%')->orWhere('nombre', 'like', '%'.$buscar.'%')->first();

        //dd($objcliente->first());
        return view('User.Prestamos.create', compact('objcliente'));
    }









}
