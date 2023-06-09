<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Generator as Faker;

class Train_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 30; $i++) {
            $train = new Train();
            //popolo i campi
            $train->company_name = $faker->name();
            $train->station_start = $faker->text(100);
            $train->station_end = $faker->text(100);
            $timeStart = $faker->dateTimeBetween('now', '+2 days');
            $timeEnd = $faker->dateTimeBetween($timeStart, '+2 days');
            $train->time_start = $timeStart->format('Y-m-d H:i:s');
            $train->time_end = $timeEnd->format('Y-m-d H:i:s');
            $train->train_code = $faker->bothify('??-#####');
            $train->number_carriages = $faker->numberBetween(10, 300);
            $train->in_time = $faker->randomElement([true, false]);
            $train->delayed = $faker->randomElement([true, false]);
            $train->save();
        }
    }
}
