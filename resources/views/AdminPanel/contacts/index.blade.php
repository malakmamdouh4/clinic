@extends('AdminPanel.layouts.master')
@section('content')


    <!-- Bordered table start -->
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$title}}</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mb-2">
                        <thead>
                            <tr>
                               
                                <th>{{trans('common.name')}}</th>
                                <th>{{trans('common.email')}}</th>
                                <th>{{trans('common.phone')}}</th>
                                <th>{{trans('common.message')}}</th>
                            </tr>
                        </thead> 
                        <tbody>
                            @forelse($contacts as $contact)
                            <tr id="row_{{$contact->id}}">
                                <td>
                                    {{$contact->name}}
                                </td>
                                <td>
                                    {{$contact->email}}
                                </td>
                                <td>
                                    {{$contact->phone}}
                                </td>
                                <td>
                                    {{$contact->message}}
                                </td>
                               
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-3 text-center ">
                                        <h2>{{trans('common.nothingToView')}}</h2>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- {{ $contact->links('vendor.pagination.default') }} --}}

            </div>
        </div>
    </div>
    <!-- Bordered table end -->


@stop




@section('page_buttons')
    <a href="javascript:;" data-bs-target="#createContact" data-bs-toggle="modal" class="btn btn-primary">
        {{trans('common.CreateNew')}}
    </a>

    <div class="modal fade text-md-start" id="createContact" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1">{{trans('common.CreateNew')}}</h1>
                    </div>
                    {{Form::open(['files'=>'true','url'=>route('admin.contacts.store'), 'id'=>'createContactForm', 'class'=>'row gy-1 pt-75'])}}
                    
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="name">{{trans('common.name')}}</label>
                            {{Form::text('name','',['id'=>'name', 'class'=>'form-control'])}}
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label" for="email">{{trans('common.email')}}</label>
                            {{Form::text('email','',['id'=>'email', 'class'=>'form-control'])}}
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label" for="phone">{{trans('common.phone')}}</label>
                            {{Form::text('phone','',['id'=>'phone', 'class'=>'form-control'])}}
                        </div>

                        <div class="col-12 col-md-12">
                            <label class="form-label" for="message">{{trans('common.message')}}</label>
                            {{Form::textarea('message','',['id'=>'message','class'=>'form-control'])}}
                        </div>

                     
                        <div class="col-12 text-center mt-2 pt-50">
                            <button type="submit" class="btn btn-primary me-1">{{trans('common.Save changes')}}</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                {{trans('common.Cancel')}}
                            </button>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@stop