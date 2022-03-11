<?php

namespace App\Services;
use App\Repositories\RunnerRepository;

class RunnerService{

  protected $runnerRepository;

  public function __construct(RunnerRepository $runnerRepository)
  {
    $this->runnerRepository = $runnerRepository;
  }

  public function list()
  {
    return $this->runnerRepository->list();
  }

  public function register(array $data)
  {
    return $this->runnerRepository->register($data);
  }

  public function remove($id)
  {
    return $this->runnerRepository->remove($id);
  }

  public function findbyDate($date)
  {
    return $this->runnerRepository->findbyDate($date);
  }
}