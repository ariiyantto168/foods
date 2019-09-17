<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'address';
    protected $primaryKey = 'idaddress';
}
