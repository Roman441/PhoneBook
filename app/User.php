<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];

    public function phone()
    {
        return $this->hasOne('App\Phone');
    }
}
