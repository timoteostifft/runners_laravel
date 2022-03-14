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
      $runnersTestsList = $this->service->list($testId, $runnerId);
      return response()->json($runnersTestsList,Response::HTTP_OK);
    } catch (\Throwable$error){
      return response()->json("Erro ao listar inscritos em provas. Erro: {$error}",Response::HTTP_INTERNAL_SERVER_ERROR);
    }
  }

  public function register(Request $request, $testId, $runnerId)
  {
    try{
      $runnersTestsRegistered = $this->service->register($testId, $runnerId);
      return response()->json($runnersTestsRegistered,Response::HTTP_OK);
    } catch (\Throwable$error){
      return response()->json("Erro ao inscrever corredor em prova. Erro: {$error}",Response::HTTP_INTERNAL_SERVER_ERROR);
    }
  }

  public function remove($testId, $runenrId)
  {
    echo $testId .'-'. $runenrId;
  }
}
