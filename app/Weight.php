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
        $weights = static::all();

        foreach ($weights as $weight) {
            return $weight->weight;
        }
    }
}
