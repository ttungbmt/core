<?php
namespace CMS\database\seeds;
use Illuminate\Database\Seeder;
use DB;

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
            [
                'name' => 'superadmin',
                'email' => 'superadmin@superadmin.com',
                'password' => bcrypt('superadmin'),
            ],
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'ttungbmt',
                'email' => 'ttungbmt@gmail.com',
                'password' => bcrypt('1166089zz1'),
            ],
        ]);
    }
}
