@extends('admin.layouts.admin')
@section('title', __('views.admin.stockentry.report_title'))
@section('styles')
  {{ Html::style(mix('assets/common/css/select2.min.css')) }}

  @section('content')

    <div class="row">
      <div class="col-md-12">
        {!! Form::open(['route'=>['instagram.store'],'class'=>'form','data-parsley-validate' => '','id'=>'myForm','files' => true]) !!}
        <table class="table" id="table">
          <thead>
            <tr>
              <th style="width:3%;">Fotoğraf</th>
              <th style="width:10%;">İsim</th>
              <th style="width:3%;">Kategori</th>
              <th style="width:7%;">Fiyat</th>
              <th style="width:7%;">Geliş Fiyatı</th>
              <th style="width:7%;">Beden</th>
              <th style="width:7%;">Renk</th>
              <th style="width:5%;">Miktar</th>
              <th style="width:5%;">Ekle</th>
            </tr>
          </thead>
          <tbody>
            @php
            $i = 0;
            @endphp
            @foreach($product_details as $product_detail)
              <tr class = "{{$product_detail['id']}}">
                <input type="text" name="" value="{{$product_detail['id']}}" hidden>
                <th><img src="{{$product_detail['image_url']}}" name="image_name[{{$i}}]" alt="" style="width:50px; height:50px;" class="img_url"></th>
                <th><input style="width:100%;" type="text" class="main_name" name="name[{{$i}}]" id="product_name"  value="{{$product_detail['name']}}"></th>
                <th><select style="width:100%;" class="category form-control select2" style="height:40px;" name="category_id">
                  <option  disabled selected value>{{__('views.shop.shop_choose_category')}}</option>
                  @foreach($categories as $category)
                    <option class="cat" value='{{ $category->id }}' @if(old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                  </select></th>
                  <th><input style="width:80%;"type="number" class="main_sale_price" name="sale_price[{{$i}}]" id="product_price" value="{{$product_detail['price']}}"></th>
                  <th><input style="width:80%;"type="number" class="main_entry_price" name="entry_price[{{$i}}]" id="product_entry_price" value=""></th>
                  <th>
                    <select style="width:100%;" class="form-control select2 size_options"  name="size_id">
                      <option  disabled selected value>{{__('views.shop.shop_choose_size')}}</option>

                      @foreach($attributes->where('attribute_id',2) as $attribute )
                        <option value="{{$attribute->id}}">{{$attribute->attribute_long}}</option>
                      @endforeach
                    </select>
                  </th>
                  <th>
                    <select style="width:100%;" class="form-control select2 color_options" style="height:45%;" name="color_id">
                      <option  disabled selected value>{{__('views.shop.shop_choose_color')}}</option>

                      @foreach($attributes->where('attribute_id',1) as $attribute )
                        <option value="{{$attribute->id}}">{{$attribute->attribute_long}}</option>
                      @endforeach
                    </select>
                  </th>
                  <th><input style="width:100%;"type="number" name="quantity" value="" class="quantity_variation"></th>
                 <td><button  type="button"  oninvalid=""class="btn btn-success add_variation_instagram" data-id = "{{$product_detail['id']}}">Ekle</td>
                  </tr>

                  @php
                    $i++;
                  @endphp
                @endforeach

              </tbody>
            </table>
            {{Form::submit('Kaydet',['class' => 'btn btn-success btn-block form-spacing-top']) }}
            {{Form::close() }}

          </div>
        </div>
      @endsection
      @section('admin_scripts')
        {{ Html::script(mix('assets/common/js/select2.min.js')) }}

        <script >
          $(function(){
            $('.add_variation_instagram').on('click',function(){
              if(!$('.slide-panels').hasClass('slided-down')) {
                $('.slide-panels').slideDown();
                $('.slide-panels').addClass('slided-down')
              }
              /*  else {
              $('.slide-panels').slideUp();
              $('.slide-panels').removeClass('slided-down')
            }*/
          })
        });
      </script>


      <script type="text/javascript">
        $('.select2').select2();
        var $table_rows = $('.table_rows');
        $i = 0;
        $('.add_variation_instagram').on('click',function(){
          var $product_id = $(this).attr('data-id');
          var $new_row = $('tr.' + $product_id);
          console.log($new_row.attr('class'));
          var $product_name = $(this).parents('tr').find('#product_name').val();
          var $product_price = $(this).parents('tr').find('#product_price').val();
          var $product_entry_price = $(this).parents('tr').find('#product_entry_price').val();
          var $category_val = $(this).parents('tr').find('.category :selected').val();
          var $category_html = $(this).parents('tr').find('.category :selected').html();
          var $size_val = $(this).parents('tr').find('.size_options :selected').val();
          var $size_html = $(this).parents('tr').find('.size_options :selected').html();
          var $color_val = $(this).parents('tr').find('.color_options :selected').val();
          var $color_html = $(this).parents('tr').find('.color_options :selected').html();
          var $product_main_img_url = $(this).parents('tr').find('.img_url').attr('src');
          var $quantity_variation = $(this).parents('tr').find('.quantity_variation').val();

          if( !$product_name || !$product_price || !$product_entry_price || !$category_val || !$size_val || !$color_val || !$quantity_variation ) {
            $(this).parents('tr').addClass('danger');
          }
          else {

            var $stock_attr = {product_name : $product_name,entry_price : $product_entry_price,product_price : $product_price,size_val : $size_val,color_val : $color_val,};
            var input =  '<tr class="table_row" id=' + $product_id + '-' + $i + '>' +
              '<td><button type="button" class="close" style = "font-size:30px;" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>' +
              '<td class="product_size"><input type="text" name="product_name['+$i+']" value ="'+  $product_name +'" readonly hidden></td>' +
              '<td class="product_size"><input type="text" name="product_category['+$product_name+']" value ="'+  $category_html +'" readonly></td>' +
              '<td class="product_size"><input type="text" name="product_price['+$product_name+']" value ="'+  $product_price +'" readonly></td>' +
              '<td class="product_size"><input type="text" name="product_entry_price['+$product_name+']" value ="'+  $product_entry_price +'" readonly></td>' +
              '<td class="product_size"><input type="text" name="product_size_id['+$product_name+']['+$size_val+']" value ="'+  $size_html +'" readonly></td>' +
              '<td class="product_size"><input type="text" name="product_color_id['+$product_name+']['+$size_val+']" value ="'+  $color_html +'" readonly></td>' +
              '<td class="product_color"><input type="text" name="product_quantity['+$product_id+']['+$size_val+']" style="width:40px;" value ="'+  $quantity_variation +' "readonly></input></td>' +
              '<td class="product_size"><input type="text" name="stock_attributes['+$product_name+ ']['+$size_val+']['+$color_val+']" value ="'+  $quantity_variation +'"hidden></td>' +
              '<td class="product_size"><input type="text" name="category['+$product_name+']" value ="'+  $category_val +'" hidden></td>' +
              '<td class="product_size"><input type="text" name="product_img['+$product_name+']" value ="'+  $product_main_img_url +'" hidden ></td>' +
              '</tr>'
              console.log(input);
              $(input).insertAfter($new_row);
              $('.quantity_variation').val('');
              $i++;
              $(this).parents('tr').removeClass('danger');

            }

          })

          $(document).on('click','.close', function(){
            $(this).closest('tr').remove();
          })

          // domReady handler
          $(function() {

            // provide an event for when the form is submitted
            $('#myForm').submit(function() {

              // Find the input with id "file" in the context of
              // the form (hence the second "this" parameter) and
              // set it to be disabled
              $('.main_name', this).prop('disabled', true);
              $('.main_sale_price', this).prop('disabled', true);
              $('.main_entry_price', this).prop('disabled', true);
              $('.color_options', this).prop('disabled', true);
              $('.size_options', this).prop('disabled', true);
              $('.quantity_variation', this).prop('disabled', true);

              // return true to allow the form to submit
              return true;
            });
          });
        </script>
      @endsection
