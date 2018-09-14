@extends('admin.layouts.admin')
<meta name="_token" content="{{ csrf_token() }}">
@section('styles')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  @section('title', __('views.admin.product.index.title'))
  @section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="ui-widget">
          <label for="tags">Tags: </label>
          <input id="tags">
        </div>
        <table class="table" id="table">
          <thead>
            <tr>
              <th>Fotoğraf</th>
              <th>Kod</th>
              <th>İsim</th>
              <th>Barkod No</th>
              <th>Beden</th>
              <th>Renk</th>
              <th>Kategori</th>
              <th>Miktar</th>
              <th>Birim</th>
              <th>Fiyat</th>
              <td></td>
            </tr>
          </thead>
          <tbody>
            @php
            $i = 0;
            $attr_old_id = null;
            @endphp
            @foreach($products as $product)
              @foreach($product->sizes as $size)
                <tr>
                  @if($product->images()->mainImage()->first())
                  <th><img src="{{asset('images/products/' . $product->images()->mainImage()->name)}}" style="width:30px; height:30px;" alt="">  </th>
                @else
                  <th>Yok</th>
                @endif
                  <th><a href="{{route('products.show',$product->slug)}}">{{ $product->product_id }}</a></th>
                  <td><a href="{{route('products.show',$product->slug)}}">{{ $product->name }}</a></td>
                  <td>{{ $product->product_id.$size->id }}</td>
                  <td>{{ $size->attribute_long }} </td>
                  <td> {{ $product->colors()->where('color_id',$size->pivot->color_id)->first()->attribute_long}} </td>
                  <td>{{ $product->category->name }}</td>
                  <td>{{ $size->pivot->stock }}</td>
                  <td> {{$product->unit->name}}</td>
                  <td>{{ $product->price }} TL</td>
                </tr>
              @endforeach
            @endforeach
          </tbody>
        </table>
        {{ $products->links() }}
      </div>
    </div>
  @endsection
  @section('admin_scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      $(function() {
        $.ajax({
          dataType:'json',
          type:'get',
          url:'{{asset('api/products/')}}',
          data:'',
          success: function(response) {
            $ra = [];
            $.each(response,function(i,r) {
              $ra.push(r.name);
            });

            doSomething($ra);
          }
        });
        function doSomething(response) {
          $( "#tags" ).autocomplete({
            source: response
          });
        }
        $('#tags').on('keyup',function(){
          $value=$(this).val();
          console.log($value);
          $.ajax({
            type : 'get',
            url:'{{asset('api/searchProducts/')}}',
            data:{'search':$value},
            success:function(data){
              $('tbody').html(data);
            }
          });
        })
      })
    </script>
    <script type="text/javascript">
      $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
  @endsection
