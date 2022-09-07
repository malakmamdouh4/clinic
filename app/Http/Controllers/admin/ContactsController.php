<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\contacts\CreateContact;
use App\Contact;
use Illuminate\Support\Facades\Response;
  
class ContactsController extends Controller
{
    

     // shaw all services
     public function index()
     {
         $contacts = Contact::orderBy('id','desc')->paginate(25);
         
         return view('AdminPanel.contacts.index',[
             'active' => 'Contacts',
             'title' => trans('common.contacts'),
             'contacts' => $contacts,
             'breadcrumbs' => [
                 [
                     'url' => '',
                     'text' => trans('common.contacts')
                 ]
             ]
         ]);
 
     }
 
     
     // create new contacts
     public function store(CreateContact $request)
     {

         $data = $request->all();

         $contacts = Contact::create($data);

         if ($contacts) {
             return redirect()->route('admin.contacts')
                             ->with('success',trans('common.successMessageText'));
         } else {
             return redirect()->back()
                             ->with('faild',trans('common.faildMessageText'));
         }
         
     }
 
     
     // update contacts
     public function update(Request $request, $id)
     {
 
        $contacts= Contact::find($id) ;
         $data = $request->all();


         $update = Contact::find($id)->update($data);
         if ($update) {
             return redirect()->route('admin.contacts')
                             ->with('success',trans('common.successMessageText'));
         } else {
             return redirect()->back()
                             ->with('faild',trans('common.faildMessageText'));
         }
         
     }
 
  
     // delete contacts
     public function delete($id)
     {
         $contacts = Contact::find($id);
         if ($contacts->delete()) {
             return Response::json($id);
         }
         return Response::json("false");
     }

  
 
}
