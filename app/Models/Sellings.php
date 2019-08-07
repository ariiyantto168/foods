<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sellings extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'sellings';
    protected $primaryKey = 'idsellings';

    public function sellings_details()
    {
        return $this->hasMany('App\Models\SellingsDetails', 'idsellings');
    }
}
