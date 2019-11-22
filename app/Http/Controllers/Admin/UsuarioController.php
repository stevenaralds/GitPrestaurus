<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Role;


use App\Http\Requests\UsuarioStoreRequest;
use App\Http\Requests\UsuarioUpdateRequest;


use App\Services\PayUService\Exception;

class UsuarioController extends Controller
{
    public function index(){

        $users = User::paginate();

        return view('Admin.usuarios.listar', compact('users'));
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('Admin.usuarios.mostrar', compact('user'));
    }




    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get();

        return view('Admin.usuarios.editar', compact('user', 'roles'));


    }

    public function update(UsuarioUpdateRequest $request, $id)
    {

        $user = User::find($id);
        $user->update($request->all());

        //dd($request->get('roles'));
         // $user->permissions()->sync($request->get('roles'));

         $user->syncRoles($request->get('roles'));

        return redirect()->route('users.edit', $user->id)
            ->with('info', 'Usuario actualizado con éxito');

    }



    public function destroy(Request $request, $id)
    {

        if($request->ajax()){
            $objusuarios=User::find($id)->delete();

            return response()->json([
                'mensaje' =>   ' El usuario fue eliminado con éxito'

            ]);

        }

        return back();
    }
}
