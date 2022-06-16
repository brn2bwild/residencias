<?php

namespace Database\Seeders;

use App\Models\Estancia;
use App\Models\Modalidad;
use App\Models\Sector;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $usuario = User::create([
        'name' => 'Daniel Pérez Flores',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('12345678'),
      ]);

      Sector::create([
        'nombre' => 'Agro',
        'descripcion' => 'ninguna',
      ]);

      Modalidad::create([
        'nombre' => 'Interno',
        'descripcion' => 'ninguna',
      ]);

      Tipo::create([
        'nombre' => 'Nacional',
        'descripcion' => 'ninguna',
      ]);

      Estancia::create([
        'nombre' => 'Presencial',
        'descripcion' => 'ninguna',
      ]);

    }
}
