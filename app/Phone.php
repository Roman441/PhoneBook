<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    public $timestamps = false;

    protected $fillable = ['number', 'organization', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
