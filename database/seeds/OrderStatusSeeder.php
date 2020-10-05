<?php

use Illuminate\Database\Seeder;
use App\Models\OrderStatus;
class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::create(['title'=>'Pending']);
        OrderStatus::create(['title'=>'Done']);
        OrderStatus::create(['title'=>'Canceled']);

    }
}
