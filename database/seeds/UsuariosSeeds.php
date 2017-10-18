<?php

use Illuminate\Database\Seeder;

class UsuariosSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
<<<<<<< HEAD
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Michel Bolzon',
            'email' => 'admin@mail.com',
            'password' => bcrypt('123456'),
        ]);
=======
    public function run(){
        if(User::where('email', '=', 'admin@mail.com')->count()){
            $usuario = User::where('email', '=', 'admin@mail.com')->first();
        }else{
            $usuario = new User();
            $usuario->name = "Michel Bolzon";
            $usuario->email = "admin@mail.com";
            $usuario->password = bcrypt("123456");
            $usuario->save();
        }

>>>>>>> d1323c4088d11a126eda0497710a1ec96b689eb0
    }
}
