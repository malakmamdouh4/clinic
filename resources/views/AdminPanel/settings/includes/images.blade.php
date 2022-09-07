<!-- form -->
<div class="row">


          <!-- logo -->
    <div class="divider">
        <div class="divider-text">{{trans('common.logoo')}}</div>
    </div>

      <!-- header of dashboard -->
        <div class="row pt-2 pb-4">
            <h3>{{trans('common.logoo')}} </h3>
          
            <div class="col-12 col-md-4">
                {!! getSettingImageValue('logo') !!}
                <div class="file-loading"> 
                    <input class="files" name="logo" type="file">
                </div>
            </div>

        </div>


       

</div>
<!--/ form -->




    