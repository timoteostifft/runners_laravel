<?php

namespace App\Services;
use App\Repositories\RunnerTestRepository;

class RunnerTestService{

  protected $runnerTestRepository;

  public function __construct(RunnerTestRepository $runnerTestRepository)
  {
    $this->runnerTestRepository = $runnerTestRepository;
  }

  public function list(array $data)
  {
    return dd($data);
    // return $this->runnerTestRepository->list();
  }

  public function register(array $data)
  {
    return $this->runnerTestRepository->register($data);
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