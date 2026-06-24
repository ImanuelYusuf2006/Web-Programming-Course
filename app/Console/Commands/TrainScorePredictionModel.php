<?php

namespace App\Console\Commands;

use Faker\Factory;
use Illuminate\Console\Command;

class TrainScorePredictionModel extends Command
{
    protected $signature = 'student-score-prediction:train';
    protected $description = 'Train student score prediction model';

    public function handle()
    {
        $faker = Factory::create();
        $attributes = [];
        $labels = [];

        for ($i = 0; $i < 200; $i++){
            $attendance = $faker->randomNumber(40, 100);
            $assignment = $faker->randomNumber(40, 100);
            $mid_exam = $faker->randomNumber(40, 100);
            $final_exam = $faker->randomNumber(40, 100);
        }
    }
}
