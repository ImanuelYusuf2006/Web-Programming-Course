<?php

namespace App\Services;

use Phpml\ModelManager;

class ScorePredictionService
{
    private $model;

    public function __construct()
    {
        $manager = new ModelManager();
        $model_path = storage_path('app/train_model/score_classifier_model.phpml');
        $this->model = $manager->restoreFromFile($model_path);
    }

    public function predict(
        int $attendance,
        int $assignment,
        int $mid_exam,
        int $final_exam,
    ): bool {
        $result = $this->model->predict(
            [$attendance, $assignment, $mid_exam, $final_exam]
        );

        return (bool)   $result;
    }
}
