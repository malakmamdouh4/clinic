<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\aboutus\CreateAboutusFeatures;
use App\AboutusFeature;
use Illuminate\Support\Facades\Response;

class AboutusFeaturesController extends Controller
{
      // shaw all aboutusFeatures
      public function index()
      {
          $aboutusFeatures = AboutusFeature::orderBy('id','desc')->paginate(25);
          
          return view('AdminPanel.aboutus.index',[
              'active' => 'AboutusFeatures',
              'title' => trans('common.aboutusFeatures'),
              'aboutusFeatures' => $aboutusFeatures,
              'breadcrumbs' => [
                  [
                      'url' => '',
                      'text' => trans('common.aboutusFeatures')
                  ]
              ]
          ]);
  
      }
  
      
      // create new aboutusFeature
      public function store(CreateAboutusFeatures $request)
      {
 
          $data = $request->all();
 
          $aboutusFeature = AboutusFeature::create($data);
 
          if ($request->image != '') {
             $aboutusFeature->image = upload_image_without_resize('aboutusFeatures/'.$aboutusFeature->id , $request->image ,true);
             $aboutusFeature->update();
         }
 
          if ($aboutusFeature) {
              return redirect()->route('admin.aboutusFeatures')
                              ->with('success',trans('common.successMessageText'));
          } else {
              return redirect()->back()
                              ->with('faild',trans('common.faildMessageText'));
          }
          
      }
  
      
      // update aboutusFeature
      public function update(Request $request, $id)
      {
  
         $aboutusFeature= AboutusFeature::find($id) ;
          $data = $request->all();
 
          if ($request->image != '') {
             if ($aboutusFeature->image != '') {
                 delete_image('aboutusFeatures/'.$id , $aboutusFeature->image);
             }
             $data['image'] = upload_image_without_resize('aboutusFeatures/'.$id , $request->image ,true);
         }
 
          $update = AboutusFeature::find($id)->update($data);
          if ($update) {
              return redirect()->route('admin.aboutusFeatures')
                              ->with('success',trans('common.successMessageText'));
          } else {
              return redirect()->back()
                              ->with('faild',trans('common.faildMessageText'));
          }
          
      }
  
  
      // delete aboutusFeature
      public function delete($id)
      {
          $aboutusFeature = AboutusFeature::find($id);
          if ($aboutusFeature->delete()) {
              return Response::json($id);
          }
          return Response::json("false");
      }
}
