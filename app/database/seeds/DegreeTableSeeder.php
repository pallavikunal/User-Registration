<?php

use Faker\Factory as Faker;

class DegreeTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('degree')->delete();
        $data = array(
            array('degreeName' => "BCA"),
            array('degreeName' => "MCA"),
            array('degreeName' => "MBA"),
            array('degreeName' => "BE"),
            array('degreeName' => "M-Tech")
        );
        DB::table('degree')->insert($data);
    }
}
