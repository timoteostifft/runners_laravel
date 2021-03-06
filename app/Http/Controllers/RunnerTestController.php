<?php

namespace App\Http\Controllers;

use App\Services\RunnerTestService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RunnerTestController extends Controller
{
  protected $service;

  public function __construct(RunnerTestService $service)
  {
      $this->service = $service;
  }

  public function list(Request $request, $testId, $runnerId)
  {
    try{
      $list = $this->service->list($testId, $runnerId);
      return response()->json($list,Response::HTTP_OK);
    } catch (\Throwable$error){
      return response()->json("Erro ao listar inscritos em provas. Erro: {$error}",Response::HTTP_INTERNAL_SERVER_ERROR);
    }
  }

  public function register(Request $request, $testId, $runnerId)
  {
    try{
      $registered = $this->service->register($testId, $runnerId);
      return response()->json($registered,Response::HTTP_OK);
    } catch (\Throwable$error){
      return response()->json("Erro ao inscrever corredor em prova. Erro: {$error}",Response::HTTP_INTERNAL_SERVER_ERROR);
    }
  }

  public function remove(Request $request, $testId, $runnerId)
  {
    try{
      $removed = $this->service->remove($testId, $runnerId);
      return response()->json($removed,Response::HTTP_OK);
    } catch (\Throwable$error){
      return response()->json("Erro ao remover corredor de prova. Erro: {$error}",Response::HTTP_INTERNAL_SERVER_ERROR);
    }
  }

  public function setResult(Request $request, $testId, $runnerId)
  {
    try{
      $result = $this->service->setResult($request, $testId, $runnerId);
      return response()->json($testId, Response::HTTP_OK);
    } catch (\Throwable$error){
      return response()->json("Error ao atualizar resultado de prova. Erro: {$error}", Response::HTTP_INTERNAL_SERVER_ERROR);
    }
  }
}
