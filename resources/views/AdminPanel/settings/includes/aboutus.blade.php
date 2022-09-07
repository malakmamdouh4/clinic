<!-- form -->
<div class="row">


     <!-- aboutus -->
    <div class="divider">
        <div class="divider-text">{{trans('common.aboutUs')}}</div>
    </div>
   
        <div class="row pt-2 pb-4">
            <h3>{{trans('common.photo')}} </h3>
            
            <div class="col-12 col-md-6" style="margin-top:20px">
                {!! getSettingImageValue('aboutusimg') !!}
                <div class="file-loading"> 
                    <input class="files" name="aboutusimg" type="file">
                </div>
            </div>
        
            <div class="col-12 col-md-6">  
                <label class="form-label" for="aboutustitle">{{trans('common.title')}}</label>
                {{Form::text('aboutustitle',getSettingValue('aboutustitle'),['id'=>'aboutustitle','class'=>'form-control'])}}
            </div>

            <div class="col-12 col-md-12">
                    <label class="form-label" for="aboutusdes">{{trans('common.des')}}</label>
                    {{Form::textarea('aboutusdes',getSettingValue('aboutusdes'),['id'=>'aboutusdes','class'=>'form-control','rows'=>'3'])}}             
            </div>
            
        </div>
 

             <!-- aboutus -->
    <div class="divider">
        <div class="divider-text">{{trans('common.features')}}</div>
    </div>
   
        <div class="row pt-2 pb-4">            
            <div class="col-12 col-md-12">  
                <label class="form-label" for="featurestitle">{{trans('common.title')}}</label>
                {{Form::text('featurestitle',getSettingValue('featurestitle'),['id'=>'featurestitle','class'=>'form-control'])}}
            </div>
        </div>

   

</div>
<!--/ form -->