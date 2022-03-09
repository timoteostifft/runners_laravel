<?php

namespace App\Repositories;
use App\Models\Runner;

class RunnerRepository {
  protected $model;

  public function __construct(Runner $model){
    $this->model = $model;
  }

  public function list(){
    $this->model->list();
  }

  public function register(mixed $data){
    $this->model->register($data);
  }
}