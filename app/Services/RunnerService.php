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
    if ($this->isRunnerOlderThan18($data))
    {
      return $this->runnerRepository->register($data);
    }
    return 'Não é possível cadastrar um menor de idade.';
  }

  public function remove($id)
  {
    return $this->runnerRepository->remove($id);
  }

  public function findbyDate($date)
  {
    return $this->runnerRepository->findbyDate($date);
  }

  private function isRunnerOlderThan18($data)
  {
    $currentDate = date("Y-m-d");

    $age = date_diff(date_create($data['birth']), date_create($currentDate));

    if($age->y <18)
    {
      return false;
    }

    return true;
  }
}