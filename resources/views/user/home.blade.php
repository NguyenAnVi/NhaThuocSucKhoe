@extends('user.layouts.app')

@section('css')
    
@endsection

@section('content')
<div class="uk-flex uk-flex-column">
  {{-- saleoff banner --}}
  <div id="slideshow" class="uk-width-1-1" style="overflow: hidden">
    <div class="uk-position-relative uk-visible-toggle uk-light uk-width-1-1" tabindex="1" uk-slideshow="ratio:3:1; animation: pull; autoplay:true; "  >
      <ul class="uk-slideshow-items">
        @foreach ($saleoffs as $item)
        @if($item->imageurl!="")
          <li>
            <img class="uk-object-cover uk-comment-avatar uk-width-1-1" src="{!!$item->imageurl!!}">
          </li>
        @endif
        @endforeach
      </ul>
      <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
      <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
    </div>

  </div>

  {{-- categories --}}
  <hr>
  <div class="uk-flex uk-height-1-1 uk-flex-column uk-child-width-1-1 uk-padding-small uk-margin-bottom">
    <div id="content" class="uk-padding-small uk-padding-remove-horizontal">
      <div class="uk-flex uk-flex-wrap uk-flex-wrap-between uk-flex-between">
        @foreach($categories as $item)
            <button class="uk-button uk-button-text uk-flex uk-flex-center uk-flex-middle uk-margin-right uk-text-bold uk-text-{{(['primary', 'secondary', 'success', 'warning', 'danger'])[rand(0,4)]}}">{{$item->name}}</button>
        @endforeach
      </div>
    </div>
  </div>
  <hr>

  {{-- products_random --}}
  <div class="uk-flex uk-height-1-1 uk-flex-column uk-child-width-1-1 uk-card uk-card-default uk-card-hover uk-padding-small  uk-margin-bottom">
    <div id="title" class="uk-flex uk-flex-between uk-card-title">
      <div class="uk-width-expand">Sản phẩm nổi bật</div>
      <div><button class="uk-button uk-button-text" onclick="allcategories();">Xem thêm</button><span uk-icon="chevron-right"></span></div>
    </div>
    <hr>
    <div id="content" class="uk-card-body uk-padding-small uk-padding-remove-horizontal">
      <div class="uk-flex uk-flex-wrap uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-child-width-1-6@l">
        @each ('user.partials.product_card',$products,'item', 'user.partials.product_card_is_empty')
      </div>
      
    </div>
  </div>

  {{-- saleoff_products --}}
  <div class="uk-flex uk-height-1-1 uk-flex-column uk-child-width-1-1 uk-card uk-card-default uk-card-hover uk-padding-small  uk-margin-bottom">
    <div id="title" class="uk-flex uk-flex-between uk-card-title">
      <div class="uk-width-expand">💥 Khuyến mãi có hạn 💥</div>
      <div><button class="uk-button uk-button-text" onclick="allcategories();">Xem thêm</button><span uk-icon="chevron-right"></span></div>
    </div>
    <hr>
    <div id="content" class="uk-card-body uk-padding-small uk-padding-remove-horizontal">
      <div uk-filter="target: .js-filter">
        <ul class="uk-subnav uk-subnav-pill">
          <li uk-filter-control><a href="#">Tất cả</a></li>
          @foreach($productable_categories as $item)
            <li uk-filter-control=".category-{{$item->id}}"><a href="#">{{$item->name}}</a></li>
          @endforeach
        </ul>
    
        <div class="uk-flex uk-flex-wrap js-filter uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-child-width-1-6@l uk-text-center">
          @each ('user.partials.product_card',$saleoff_products,'item', 'user.partials.product_card_is_empty')
        </div>
    
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script src="{{asset('js/jquery-3.6.1.min.js')}}"></script>
<script>
  $(document).ready(function(){
    $('[data-type=product]').click(function (){
      let type = $(this).data('type');
      let id = $(this).data('id');
      window.location.href='/'+'show/'+type+'/'+id;
      return;
    });
  });
</script>
@endsection