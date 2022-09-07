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
                                <th>{{trans('common.image')}}</th>
                                <th>{{trans('common.welcomeMsg')}}</th>
                                <th>{{trans('common.title')}}</th>
                                <th>{{trans('common.linkName')}}</th>
                                <th>{{trans('common.linkUrl')}}</th>
                                <th>{{trans('common.description')}}</th>
                                <th class="text-center">{{trans('common.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($headers as $header)
                            <tr id="row_{{$header->id}}">
                                <td>
                                    <img src="{{asset($header->imageHeaderLink())}}" style="width:50px;height:50px;margin-right:10px">
                                </td>
                                <td>
                                    {{$header->welcomeMsg}}
                                </td>
                                <td>
                                    {{$header->title}}
                                </td>
                                <td>
                                    {{$header->linkName}}
                                </td>
                                <td>
                                    {{$header->linkUrl}}
                                </td>
                                <td>
                                    {{$header->description}}
                                </td>
                              
                                <td class="text-center">
                                    <a href="javascript:;" data-bs-target="#editHeader{{$header->id}}" data-bs-toggle="modal" class="btn btn-icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{trans('common.edit')}}">
                                        <i data-feather='edit'></i>
                                    </a>

                                    <?php $delete = route('admin.headers.delete',['id'=>$header->id]); ?>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="confirmDelete('{{$delete}}','{{$header->id}}')">
                                        <i data-feather='trash-2'></i>
                                    </button>
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

                {{-- {{ $header->links('vendor.pagination.default') }} --}}

            </div>
        </div>
    </div>
    <!-- Bordered table end -->



@foreach($headers as $header)
    <div class="modal fade text-md-start" id="editHeader{{$header->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1">{{trans('common.Edit')}}: {{$header['title'.session()->get('Lang')]}}</h1>
                    </div>
                    {{Form::open(['files'=>'true','url'=>route('admin.headers.update',$header->id), 'id'=>'editHeaderForm'.$header->id, 'class'=>'row gy-1 pt-75'])}}
                       
                    <div class="col-12 col-md-6"> 
                        <label class="form-label" for="image">{{trans('common.image')}}</label>
                        <div class="file-loading"> 
                            <input class="files" name="image" type="file">
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="linkName">{{trans('common.linkName')}}</label>
                            {{Form::text('linkName',$header->linkName,['id'=>'linkName','class'=>'form-control'])}}
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="linkUrl">{{trans('common.linkUrl')}}</label>
                            {{Form::text('linkUrl',$header->linkUrl,['id'=>'linkUrl','class'=>'form-control'])}}
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="welcomeMsg">{{trans('common.welcomeMsg')}}</label>
                            {{Form::text('welcomeMsg',$header->welcomeMsg,['id'=>'welcomeMsg','class'=>'form-control'])}}
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="title">{{trans('common.title')}}</label>
                            {{Form::text('title',$header->title,['id'=>'title','class'=>'form-control'])}}
                        </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="description">{{trans('common.description')}}</label>
                            {{Form::textarea('description',$header->description,['id'=>'description','class'=>'form-control'])}}
                        </div>
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
@endforeach

@stop



@section('page_buttons')
    <a href="javascript:;" data-bs-target="#createHeader" data-bs-toggle="modal" class="btn btn-primary">
        {{trans('common.CreateNew')}}
    </a>

    <div class="modal fade text-md-start" id="createHeader" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1">{{trans('common.CreateNew')}}</h1>
                    </div>
                    {{Form::open(['files'=>'true','url'=>route('admin.headers.store'), 'id'=>'createPartenerForm', 'class'=>'row gy-1 pt-75'])}}
                       
                        <div class="col-12 col-md-6 ">
                            <label class="form-label" for="image">{{trans('common.image')}}</label>
                            <div class="file-loading"> 
                                <input class="files" name="image" type="file">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="linkName">{{trans('common.linkName')}}</label>
                                {{Form::text('linkName','',['id'=>'linkName','class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="linkUrl">{{trans('common.linkUrl')}}</label>
                                {{Form::text('linkUrl','',['id'=>'linkUrl','class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="welcomeMsg">{{trans('common.welcomeMsg')}}</label>
                                {{Form::text('welcomeMsg','',['id'=>'welcomeMsg','class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="title">{{trans('common.title')}}</label>
                                {{Form::text('title','',['id'=>'title','class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="col-12 col-md-12">
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="description">{{trans('common.description')}}</label>
                                {{Form::textarea('description','',['id'=>'description','class'=>'form-control'])}}
                            </div>
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