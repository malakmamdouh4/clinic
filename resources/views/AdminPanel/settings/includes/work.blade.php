<!-- form -->

 <div class="row">
    <div class="col-12 col-md-6">
        <label class="form-label" for=" marketer"> {{trans('common.marketer')}} </label>
        {{Form::text('marketer',getSettingValue('marketer'),['id'=>' marketer','class'=>'form-control'])}}
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="companies"> {{trans('common.companies')}}  </label>
        {{Form::text('companies',getSettingValue('companies'),['id'=>'companies','class'=>'form-control'])}}
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="training"> {{trans('common.training..etc')}} </label>
        {{Form::text('training',getSettingValue('training'),['id'=>'training','class'=>'form-control'])}}
    </div>
    
</div> 

<!-- end form  -->

{{-- real state marketer
real state companies
training-advertising..etc --}}