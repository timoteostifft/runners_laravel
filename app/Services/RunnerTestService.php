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

  public function remove($testId, $runnerId)
  {
    return $this->runnerTestRepository->remove($testId, $runnerId);
  }

  public function setResult($data, $testId, $runnerId)
  {
    return $this->runnerTestRepository->setResult($data, $testId, $runnerId);
  }
}