<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $user = factory(App\User::class)->create([
        //      'name' => 'admin',             
        //      'user_type' => 'admin',
        //      'email' => 'admin@gmail.com',
        //      // 'password' => bcrypt('admin')
        // ]);

         // Role::create(['name' => 'kitchen']);
        //  $user = User::find(5);
        // $user->assignRole('kitchen');
    }
}
