<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\header\CreateHeaders;
use App\Header;
use Illuminate\Support\Facades\Response;

class HeaderController extends Controller
{
      // shaw all headers
      public function index()
      {
          $headers = Header::orderBy('id','desc')->paginate(25);
          
          return view('AdminPanel.headers.index',[
              'active' => 'Headers',
              'title' => trans('common.headers'),
              'headers' => $headers,
              'breadcrumbs' => [
                  [
                      'url' => '',
                      'text' => trans('common.headers')
                  ]
              ]
          ]);
  
      }
  
      
      // create new header
      public function store(CreateHeaders $request)
      {
 
          $data = $request->all();
 
          $header = Header::create($data);
 
          if ($request->image != '') {
             $header->image = upload_image_without_resize('headers/'.$header->id , $request->image ,true);
             $header->update();
         }
 
          if ($header) {
              return redirect()->route('admin.headers')
                              ->with('success',trans('common.successMessageText'));
          } else {
              return redirect()->back()
                              ->with('faild',trans('common.faildMessageText'));
          }
          
      }
  
      
      // update header
      public function update(Request $request, $id)
      {
  
         $header= Header::find($id) ;
          $data = $request->all();
 
          if ($request->image != '') {
             if ($header->image != '') {
                 delete_image('headers/'.$id , $header->image);
             }
             $data['image'] = upload_image_without_resize('headers/'.$id , $request->image ,true);
         }
 
          $update = Header::find($id)->update($data);
          if ($update) {
              return redirect()->route('admin.headers')
                              ->with('success',trans('common.successMessageText'));
          } else {
              return redirect()->back()
                              ->with('faild',trans('common.faildMessageText'));
          }
          
      }
  
  
      // delete header
      public function delete($id)
      {
          $header = Header::find($id);
          if ($header->delete()) {
              return Response::json($id);
          }
          return Response::json("false");
      }
}
