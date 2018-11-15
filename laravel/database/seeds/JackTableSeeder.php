<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Barberservice;

class JackTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // factory(Post::class, 10)->create();
    // factory(Barberservice::class)->create();
    $this->serviceInit();
  }

  private function serviceInit()
  {
    $service = new Barberservice();
    $service->name = 'Haircuts';
    $service->image = 'http://silvercitybarber.co.uk/wp-content/uploads/2017/04/Fotolia_135351230_Subscription_Monthly_M-1618x1080.jpg';
    $service->price = 2800;
    $service->duration = 1;
    $service->save();

    $service = new Barberservice();
    $service->name = 'Dye Hair';
    $service->image = 'http://silvercitybarber.co.uk/wp-content/uploads/2017/04/Fotolia_135351230_Subscription_Monthly_M-1618x1080.jpg';
    $service->price = 3800;
    $service->duration = 1;
    $service->save();

    $service = new Barberservice();
    $service->name = 'Perm Hair';
    $service->image = 'http://silvercitybarber.co.uk/wp-content/uploads/2017/04/Fotolia_135351230_Subscription_Monthly_M-1618x1080.jpg';
    $service->price = 6800;
    $service->duration = 1;
    $service->save();
  }
}
