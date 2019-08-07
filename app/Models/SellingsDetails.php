<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SellingsDetails extends Model
{
    use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $table = 'sellings_details';
  protected $primaryKey = 'idsellingsdetails';    


  public function foods()
  {
    return $this->belongsTo('App\Models\Foods', 'idfoods');
  }

}
