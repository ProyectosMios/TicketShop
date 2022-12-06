<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarioAdmin = User::create([
            'name' => 'Aaron',
            'email' => 'aaronsuarezsecades@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('aaron')
        ])-> assignRole('admin');

        $usuarioAdmin->addMedia('C:/laragon/www/TicketShop/public/perfil/aaron.jpg')
                ->usingFileName('aaron.jpg')
                ->toMediaCollection('perfils');

        $usuario = User::create([
            'name' => 'Tino',
            'email' => 'tinodeve@hotmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('tinodeve')
        ])-> assignRole('usuario');
        
        /*foreach(Role::all() as $role) {
            $users = User::factory(9)->create();
            foreach($users as $user){
               $user->assignRole('usuario');
            }
        }*/
    }
}
