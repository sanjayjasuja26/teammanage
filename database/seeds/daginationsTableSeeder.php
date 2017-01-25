<?php

use Illuminate\Database\Seeder;
use App\Dagination;
use Illuminate\Support\Facades\Hash;

class daginationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Dagination::truncate();
       $daginations=[
         ['dagination'=>'Developer'],
         ['dagination'=>'Senior Developer'],
         ['dagination'=>'Team Leader']
       ];
       foreach($daginations as $dagination)
       {
         $newdagination = new Dagination;
         $newdagination->dagination=$dagination['dagination'];
         $newdagination->save();
       }
    }
}
