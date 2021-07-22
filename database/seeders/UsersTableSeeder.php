<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Level;
use App\Models\Role;
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
        DB::table('users')->where('email', 'admin@gmail.com')->delete();


        $level = Level::create([
            'name' => 'Manager',
            'rank' => 1,
        ]);

        $role = Role::create([
            'name' => 'Admin',
            'description' => 'super admin',
        ]);

        $user = User::create([
            'name' => 'John Doe',
            'email' => 'admin@admin.com',
            'level_id' => $level->id
        ]);


        $user->roles()->sync([
            'user_id' => $user->id,
            'role_id' => $role->id,
        ]);


    }
}
