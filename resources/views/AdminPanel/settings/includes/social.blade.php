<!-- form -->

<div class="row">

    <!-- home -->
    <div class="divider">
        <div class="divider-text">{{trans('common.personalData')}}</div>
    </div>
        
        <div class="col-12 col-md-6">
            <label class="form-label" for="phone">{{trans('common.phone')}} </label>
            {{Form::text('phone',getSettingValue('phone'),['id'=>'phone','class'=>'form-control'])}}
        </div>
        <div class="col-12 col-md-6">
            <label class="form-label" for="email"> {{trans('common.email')}} </label>
            {{Form::text('email',getSettingValue('email'),['id'=>'email','class'=>'form-control'])}}
        </div>

 
    <!-- home -->
    <div class="divider">
        <div class="divider-text">{{trans('common.socialDate')}}</div>
    </div>


        <div class="col-12 col-md-6">
            <label class="form-label" for="facebook">{{trans('common.facebook')}} </label>
            {{Form::text('facebook',getSettingValue('facebook'),['id'=>'facebook','class'=>'form-control'])}}
        </div>
        <div class="col-12 col-md-6">
            <label class="form-label" for="twitter"> {{trans('common.twitter')}} </label>
            {{Form::text('twitter',getSettingValue('twitter'),['id'=>'twitter','class'=>'form-control'])}}
        </div>
        <div class="col-12 col-md-6">
            <label class="form-label" for="instagram"> {{trans('common.instagram')}}</label>
            {{Form::text('instagram',getSettingValue('instagram'),['id'=>'instagram','class'=>'form-control'])}}
        </div>

</div>

<!-- end form  -->
