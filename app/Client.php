<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $fillable = ['title','description','status','contact_phone',
                          'contract_start_date','contract_end_date'];

    public function service(){
        return $this->hasMany('Service', 'client_id','id');
    }
}
