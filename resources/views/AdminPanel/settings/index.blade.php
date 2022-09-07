@extends('AdminPanel.layouts.master')
@section('content')


    <!-- Bordered table start -->
    <div class="row" id="table-bordered">
        <div class="col-12">
            {{Form::open(['url'=>route('admin.settings.update'), 'files'=>'true'])}}
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" aria-controls="home" role="tab" aria-selected="true">
                                <i data-feather="home"></i>  {{trans('common.demo')}}
                            </a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" id="aboutus-tab" data-bs-toggle="tab" href="#aboutus" aria-controls="aboutus" role="tab" aria-selected="false">
                                <i data-feather="list"></i> {{trans('common.aboutUs')}}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="work-tab" data-bs-toggle="tab" href="#work" aria-controls="work" role="tab" aria-selected="false">
                                <i data-feather="briefcase"></i> {{trans('common.work')}}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="images-tab" data-bs-toggle="tab" href="#images" aria-controls="images" role="tab" aria-selected="false">
                                <i data-feather="images"></i> {{trans('common.images')}}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="social-tab" data-bs-toggle="tab" href="#social" aria-controls="social" role="tab" aria-selected="false">
                                <i data-feather="social"></i> {{trans('common.social')}}
                            </a>
                        </li>
 
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane active" id="general" aria-labelledby="general-tab" role="tabpanel">
                            @include('AdminPanel.settings.includes.demos')
                        </div>
                        <div class="tab-pane" id="aboutus" aria-labelledby="aboutus-tab" role="tabpanel">
                            @include('AdminPanel.settings.includes.aboutus')
                        </div>
                        <div class="tab-pane" id="work" aria-labelledby="work-tab" role="tabpanel">
                            @include('AdminPanel.settings.includes.work')
                        </div>

                        <div class="tab-pane" id="images" aria-labelledby="images-tab" role="tabpanel">
                            @include('AdminPanel.settings.includes.images')
                        </div>

                        <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                            @include('AdminPanel.settings.includes.social')
                        </div>
                       
                    </div>
                </div>

                <div class="card-footer">
                    <input type="submit" value="{{trans('common.Save changes')}}" class="btn btn-primary">
                </div>
                
            </div>
            {{Form::close()}}
        </div>
    </div>
    <!-- Bordered table end -->
@stop