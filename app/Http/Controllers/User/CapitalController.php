<?php


namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;
 use Illuminate\Http\Request;
// use Request;

use App\Capital;
use App\Prestamo;
use App\User;


class CapitalController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $idusuario = Auth::id();
        $objcapital = Capital::findOrFail(Auth::id());
        // dd($objcapital);

        return view('User.capital', compact('objcapital'));
    }

    public function agregar(Request $request)
    {

        // $idusuario = Auth::id();
        $objcapital = Capital::find(Auth::id());

         //dd($subtotal);

        //  dd($total);
        // dd($objcapital);
        $objcapital->capitaltotal = $objcapital->capitaltotal + $request->input('monto');
        $objcapital->save();
        // $objcapital->fill($request->all())->save();
        //   return view('User.capital', compact('total','objcapital'));
        // // ----------------------------------

        // $pastel = Pastel::find($id);
        // $pastel->nombre = $request->input('nombre');
        // $pastel->sabor  = $request->input('sabor');
        // $pastel->save();
        return redirect()->route('capital.index');
     //  return redirect()->route('User.capital', $objcapital->id)->with('info', 'Etiqueta actualizada con éxito');
    }

    public function retirar(Request $request)
    {
        // $idusuario = Auth::id();
        $objcapital = Capital::find(Auth::id());

        //  dd($total);
        // dd($objcapital);
        $objcapital->capitaltotal = $objcapital->capitaltotal - $request->input('monto');
        $objcapital->save();

        return redirect()->route('capital.index');;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objcapital = Capital::get();

        return view('User.capital', compact('objcapital'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objcapital = Capital::create($request->all());
        return redirect()->route('capitals.edit', $objcapital->id)->with('info', 'Etiqueta creada con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objcapital = Capital::find($id);

        return view('User.capital', compact('objcapital'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, $id)

    {

        $objcapital = Capital::find($id);
        $objcapital->fill($request->all())->save();
        return redirect()->route('capitals.edit', $objcapital->id)->with('info', 'Etiqueta actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objcapital = Capital::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}

