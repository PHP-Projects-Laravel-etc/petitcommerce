@extends('admin.layouts.admin')
@section('styles')
  {{ Html::style(mix('assets/common/css/select2.min.css')) }}
@section('title', __('views.admin.product.report_instagram'))
@section('content')

  <div class="row">
    <div class="col-md-12">
      {!! Form::open(['route'=>['instagram.report']]) !!}
      <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-primary active">
          <input type="radio" name="options" id="option1" autocomplete="off" checked value="D" > Günlük
        </label>
        <label class="btn btn-primary" style="margin-left:15px;">
          <input type="radio" name="options" id="option2"  autocomplete="off" value="W"> 7 Günlük
        </label>
        <label class="btn btn-primary"style="margin-left:15px;">
          <input type="radio" name="options" id="option3"  autocomplete="off" value="M"> Son 30 gün
        </label>
      </div>
      <div class="form-spacing-top">
        <input type="checkbox" name="" id="formanual">
        {!!Form::date('datefirst', \Carbon\Carbon::now(),['class'=>'manual ml-3', 'disabled']) !!}
        {!!Form::date('datelast', \Carbon\Carbon::now(),['class'=>'manual ml-3','disabled']) !!}
      </div>
      <div class="form-spacing-top">

        <select class="select2 instagram_companies" name="instagram_company">
        <option value="petitbutix">Petitbutix</option>
        <option value="petitbags">PetitBags</option>
        <option value="petitaksesuar">PetitAksesuar</option>
      </select>
    </div>

      {{Form::submit('Instagram Raporu',['class' => 'btn btn-success  form-spacing-top']) }}
      {{Form::close() }}
    </div>
  </div>
@endsection
@section('admin_scripts')
  {{ Html::script(mix('assets/common/js/select2.min.js')) }}
  <script type="text/javascript">
  $(function(){
    $('.select2').select2();
    var $manual = $('.manual');
    $('#formanual').on('click',function(){
      if($manual.attr('disabled')) {
        $('.manual').removeAttr('disabled');
      }
      else {
        console.log('sd');
        $('.manual').attr('disabled','');
      }
    });
  });
</script>
@endsection
</script>
