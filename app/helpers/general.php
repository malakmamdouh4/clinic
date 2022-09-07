<?php

use App\Client;
use App\Feature;
use App\Partener;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

function DayMonthOnly($your_date)
{
    $months = array("Jan" => "يناير",
                     "Feb" => "فبراير",
                     "Mar" => "مارس",
                     "Apr" => "أبريل",
                     "May" => "مايو",
                     "Jun" => "يونيو",
                     "Jul" => "يوليو",
                     "Aug" => "أغسطس",
                     "Sep" => "سبتمبر",
                     "Oct" => "أكتوبر",
                     "Nov" => "نوفمبر",
                     "Dec" => "ديسمبر");
    //$your_date = date('y-m-d'); // The Current Date
    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }

    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = date("D", strtotime($your_date)); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);

    header('Content-Type: text/html; charset=utf-8');
    $standard = array("0","1","2","3","4","5","6","7","8","9");
    $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
    $current_date = $ar_day.' '.date('d', strtotime($your_date)).' '.$ar_month.' '.date('Y', strtotime($your_date));
    $arabic_date = str_replace($standard , $eastern_arabic_symbols , $current_date);

    return $arabic_date;
}

function getTime($time)
{
    $time = '';
    $time .= date('H:m',strtotime($time));
    $time .= date('a',strtotime($time)) == 'am' ? ' ص ' : 'م';
    return $time;
}

function panelLangMenu()
{
    $list = [];
    $locales = Config::get('app.locales');

    if (Session::get('Lang') != 'ar') {
        $list[] = [
            'flag' => 'ae',
            'text' => trans('common.lang1Name'),
            'lang' => 'ar'
        ];
    } else {
        $selected = [
            'flag' => 'ae',
            'text' => trans('common.lang1Name'),
            'lang' => 'ar'
        ];    
    }
    if (Session::get('Lang') != 'en') {
        $list[] = [
            'flag' => 'us',
            'text' => trans('common.lang2Name'),
            'lang' => 'en'
        ];
    } else {
        $selected = [
            'flag' => 'us',
            'text' => trans('common.lang2Name'),
            'lang' => 'en'
        ];    
    }
    if (Session::get('Lang') != 'fr') {
        $list[] = [
            'flag' => 'fr',
            'text' => trans('common.lang3Name'),
            'lang' => 'fr'
        ];
    } else {
        $selected = [
            'flag' => 'fr',
            'text' => trans('common.lang3Name'),
            'lang' => 'fr'
        ];    
    }

    return [
        'selected' => $selected,
        'list' => $list
    ];
}

function getCssFolder()
{
    return trans('common.cssFile');
}

function getRolesList($lang,$value,$guard = null)
{
    $list = [];
    if ($guard == null) {
        $roles = App\roles::orderBy('name_'.$lang,'asc')->get();
    } else {
        $roles = App\roles::where('guard',$guard)->orderBy('name_'.$lang,'asc')->get();
    }
    foreach ($roles as $role) {
        $list[$role[$value]] = $role['name_'.$lang] != '' ? $role['name_'.$lang] : $role['name_ar'];
    }
    return $list;
}

function getSettingValue($key)
{
    $value = '';
    $setting = App\Setting::where('key',$key)->first();
    if ($setting != '') {
        $value = $setting['value'];
    }
    return $value;
}

function getSettingImageLink($key)
{
    $link = '';
    $setting = App\Setting::where('key',$key)->first();
    if ($setting != '') {
        if ($setting['value'] != '') {
            $link = asset('uploads/settings/'.$setting['value']);
        }
    }
    return $link;
}

