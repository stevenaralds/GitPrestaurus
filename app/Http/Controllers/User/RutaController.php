<?php

namespace App\Http\Controllers\User;

use App\Abono;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prestamo;
use Carbon\Carbon;
use DB;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $fechaactual=date('l');
        //dd($fechaactual);
        $objruta = Prestamo::orderBy('created_at', 'DESC')
        //->where('diaspago', $fechaactual  )
        ->where([ ['diaspago', '=',  $fechaactual], ['estado', '=', 'Activo'],['diaspago', '=',  'Todos'] ])
        //->orWhere([ ['diaspago', '=',  'Todos'], ['estado', '=', 'Activo'] ])
       // ->orWhere('diaspago', '=', 'Todos')
        
        
       // ->orwhere('formapago', 'Diario') // con esta linea quiero saber si el pago es 
        //diario, semanal, quincenal o mensual y si ese día toca hacerle cobro
        ->paginate();
        
        return view('User.rutas.index', compact('objruta'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexSem()
    {
       
        $fechaactual=date('l');
        //dd($fechaactual);
        $objruta = Prestamo::orderBy('created_at', 'DESC')
        //->where('diaspago', $fechaactual  )
        ->where([ ['diaspago', '=',  $fechaactual], ['estado', '=', 'Activo'] ])
        ->orWhere([ ['diaspago', '=',  'Todos'], ['estado', '=', 'Activo'] ])
       // ->orWhere('diaspago', '=', 'Todos')
        
        
       // ->orwhere('formapago', 'Diario') // con esta linea quiero saber si el pago es 
        //diario, semanal, quincenal o mensual y si ese día toca hacerle cobro
        ->paginate();
        
        return view('User.rutas.index', compact('objruta'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexQui()
    {
       
        $fechaactual=date('l');
        //dd($fechaactual);
        $objruta = Prestamo::orderBy('created_at', 'DESC')
        //->where('diaspago', $fechaactual  )
        ->where([ ['diaspago', '=',  $fechaactual], ['estado', '=', 'Activo'] ])
        ->orWhere([ ['diaspago', '=',  'Todos'], ['estado', '=', 'Activo'] ])
       // ->orWhere('diaspago', '=', 'Todos')
        
        
       // ->orwhere('formapago', 'Diario') // con esta linea quiero saber si el pago es 
        //diario, semanal, quincenal o mensual y si ese día toca hacerle cobro
        ->paginate();
        
        return view('User.rutas.index', compact('objruta'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMen()
    {
       $objabono=Abono::
        $diapago=date('d');
        
        //dd($fechaactual);
        $objruta = Prestamo::orderBy('created_at', 'DESC')
        //->where('diaspago', $fechaactual  )
        ->where([ ['formapago', '=',  'Mensual'], ['estado', '=', 'Activo'], [$diapago, '=',  $fechapago='created_at'->day] ])
        ->orWhere([ ['diaspago', '=',  'Todos'], ['estado', '=', 'Activo'] ])
       // ->orWhere('diaspago', '=', 'Todos')
       
        ->paginate();
        
        return view('User.rutas.index', compact('objruta'));
    }

   
}
