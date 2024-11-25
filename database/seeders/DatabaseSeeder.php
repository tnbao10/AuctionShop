<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;
class DatabaseSeeder extends Seeder

{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(NguoiDung::class);
        $data = [
            [
                'username' => 'lnduc',
                'password' => Hash::make(123),
                'nd_hoten' => 'Le Ngoc Duc',
                'nd_email' => 'lnd@gmail.com',
                'nd_sdt' => '0123456789',
                'nd_namsinh' => '24/09/1998',
                'nd_diachi' => 'TP. HCM',
                'nd_trangthai' => 1
            ]
        ];

        DB::table('nguoidung')->insert($data);

        DB::table('quantrivien')->insert([
            'username'=>'admin',
            'password'=>Hash::make('admin'),
            'qt_hoten'=>'admin',
        ]);
    }
}
