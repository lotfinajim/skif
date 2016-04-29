<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructeurs extends Model
{
  protected $fillable = [
      'nom',
      'prenom',
      'grade',
      'yearsOfPractice',
      'Descritption',
      'linkImage',
      'status'
  ];
}
