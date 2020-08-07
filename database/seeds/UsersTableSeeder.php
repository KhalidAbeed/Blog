<?php
use App\User;
use App\Profile;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name'=>'Khaled Abeed',
            'email'=>'Khaled@Abeed.asd',
            'password'=>bcrypt('password'),
            'admin'=>1

        ]);

        Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'uploads/avatars/1.jpg',
            'about'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam nihil pariatur nesciunt non vel excepturi ipsam beatae temporibus blanditiis eveniet repellat animi voluptatibus perspiciatis dolor harum, voluptates repellendus fugit nostrum?',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com',

        ]);
    }
}
