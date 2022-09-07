<?php

namespace App\Http\Controllers\api;

use App\Setting;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;



class SettingsController extends Controller
{
  
    // add new settings
    public function addSettings(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'key' => 'required',
            'value' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 0 ,
                'message' => 'failed, check inputs again',
            ]);
        }

        Setting::create([
        'key' => $request->key ,
        'value' => $request->value
        ]);

        return response()->json([
            'status' => 1 ,
            'message' => 'settings added successfully',
        ]);

    }

    
    // get lists of settings
    public function lists()
    {
        $lists = [
            'header' => headersList(),
            'aboutUs' => aboutUsList(),
            'aboutusFeatures' => aboutusFeaturesList(),
            'clients' => clientsList(),
            'Work' => demosList(),
            'general' => generalList(),
            'contacts' => contactsList(),
            'services' => servicesList(),
        ];

        return response()->json([
            'status' => 1 ,
            'lists' => $lists,
        ]);
        
    }



    public function sendContact(Request $request)
    {
        $data = $request->all();
        $contact = Contact::create($data);

         if ($contact) {
            return response()->json([
                'status' => 1 ,
                'message' => 'تم إرسال البيانات بنجاح' ,
            ]);
         }
        else
        {
        return response()->json([
            'status' => 0 ,
            'message' => 'فشل إرسال البيانات' ,
        ]);
        }
    }









}
