<?php

namespace App\Repositories;
use App\Models\RunnerTest;

class InscriptionRepository 
{
  protected $model;

  public function __construct(RunnerTest $model)
  {
    $this->model = $model;
  }

  public function isRunnerAlreadyOnATestToday($testId, $runnerId)
  {
    $date = $this->model->getTestDate($testId);
    $sql = $this->model->isRunnerAlreadyOnATestToday($runnerId);

    foreach($sql as $day)
    {
      if($day == $date[0])
      {
        return true;
      }
    }
    return false;
  }
}