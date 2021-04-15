<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $table = 'customers';
  protected $fillable = ['name','last_name','mother_last_name','street','number','suburb','zip','phone','rfc','status'];

  public function files(){
    return $this->hasMany('App\File');
  }
}