function getSettingImageValue($key)
{
    $value = '';
    if (getSettingImageLink($key) != '') {
        $value .= '<div class="row"><div class="col-12">';
        $value .= '<span class="avatar mb-2">';
        $value .= '<img class="round" src="'.getSettingImageLink($key).'" alt="avatar" height="90" width="90">';
        $value .= '</span>';
        $value .= '</div>';
        $value .= '<div class="col-12">';
        $value .= '<a href="'.route('admin.settings.deletePhoto',['key'=>$key]).'"';
        $value .= ' class="btn btn-danger btn-sm">'.trans("common.delete").'</a>';
        $value .= '</div></div>';
    }
    return $value;
}

function headersList()
{
    $headers = App\Header::all();
    
    foreach($headers as $header)
    {
            $header->image = $header->imageHeaderLink();
    }
    return $headers;
} 

function aboutusFeaturesList()
{
    $aboutusFeatures = App\AboutusFeature::all();
    
    foreach($aboutusFeatures as $aboutusFeature)
    {
            $aboutusFeature->image = $aboutusFeature->imageAboutusFeatureLink();
    }
    return $aboutusFeatures;
}
 
function servicesList()
{
    $services = App\Service::all();
   
    foreach($services as $service)
    {
            $service->backImg = $service->imageBackLink();
    }
    foreach($services as $service)
    {
            $service->iconImg = $service->imageIconLink();
    }

    $list = 
    [
      'title' => getSettingValue('featurestitle') ,
      'features' => $services 
    ];

    return $list;
}



function aboutUsList()
{
 
  $list = 
    [
      'image' => getSettingImageLink('aboutusimg') ,
      'title' => getSettingValue('aboutustitle') ,
      'description' => getSettingValue('aboutusdes'),
      ];

    return $list ;
  
}

function generalList()
{

  $list =  
    [
      'logo' => getSettingImageLink('logo') ,

      'phone' => getSettingValue('phone') ,
      'email' => getSettingValue('email'),

      'facebook' => getSettingImageLink('facebook') ,
      'twitter' => getSettingValue('twitter') ,
      'instagram' => getSettingValue('instagram'),
      ];

    return $list ;
  
}

function checkUserForApi($lang, $user_id)
{
    if ($lang == '') {
        $resArr = [
            'status' => 'faild',
            'message' => trans('api.pleaseSendLangCode'),
            'data' => []
        ];
        return response()->json($resArr);
    }
    $user = App\User::find($user_id);
    if ($user == '') {
        return response()->json([
            'status' => 'faild',
            'message' => trans('api.thisUserDoesNotExist'),
            'data' => []
        ]);
    }

    return true;
}

function getPermissions($role = null)
{
    $roleData = '';
    if ($role != null) {
        $roleData = App\roles::find($role);
    }
    $permissions = [];
    $permissions['settings'] = [
        'name' => trans('common.setting'),
        'permissions' => []
    ];
    $settingPermissions = App\permissions::where('group','settings')->get();
    foreach ($settingPermissions as $key => $value) {
        $hasIt = 0;
        if ($roleData != '') {
            if ($roleData->hasPermission($value['id']) == 1) {
                $hasIt = 1;
            }
        }
        $permissions['settings']['permissions'][] = [
            'id' => $value['id'],
            'name' => $value['name_'.session()->get('Lang')],
            'hasIt' => $hasIt
        ];
    }

    $permissions['admins'] = [
        'name' => trans('common.AdminUsers'),
        'permissions' => []
    ];
    $adminPermissions = App\permissions::where('group','admins')->get();
    foreach ($adminPermissions as $key => $value) {
        $hasIt = 0;
        if ($roleData != '') {
            if ($roleData->hasPermission($value['id']) == 1) {
                $hasIt = 1;
            }
        }
        $permissions['admins']['permissions'][] = [
            'id' => $value['id'],
            'name' => $value['name_'.session()->get('Lang')],
            'hasIt' => $hasIt
        ];
    }
    
    $permissions['role'] = [
        'name' => trans('common.Roles'),
        'permissions' => []
    ];
    $rolePermissions = App\permissions::where('group','roles')->get();
    foreach ($rolePermissions as $key => $value) {
        $hasIt = 0;
        if ($roleData != '') {
            if ($roleData->hasPermission($value['id']) == 1) {
                $hasIt = 1;
            }
        }
        $permissions['role']['permissions'][] = [
            'id' => $value['id'],
            'name' => $value['name_'.session()->get('Lang')],
            'hasIt' => $hasIt
        ];
    }
    
    $permissions['clients'] = [
        'name' => trans('common.Clients'),
        'permissions' => []
    ];
    $clientPermissions = App\permissions::where('group','clients')->get();
    foreach ($clientPermissions as $key => $value) {
        $hasIt = 0;
        if ($roleData != '') {
            if ($roleData->hasPermission($value['id']) == 1) {
                $hasIt = 1;
            }
        }
        $permissions['clients']['permissions'][] = [
            'id' => $value['id'],
            'name' => $value['name_'.session()->get('Lang')],
            'hasIt' => $hasIt
        ];
    }
    return $permissions;
}


