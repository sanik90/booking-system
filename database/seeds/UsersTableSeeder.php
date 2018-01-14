<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {

    	$users = [
        [
          'name' => 'root',
		    	'email' => 'root@mail.my',
		    	'password' => 'secret'
    		]
    	];

        foreach ($users as $user) {
          $u = new User;
          foreach ($user as $property => $value) {
            $u->{$property} = $value;
          }
          $u->save();
        }
    }
}
