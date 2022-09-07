<?php

namespace App\Http\Controllers\api;

use App\Archeiveclient;
use App\Setting; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

 
class ClientController extends Controller
{

     // add new client  
     public function addClient(Request $request)
     {

        $client = Archeiveclient::where('phone',$request->phone)->first();
        if(!$client)
        {
           
            $validator = Validator::make($request->all(), [
              'name' => 'required',
              'email' => 'required',
              'phone' => 'required',
              'setting_id' => 'required',
            ]);

            if($validator->fails()){
                return response()->json( [
                  'status' => 0 ,
                  'data' => [
                    'link' => null,
                    'username' => null,
                    'password' => null 
                  ]
                ]);
            }

            $client = Archeiveclient::create([
              'name'=> $request->name, 
              'email'=> $request->email,
              'phone'=> $request->phone,
              'country'=> $request->country,
              'nemployees'=> $request->nemployees,
              'setting_id' => $request->input('setting_id'),
            ]);

            $client->created_at_str = strtotime($client->created_at);
            $client->save();

            $notificationText = notificationTextTranslate([
                                'name' => $request->name,
                                'type' => 'newClient'
                            ],
                            'ar');
            $notificationData = [
                'type' => 'newClient',
                'linked_id' => $client->id,
                'text' => $notificationText,
                'date' => date('Y-m-d'),
                'time' => date('H:i')
            ];
            notifyManagers('newClient',$notificationData);

            return demosList($request->input('setting_id'));
        }
        else
        {
            return demosList($client->setting_id);
        }
  
     }
 

     // check client by using phone
     public function checkPhone(Request $request)
     {
        $client = Archeiveclient::where('phone',$request->phone)->first();
        if(!$client)
        {
          return demosList(1);
        }
        else
        {
          return demosList($client->setting_id) ;
        }

     }


      // get value of settings by key
      function getSettingValue($key)
      {
          $value = '';
          $setting = Setting::where('key',$key)->first();
          if ($setting != '') {
              $value = $setting['value'];
          }
          return $value;
      }


       // get credentials 
     public function getCredentials( Request $request)
     {

      $client = Archeiveclient::where('phone',$request->phone)->first();

      $arr = [
        
        [
          'status' => 1 ,
          'data' => [
            'link' => $this->getSettingValue('demoLink1'),
            'username' => $this->getSettingValue('demoUserName1'),
            'password' => $this->getSettingValue('demoPassword1')
          ]
        ],
        [
          'status' => 1 ,
          'data' => [
            'link' => $this->getSettingValue('demoLink2'),
            'username' => $this->getSettingValue('demoUserName2'),
            'password' => $this->getSettingValue('demoPassword2')
          ]
        ],
        [
          'status' => 1 ,
          'data' => [
            'link' => $this->getSettingValue('demoLink3'),
            'username' => $this->getSettingValue('demoUserName3'),
            'password' => $this->getSettingValue('demoPassword3')
          ]
        ],
        [
          'status' => 0 ,
          'data' => [
            'link' => null,
            'username' => null,
            'password' => null
          ]
        ]
      ];
      
      return $result_arr =  array_key_exists($client->setting_id-4,$arr) ? $arr[$client->setting_id-4] : $arr[7-4] ; 

     }


}
