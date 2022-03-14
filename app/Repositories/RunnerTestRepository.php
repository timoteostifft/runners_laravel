<?php

namespace App\Repositories;
use App\Models\RunnerTest;

class RunnerTestRepository 
{
  protected $model;

  public function __construct(RunnerTest $model)
  {
    $this->model = $model;
  }

  public function list($testId, $runnerId)
  {
    // return $this->model->list($testId, $runnerId);
    return $this->model->where('test_id','=',$testId)->where('runner_id','=',$runnerId)->get();
  }

  public function register($testId, $runnerId)
  {
    return $this->model->create([
      'test_id' => $testId,
      'runner_id' => $runnerId
    ]);
  }

  public function remove($testId, $runnerId){
    $sql = $this->model->where('test_id','=',$testId)->where('runner_id','=',$runnerId)->get();
    $this->model->where('test_id','=',$testId)->where('runner_id','=',$runnerId)->delete();
    return $sql;
  }
}