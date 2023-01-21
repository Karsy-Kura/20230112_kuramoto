<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    $tags = array('家事', '勉強', '運動', '食事', '移動');

    foreach ($tags as $tag)
    {
      Tag::create(['name' => $tag]);
    }
  }
}
