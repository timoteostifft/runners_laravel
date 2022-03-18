<?php

namespace App\Services;
use App\Repositories\RunnerTestRepository;
use App\Repositories\InscriptionRepository;

class RunnerTestService{

  protected $runnerTestRepository;

  public function __construct(RunnerTestRepository $runnerTestRepository, InscriptionRepository $inscriptionRepository)
  {
    $this->runnerTestRepository = $runnerTestRepository;
    $this->inscriptionRepository = $inscriptionRepository;
  }

  public function list($testId, $runnerId)
  {
    return $this->runnerTestRepository->list($testId, $runnerId);
  }

  public function register($testId, $runnerId)
  {
    if (!$this->inscriptionRepository->isRunnerAlreadyOnATestToday())
    {
      return $this->runnerTestRepository->register($testId, $runnerId);
    }
    return 'O corredor já está cadastrado em uma corrida hoje.';
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