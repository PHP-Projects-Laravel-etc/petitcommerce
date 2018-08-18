@extends('admin.layouts.admin')
@section('title', __('views.admin.product.create.title'))
@section('content')

  <div class="container">
    <div class="col-md-12">
      <div class="col-md-4">

{!! Form::model($category,['route' => ['categories.update',$category->id],'data-parsley-validate' => '' ,'method' => 'PUT']) !!}

{{ Form::label('name','İsim:',['class'=>'form-spacing-top']) }}
{{ Form::text('name',null,['class'=>'form-control','required' => ''])}}

{{ Form::label('number_low','Alt Numara',['class'=>'form-spacing-top']) }}
{{ Form::number('number_low',null,['class'=>'form-control','required' => '', 'minlength' => '1', 'maxlength' => '40'])}}

{{ Form::label('number_high','Üst Numara',['class'=>'form-spacing-top']) }}
{{ Form::number('number_high',null,['class'=>'form-control','required' => '', 'minlength' => '1', 'maxlength' => '40'])}}

{{ Form::label('head_category','Ana Kategori İsmi:',['class'=>'form-spacing-top']) }}
<select class="form-control select2" style="height:40px;" name="head_category_id">
  @if($category->head_category_id)
    <option value="{{$category->head_category_id}}">{{Modules\Category\Entities\Category::find($category->head_category_id)->name}}</option>
  @else
    <option value=""></option>
  @endif
  @foreach($categories as $category)
    <option value='{{ $category->id }}'@if(old('head_category_id') == $category->id) selected @endif>{{ $category->name }}</option>
    @endforeach

  </select>



{{Form::submit('Kaydet',['class' => 'btn btn-success btn-block form-spacing-top']) }}
{{Form::close() }}

      </div>
    </div>
  </div>
  </div>

@endsection
