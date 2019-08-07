<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Foods extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'foods';
    protected $primaryKey = 'idfoods';

    protected $fillable = [
        'name','price','hargadasar','laba','description'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    
   
}
