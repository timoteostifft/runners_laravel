<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Test extends Model
{
  public $timestamps = false;
  protected $connection = 'sqlite';
  protected $fillable = [
    'type',
    'date',
    'start',
    'finish'
  ];

  public function remove($id)
  {
    self::where('id', $id)->delete();
  }

  public function getRunners($testId)
  {
    
    $sql = DB::select("select runners.id, runners.name, runners.cpf, runners.birth from runners, runners_tests where runners.id = runners_tests.runner_id and runners_tests.test_id = ?",[$testId]);
    
    $runnersArray = array();

    foreach($sql as $object)
    {
      
      array_push($runnersArray, $object);
    }

    return $sql;
  }
}         