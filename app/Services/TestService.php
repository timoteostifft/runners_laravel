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
    return $this->testRepository->list();
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