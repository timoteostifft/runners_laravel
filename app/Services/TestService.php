<?php

namespace App\Services;
use App\Repositories\RunnerRepository;

class RunnerService{

  protected $testRepository;

  public function __construct(TestRepository $runnerRepository){
    $this->testRepository = $testRepository;
  }

  public function list(){
    return $this->testRepository->list();
  }
}