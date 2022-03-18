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

  public function isRunnerAlreadyOnATestToday()
  {
    return true;
  }
}