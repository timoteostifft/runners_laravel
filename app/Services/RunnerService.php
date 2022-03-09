<?php

namespace App\Services;
use App\Repositories\RunnerRepository;

class RunnerService{

  protected $runnerRepository;

  public function __construct(RunnerRepository $runnerRepository){
    $this->runnerRepository = $runnerRepository;
  }

  public function list(){
    return $this->runnerRepository->list();
  }

  public function register(mixed $data){
    return $this->runnerRepository->register();
  }

}