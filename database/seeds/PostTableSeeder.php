<?php

use Illuminate\Database\Seeder;

/**
 * @package PostTableSeeder.php
 * @author  Christoph Kluge <work@christoph-kluge.eu>
 * @since   09.02.16
 */
class PostTableSeeder extends Seeder
{

  public function run()
  {
    App\Post::truncate();

    factory(App\Post::class, 20)->create();
  }
}