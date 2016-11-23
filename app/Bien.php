<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $table = 'biens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'active','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }



}
