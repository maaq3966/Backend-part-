<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'hash_id' => User::generateHashId(),
            'name' => 'ahmed',
            'email' => 'm.ah@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
