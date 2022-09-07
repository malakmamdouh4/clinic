<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{

    protected $guarded = [];

    protected $hidden = [
        'created_at', 'updated_at' 
    ];
 
    public function imageHeaderLink()
    {
        $image = asset('AdminAssets/app-assets/images/portrait/small/avatar-s-11.jpg');

        if ($this->image != '') {
            $image = asset('uploads/headers/'.$this->id.'/'.$this->image);
        }

        return $image;
    }
}
