<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
  public $timestamps = false;
  protected $connection = 'sqlite';
  protected $fillable = [
    'type',
    'date',
  ];

  public function remove($id){
    self::where('id', $id)->delete();
  }
}         