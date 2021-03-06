<?php

namespace App\Repositories;
use App\Models\Runner;

class RunnerRepository 
{
  protected $model;

  public function __construct(Runner $model)
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