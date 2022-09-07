<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Setting ;
use App\User ;
use Illuminate\Http\Request;
use Response;

class SettingsController extends Controller
{
    public function generalSettings()
    {
       
        $settings = Setting::get()->keyBy('key')->where('type','demo')->all();
        return view('AdminPanel.settings.index',
            [
                'title' => trans('common.setting'),
                'active' => 'setting',
                'settings' => $settings,

            ]);
    } 
    

    public function editSettings($id)
    {

        $setting = Setting::find($id);
       
        return view('AdminPanel.settings.edit',
        [
            'title' => 'Edit Demo',
            'setting' => $setting ,
        ]);
    }
 
    public function updateSettings(Request $request)
    {
        $this->validate($request, [   
            'facebook'=> 'nullable',
            'mail'=> 'nullable',
            'twitter'=> 'nullable',
            'marketer'=> 'nullable',
            'companies'=> 'nullable',
            'training'=> 'nullable',
            'demoLink1'=> 'nullable',
            'demoLink2'=> 'nullable',
            'demoLink3'=> 'nullable',
            'demoUserName1'=> 'nullable',
            'demoUserName2'=> 'nullable',
            'demoUserName3'=> 'nullable',
        ]);
 
        //foreach inputs which is text ant textarea
        foreach ($_POST as $key => $value) {
            if ($key != '_token') {
                $setting = Setting::where('key', $key)->first();
                if ($setting == '') {
                    $setting = New Setting;
                    $setting->key = $key;
                    $setting->value = $value;
                    $setting->save();

                    if($setting->key == 'marketer' || $setting->key == 'companies' || $setting->key == 'training')
                    {
                        $setting->type = 'work';
                        $setting->save();
                    }
                    if($setting->key == 'demoLink1' || $setting->key == 'demoLink2' || $setting->key == 'demoLink3' || $setting->key == 'demoUserName1' || $setting->key == 'demoUserName2' || $setting->key == 'demoUserName3' || $setting->key == 'demoPassword1' || $setting->key == 'demoPassword2' || $setting->key == 'demoPassword3')
                    {
                        $setting->type = 'demo';
                        $setting->save();
                    }
                    
                }
                $setting->value = $value;
                $setting->update();
            }
        }
        
        if (!isset($request['closeSite'])) {
            $setting = Setting::where('key', 'closeSite')->first();
            if ($setting == '') {
                $setting = New Setting;
                $setting->key = 'closeSite';
                $setting->save();
            }
            $setting->value = '0';
            $setting->update();
        }

        //foreach inputs which is file
        foreach ($_FILES as $key => $value) {
            //if thier was a file uploaded with in the post
            if ($request->hasFile($key)) {
                $FileExt = $request->$key->extension();

                //check if thier was an old file
                $countvalue = Setting::where('key', $key)->count();
                if ($countvalue > 0) {

                    $EditOldFile = Setting::where('key', $key)->first();
                    //delete old file and upload the new file

                    delete_image('settings' , $EditOldFile->value);
                    $file = upload_image_without_resize('settings' , $request->$key );

                    $EditOldFile->value = $file;
                    $EditOldFile->save();

                } else {
                    $file = upload_image_without_resize('settings' , $request->$key );
                    $NewFile = New Setting;
                    $NewFile->key = $key;
                    $NewFile->value = $file;
                    $NewFile->save();
                }
            }
        }
 

        session()->flash('success', trans('common.successMessageText'));
        return redirect()->route('admin.settings.general');

    }

    public function deleteSettingPhoto($key)
    {
        $setting = Setting::where('key', $key)->first();
        if ($setting != '') {
            delete_image('uploads/settings' , $setting->value);
            $setting->value = '';
            $setting->update();
        }

        session()->flash('success', trans('common.successMessageText'));
        return back();
    }

}
