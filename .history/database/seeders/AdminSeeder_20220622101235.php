<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::insert([
            'name' => 'Admin',
            'username' => 'admin',
            'password'=>bcrypt('123'),
            'created_at'=>Carbon::now('Asia/Jakarta');
        ])
    }
}
