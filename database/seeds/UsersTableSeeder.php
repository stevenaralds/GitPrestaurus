<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objusuario = new User();
        $objusuario->nombre="Steven Arango";
        $objusuario->email="stevenaralds@gmail.com";
        $objusuario->tel="2564455";
        $objusuario->cel="3148252659";
        $objusuario->dir="calle 3 b 78b 49";
        $objusuario->password=bcrypt('123');
        // $objusuario->role_id = $role_sadmin->id;//

        $objusuario->save();


        $objusuario = new User();
        $objusuario->nombre="pepito perez";
        $objusuario->email="pepito@gmail.com";
        $objusuario->password=bcrypt('123');
        $objusuario->tel="2564455";
        $objusuario->cel="3148252659";
        $objusuario->dir="calle 3 b 78b 49";
        // $objusuario->role_id=('2');

        $objusuario->save();
        //$objusuario->role()->associate($role_admin->id);

        $objusuario = new User();
        $objusuario->nombre="salomon ";
        $objusuario->email="salomon@gmail.com";
        $objusuario->password=bcrypt('123');
        $objusuario->tel="2564455";
        $objusuario->cel="3148252659";
        $objusuario->dir="calle 3 b 78b 49";
        // $objusuario->role_id=('3');

        $objusuario->save();
        //$objusuario->roles()->attach($role_usuario);


        // factory(App\User::class, 29)->create();
        // App\User::create([
        // 	'nombre' => 'Steven Arango',
        // 	'email'=> 'stevenaralds2@gmail.com',
        //     'password' => bcrypt('123'),

        //     'tel'=>"2564455",
        //     'cel'=>"3148252659",
        //     'dir'=>"calle 3 b 78b 49"

        // ]);
    }
}
