<?php

use Illuminate\Database\Seeder;
use App\Settings;
class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Settings::create([
            'site_name'=>'Endless',
            'address'=>'Assiout/Dairout/ZawyetHaroon',
            'contact_phone'=>'01129350885',
            'contact_email'=>'eldoon2141996@gmail.com',
        ]);
    }
}
