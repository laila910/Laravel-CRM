<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::UpdateOrCreate(['id'=>1],[
          'name'=>"Laila Ibrahim",
          'email'=>'lailaibrahim798@gmail.com',
          'password'=>'$2y$10$V0ZJKLMpF3vf64zeo9FnmO.EHtfixldLktswBJBMqaDXeZ12/AWTi',//password :)
          'admin'=>1
        ]);
    }
}
