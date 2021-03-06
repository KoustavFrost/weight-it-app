<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'weight'
    ];

    public function getWeightFromDB()
    {
        return Weight::all();
    }
}
