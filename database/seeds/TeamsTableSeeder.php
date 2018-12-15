<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = factory(App\Team::class, 50)->create()->each(function($t) {
            $t->players()->saveMany(factory(App\Player::class, 20)->make());
        });
    }
}
