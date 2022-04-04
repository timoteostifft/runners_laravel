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
    $testsList =  $this->testRepository->list();

    foreach ($testsList as &$test)
    {
      $runners = $this->testRepository->getRunnersByAge($test->id);

      foreach($runners as $runner)
      {
        if($runner->age <= 25)
        {
          $test->youngerThan25[] = $runner;
          continue;
        }
        if($runner->age <= 35)
        {
          $test->youngerThan35 = $runner;
          continue;
        }
        if($runner->age <= 45)
        {
          $test->youngerThan45 = $runner;
          continue;
        }
        if($runner->age <= 55)
        {
          $test->youngerThan55 = $runner;
          continue;
        }
        $test->olderThan55 = $runner;
      }
    }
    return($testsList);
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