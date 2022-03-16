<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Test extends Model
{
  public $timestamps = false;
  protected $connection = 'mysql';
  protected $fillable = [
    'type',
    'date',
    'kickoff',
    'finish'
  ];

  public function remove($id)
  {
    self::where('id', $id)->delete();
  }

  public function getRunnersByAge($testId)
  {
    
  $sql = DB::select("SELECT 
                      runners.*,
                      DATE_FORMAT(FROM_DAYS(DATEDIFF(now(), runners.birth)), '%Y')+0 AS age,
                      runners_tests.id as 'runner_tests_id',
                      runners_tests.test_id
                    FROM 
                      runners
                    JOIN	
                      runners_tests on 
                      (
                        runners.id = runners_tests.runner_id
                      )
                    WHERE 
                      runners_tests.test_id  = ?
                    ORDER BY
                      birth DESC",[$testId]);
    
    //old list method
    //sql = DB::select("select runners.id, name, birth, cpf, DATE_FORMAT(FROM_DAYS(DATEDIFF(now(), birth)), '%Y')+0 AS age from runners, runners_tests where runners_tests.test_id = ? order by age",['1']);
    
    $runnersArray = array();

    foreach($sql as $object)
    {
      array_push($runnersArray, $object);
    }

    return $sql;
  }

  public function getRunnersByResult($testId)
  {
    $sql = DB::select('select runners.id, runners.name, runners.cpf, runners.birth, TIMEDIFF(runners_tests.finish, runners_tests.kickoff) AS time from runners, runners_tests where runners.id = runners_tests.runner_id and runners_tests.test_id = ? order by time',[$testId]);

    return($sql);
  }
}         