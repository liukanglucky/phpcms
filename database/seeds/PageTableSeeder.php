<?php

use Illuminate\Database\Seeder;
use App\pages;

class PageTableSeeder extends Seeder {

  public function run()
  {
    DB::table('pages')->delete();

    for ($i=0; $i < 10; $i++) {
      pages::create([
        'title'   => 'Title '.$i,
        'content' => 'Content'.$i,
        'sid'     => 1,
        'ugid'    => 1,]);
    }
  }

}