function demosList($id = null)
{
  $list = [
    [
      'status' => 0 ,
      'id' => 1,
      'value' => null ,
      'data' => [
          'link' => null ,
          'username' => null ,
          'password' => null
      ]
      ],
    [
      'status' => 1 ,
      'id' => 4,
      'value' => 'real state marketer',
      'data' => [
          'link' => getSettingValue('demoLink'),
          'username' => getSettingValue('demoUserName'),
          'password' => getSettingValue('demoPassword')
      ]
    ],
    [
      'status' => 1 ,
      'id' => 5,
      'value' => 'real state companies',
      'data' => [
        'link' => getSettingValue('demoLink'),
        'username' => getSettingValue('demoUserName'),
        'password' => getSettingValue('demoPassword')
      ]
    ],
    [
      'status' => 1 ,
      'id' => 6, 
      'value' => 'training-advertising..etc' ,
      'data' => [
        'link' => getSettingValue('demoLink'),
        'username' => getSettingValue('demoUserName'),
        'password' => getSettingValue('demoPassword')
      ]
      ],
    
  ];


  if ($id == null) {
    return array_slice($list,1);
  }
  else {
    $key = array_search($id, array_column($list, 'id'));
    return $list[$key];
  }
  
}

function homeList()
{

  $list = [
    [
      'id' => 1,
      'image' => getSettingImageLink('section1img') ,
      'title' => getSettingValue('section1title') ,
      'description' => getSettingValue('section1des'),
      ],
      [
        'id' => 2,
        'image' =>  getSettingImageLink('section2img'),
        'title' => getSettingValue('section2title') ,
        'description' => getSettingValue('section1des'),
        ],
    ];

    return $list ;
  
}


function socialList()
{
    $list = 
            [
                [
                    'id' => 1,
                    'key' =>  'facebook' ,
                    'value' => 'facebook'
                ],
                [
                    'id' => 2 , 
                    'key' =>  'twitter' ,
                    'value' => 'twitter'
                ],
                [
                    'id' => 3 ,
                    'key' =>  'mail'  ,
                    'value' => 'mail'
                ] ,
            ];
      return $list;

}


function featuresList($type)
{
    $featuresArr = [];
    $features = Feature::where('type',$type)->get();
    foreach($features as $feature)
    {
        $featuresArr[] = [
            'id' =>$feature['id'],
            'title' =>$feature['title'],
            'description' =>$feature['description'],
            'image' =>$feature->imageFeatureLink(),
            'featureList' =>$feature->featureArr()
        ];
    }
    return $featuresArr ;
}

function partenersList()
{
    $parteners = Partener::all();
    
    foreach($parteners as $partener)
    {
            $partener->image = $partener->imagePartenerLink();
    }
 
    return $parteners;

}

function contactsList()
{ 
    $contacts = App\Contact::all();
    return $contacts;
}




function clientsList()
{
    $clients = Client::all();
    
    foreach($clients as $client)
    {
            $client->image = $client->imageClientLink();
    }
 
    return $clients;

}


