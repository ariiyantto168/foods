<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drinks extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'drinks';
    protected $primaryKey = 'iddrinks';

    protected $fillable = [
        'name','price','hargadasar','laba','description'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];
}
