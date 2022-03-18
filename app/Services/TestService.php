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

    foreach ($testsList as $test)
    {
      $runners = $this->testRepository->getRunnersByAge($test->id);

      $youngerThan25 = (array) null;
      $youngerThan35 = (array) null;
      $youngerThan45 = (array) null;
      $youngerThan55 = (array) null;
      $olderThan55 = (array) null;

      foreach($runners as $runner)
      {        
        if($runner->age <= 25)
        {
          array_push($youngerThan25, $runner);
        } else {
          if($runner->age <= 35){
            array_push($youngerThan35, $runner);
          } else {
            if($runner->age <= 45){
              array_push($youngerThan45, $runner);
            } else {
              if ($runner->age <= 55){
                array_push($youngerThan55, $runner);
              } else {
                array_push($olderThan55, $runner);
              }
            } 
          }
        }
      }
      $test->youngerThan25 = $youngerThan25;
      $test->youngerThan35 = $youngerThan35;
      $test->youngerThan45 = $youngerThan45;
      $test->youngerThan55 = $youngerThan55;
      $test->olderThan55 = $olderThan55;
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