<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class RunnerTest extends Model
{
  public $timestamps = false;

  protected $table = 'runners_tests';
  protected $connection = 'mysql';
  protected $fillable = [
    'runner_id',
    'test_id'
  ];

  public function getTestDate($testId)
  {
    $date = DB::select("SELECT 
                  tests.date
                FROM
                  tests
                WHERE
                  tests.id = ?",[$testId]);
    return $date;
  }

  public function isRunnerAlreadyOnATestToday($runnerId)
  {
    $sql = DB::select("SELECT 
                  tests.date
                FROM
                  tests
                JOIN
                  runners_tests ON
                  (
                    tests.id = runners_tests.test_id 
                  )
                WHERE
                  runners_tests.runner_id = ?",[$runnerId]);

    return $sql;
  }
}