<?php

namespace App\Services;
use App\Repositories\RunnerTestRepository;

class RunnerTestService{

  protected $runnerTestRepository;

  public function __construct(RunnerTestRepository $runnerTestRepository)
  {
    $this->runnerTestRepository = $runnerTestRepository;
  }

  public function list($testId, $runnerId)
  {
    return $this->runnerTestRepository->list($testId, $runnerId);
  }

  public function register($testId, $runnerId)
  {
    return $this->runnerTestRepository->register($testId, $runnerId);
  }

  public function remove($id)
  {
    return $this->runnerTestRepository->remove($id);
  }

  public function findbyDate($date)
  {
    return $this->runnerTestRepository->findbyDate($date);
  }
}