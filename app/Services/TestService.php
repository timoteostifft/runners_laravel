<?php

namespace App\Services;
use App\Repositories\TestRepository;

class TestService{

  protected $testRepository;

  public function __construct(TestRepository $testRepository)
  {
    $this->testRepository = $testRepository;
  }

  public function listByAge()
  {
    $data =  $this->testRepository->list();
    foreach ($data as $test){
      $runners = $this->testRepository->getRunnersByAge($test->id);
      $test->runners = $runners;
    }

    return($data);
  }

  public function listByResult()
  {
    $data = $this->testRepository->list();

    foreach ($data as $test){
      $runners = $this->testRepository->getRunnersByResult($test->id);
      $test->runners = $runners;
    }
    return ($data);
  }

  public function register(array $data)
  {
    return $this->testRepository->register($data);
  }

  public function remove($id)
  {
    return $this->testRepository->remove($id);
  }
}