<?php

namespace App\Services;
use App\Repositories\TestRepository;

class TestService{

  protected $testRepository;

  public function __construct(TestRepository $testRepository)
  {
    $this->testRepository = $testRepository;
  }

  public function list()
  {
    $data =  $this->testRepository->list();
    foreach ($data as $test){
      $runners = $this->testRepository->getRunners($test->id);
      $test->runners = $runners;
    }
    return($data);
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