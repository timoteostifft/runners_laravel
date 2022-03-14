<?php

namespace App\Repositories;
use App\Models\RunnerTest;

class RunnerTestRepository 
{
  protected $model;

  public function __construct(RunnerTest $model)
  {
    $this->model = $model;
  }

  public function list()
  {
    return $this->model->get();
  }

  public function register(array $data)
  {
    return $this->model->create($data);
  }

  public function remove($id){
    $sql = $this->model->where('id',$id)->get();
    $this->model->remove($id);
    return $sql;
  }
}