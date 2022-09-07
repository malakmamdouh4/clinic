<!-- form -->

<div class="row">

    <div class="divider">
        <div class="divider-text">{{trans('common.demo')}} </div>
    </div>

    <div class="col-12 col-md-6">
        <label class="form-label" for="demoLink"> {{trans('common.demolink')}}    </label>
        {{Form::text('demoLink',getSettingValue('demoLink'),['id'=>'demoLink','class'=>'form-control'])}}
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="demoUserName"> {{trans('common.demouser')}}  </label>
        {{Form::text('demoUserName',getSettingValue('demoUserName'),['id'=>'demoUserName','class'=>'form-control'])}}
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="demoPassword">{{trans('common.demopassword')}}  </label>
        {{Form::text('demoPassword',getSettingValue('demoPassword'),['id'=>'demoPassword','class'=>'form-control'])}}
    </div> 
 



</div>

<!-- end form  -->

