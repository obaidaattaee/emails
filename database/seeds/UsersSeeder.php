<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Link;
use Spatie\Permission\Models\Role;
use App\Models\UserLink;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name'=>'admin']);
        $customerRole = Role::create(['name'=>'customer']);
        if(User::where('email','admin@epharm.com')->first()==null){

            $user = User::create(['email'=>'admin@epharm.com','password'=>bcrypt('123456'),'name'=>'Extra-Pharm Admin']);      
            $user->assignRole('admin');

            $links = Link::all();
            
            foreach($links as $link){
                UserLink::create([
                    'user_id' => $user->id,
                    'link_id' => $link->id,
                ]);
            }

        }
    }
}
