<?php


use Illuminate\Database\Seeder;
use App\Models\Team;
class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team=Team::create([
            'name'=>'No Team',
            'description'=>'Self Project Without Team',
            'slug'=>'no-team',
        ]);

    }
}
