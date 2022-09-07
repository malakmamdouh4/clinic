<?php

namespace App\Http\Controllers\admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\clients\CreateClients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ClientsController extends Controller
{
    // shaw all clients
    public function index()
    {
        $clients = Client::orderBy('id','desc')->paginate(25);
        
        return view('AdminPanel.clients.index',[
            'active' => 'clients',
            'title' => trans('common.clients'),
            'clients' => $clients,
            'breadcrumbs' => [
                [
                    'url' => '',
                    'text' => trans('common.clients')
                ]
            ]
        ]);

    }

    
    // create new client
    public function store(CreateClients $request)
    {

        $data = $request->all();

        $client = Client::create($data);

        if ($request->image != '') {
           $client->image = upload_image_without_resize('clients/'.$client->id , $request->image ,true);
           $client->update();
       }

        if ($client) {
            return redirect()->route('admin.clients')
                            ->with('success',trans('common.successMessageText'));
        } else {
            return redirect()->back()
                            ->with('faild',trans('common.faildMessageText'));
        }
        
    }

    
    // update client
    public function update(Request $request, $id)
    {

       $client= Client::find($id) ;
        $data = $request->all();

        if ($request->image != '') {
           if ($client->image != '') {
               delete_image('clients/'.$id , $client->image);
           }
           $data['image'] = upload_image_without_resize('clients/'.$id , $request->image ,true);
       }

        $update = Client::find($id)->update($data);
        if ($update) {
            return redirect()->route('admin.clients')
                            ->with('success',trans('common.successMessageText'));
        } else {
            return redirect()->back()
                            ->with('faild',trans('common.faildMessageText'));
        }
        
    }


    // delete client
    public function delete($id)
    {
        $client = Client::find($id);
        if ($client->delete()) {
            return Response::json($id);
        }
        return Response::json("false");
    }
}
