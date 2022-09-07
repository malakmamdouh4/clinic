<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    protected $hidden = [
        'created_at', 'updated_at' 
    ];

    
    public function imageBackLink()
    {
        $backImg = asset('AdminAssets/app-assets/images/portrait/small/avatar-s-11.jpg');

        if ($this->backImg != '') {
            $backImg = asset('uploads/servicesBack/'.$this->id.'/'.$this->backImg);
        }

        return $backImg;
    }

    public function imageIconLink()
    {
        $iconImg = asset('AdminAssets/app-assets/images/portrait/small/avatar-s-11.jpg');

        if ($this->iconImg != '') {
            $iconImg = asset('uploads/servicesIcon/'.$this->id.'/'.$this->iconImg);
        }

        return $iconImg;
    }

} 
