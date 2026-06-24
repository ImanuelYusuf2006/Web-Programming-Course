<?php

namespace App\Console\Commands;

use Faker\Factory;
use Illuminate\Console\Command;
use Phpml\Classification\Ensemble\RandomForest;
use Phpml\ModelManager;

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
            $attendance = $faker->numberBetween(40, 100);
            $assignment = $faker->numberBetween(40, 100);
            $mid_exam = $faker->numberBetween(40, 100);
            $final_exam = $faker->numberBetween(40, 100);

            $attributes[] = [
                $attendance,
                $assignment,
                $mid_exam,
                $final_exam
            ];

            $avg = ($assignment + $mid_exam + $final_exam)/3;
            $status = $attendance < 85 || $avg < 75;

            $labels[] = $status ? 1 : 0;
        }

        $classifier = new RandomForest(10);
        $classifier->train($attributes, $labels);

        $manager = new ModelManager();
        $manager->saveToFile(
            $classifier,
            storage_path('app/train_model/score_classifier_model.phpml')
        );

        $this->info('model training success');
    }
}
