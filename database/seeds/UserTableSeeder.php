<?php

use App\Persona;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        
        $persona = new Persona();
        $persona->nombre = 'Gerardo';
        $persona->ci = '9799190';
        $persona->apellidos ='Arias';
        $persona->direccion_id = 1;
        $persona->save();
        
        $administrador = User::create([
            'name' => 'gerard999',
            'email' => 'gerard_ch07@hotmail.com',
            'password' => Hash::make('23defebrero'),
            'avatar'=> 'imagenes/avatares.jpg',
        ]);   

        $administrador->assignRole('administrador');

        // $persona = new Persona();
        // $persona->nombre = 'Elena';
        // $persona->apellidos ='Suarez';
        // $persona->ci = '';
        // // $persona->condicion = 0;
        // $persona->direccion_id = 1;
        // $persona->save();
        
        // $medico = User::create([
        //     'email' => 'medico@gmail.com',
        //     'password' => Hash::make('23defebrero'),
        //     'avatar'=> 'imagenes/avatares.jpg',

        //     'estado' => 1,
        //     'registro' => 1

        // ]);   

        // $medico->assignRole('medico');


        // $persona = new Persona();
        // $persona->nombre = 'Melissa';
        // $persona->apellidos ='Santana';
        // $persona->ci = '';
        // $persona->condicion = 0;
        // $persona->direccion_id = 1;
        // $persona->save();
        
        // $paciente = User::create([
        //     'email'=>'paciente@gmail.com',
        //     'password'=>Hash::make('23defebrero'),
        //     'avatar'=> 'imagenes/avatares.jpg',

        //     'estado' => 1,
        //     'registro' => 1

        // ]);

        // $paciente->assignRole('paciente');


        // $persona = new Persona();
        // $persona->nombre = 'Diana';
        // $persona->apellidos ='Santana';
        // $persona->ci = '';
        // // $persona->condicion = 0;
        // $persona->direccion_id = 1;
        // $persona->save();

        // $invitado = User::create([
        //     'email'=>'invitado@gmail.com',
        //     'password' => Hash::make('23defebrero'),
        //     'avatar'=> 'imagenes/avatares.jpg',

        //     'estado' => 1,
        //     'registro' => 1
        // ]);

        // $invitado->assignRole('invitado');


        // $medico = User::create([
        //     'email'     => 'fernanda@gmail.com',
        //     'password'  => Hash::make('12345678'),
        // ]);

        // $medico->assignRole('medico');

        // $paciente = User::create([
        //     'email'     => 'elenita@gmail.com',
        //     'password'  => Hash::make('12345678'),
        // ]);
        // $paciente->assignRole('paciente');
    }
}
