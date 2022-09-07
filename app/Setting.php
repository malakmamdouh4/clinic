<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    

    protected $fillable = [
        'key',
        'value',
    ];

    // protected $casts = [
    //     'values' => 'array'
    // ];

    public function client()
    {
        return $this->hasMany('App\Client','setting_id');
    }

}
