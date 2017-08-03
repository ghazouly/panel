<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'detention_place';
    protected $fillable = ['title','type','client_id','description','link'];

    public function client(){
      return $this->belongsTo('Client', 'client_id');
    }
}
