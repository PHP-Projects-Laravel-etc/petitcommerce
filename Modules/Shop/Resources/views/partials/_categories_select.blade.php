<div class="flex-w flex-l-m filter-tope-group m-tb-10">
  <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
    Hepsi
  </button>

  <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{$category = $categories->where('slug','erkek-t-shirt')->first()->slug}}">
    {{$category = $categories->where('slug','erkek-t-shirt')->first()->name}}
  </button>
  <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{$category = $categories->where('slug','unisex-sweat-shirt')->first()->slug}}">
    {{$category = $categories->where('slug','unisex-sweat-shirt')->first()->name}}
  </button>
  <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{$category = $categories->where('slug','kadın-pantolon')->first()->slug}}">
    {{$category = $categories->where('slug','kadın-pantolon')->first()->name}}
  </button>
</div>
