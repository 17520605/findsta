
<div class="col-md-6 mb-4 mb-md-0">
	<div class="product-gallery product-gallery-sticky">
		<div class="swiper-container product-single-swiper swiper-theme nav-inner">
			<div class="swiper-wrapper row cols-1 gutter-no">
				@php
					$images = $product->getImages();
				@endphp
				@foreach ($images as $image)
				<div class="swiper-slide">
					<figure class="product-image">
						<img src="{{$image['original']}}" data-zoom-image="{{$image['original']}}" alt=""  width="800" height="800">
					</figure>
				</div>
				@endforeach
			</div>
			<button class="swiper-button-next"></button>
			<button class="swiper-button-prev"></button>
		</div>

		<div class="product-thumbs-wrap swiper-container" data-swiper-options="{
			'navigation': {
				'nextEl': '.swiper-button-next',
				'prevEl': '.swiper-button-prev'
			}
		}">
			<div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
				@foreach ($images as $image)
				<div class="product-thumb swiper-slide">
					<img src="{{$image['small']}}" alt="" width="103" height="116">
				</div>
				@endforeach
			</div>
			<button class="swiper-button-next"></button>
			<button class="swiper-button-prev"></button>
		</div>
	</div>
</div>
<div class="product col-md-6 overflow-hidden p-relative" data-product-id="{{$product->id}}">
	<div class="product-details scrollable pl-0">
		<h2 class="product-title">{{$product->name}}</h2>
		<div class="product-bm-wrapper">
			{{-- <figure class="brand">
				<img src="{{$product->getThumbnail()}}" alt="Brand" style="width: 102px;height: 48px;" />
			</figure> --}}
			<div class="product-meta" style="margin-bottom: 0 !important">
				<div class="product-sku">
					SKU: <span style="font-weight: bold;color: #336699">{{$product->sku}}</span>
				</div>
				<div class="product-form product-variation-form product-size-swatch mt-3 mb-3" style="margin-bottom: 2px !important">
					<div class="flex-wrap d-flex align-items-center product-variations">
						@php
							$categories =  $product->categories;
						@endphp
						@foreach ($categories as $categorie)
						<a href="/categories/{{$categorie->slug}}" class="size">{{$categorie->name}}</a>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<hr class="product-divider">
		<div class="product-price">
			<ins class="new-price rem-3">{{\App\Services\FunctionService::strToCurrency($product->new_price)}}</ins>
			<del class="old-price rem-3">{{\App\Services\FunctionService::strToCurrency($product->old_price)}}</del>
		</div>

        <div class="ratings-container">
            <div class="ratings-full">
                <span class="ratings" style="width: {{floatval($product->rating_avg) / 5 * 100}}%;"></span>
                <span class="tooltiptext tooltip-top"></span>
            </div>
            <a href="/products/{{$product->slug}}" class="rating-reviews">({{$product->rating_count}} đánh giá)</a>
        </div>
		<div class="product-short-desc">
			<div class="flex-wrap d-flex align-items-center product-variations">
				<span class="text-default limit-content" style="font-size: 1.3rem ; -webkit-line-clamp: 6;">{{$product->short_description}}</span>
			</div>
		</div>
		<hr class="product-divider">

		<div class="product-form">
			<div class="product-qty-form">
				<div class="input-group">
					<input class="quantity form-control" type="number" min="1" value="1" max="10000000">
					<button class="quantity-plus w-icon-plus"></button>
					<button class="quantity-minus w-icon-minus"></button>
				</div>
			</div>
			<button class="btn btn-primary btn-cart" onclick="addToCart(this)">
				<i class="w-icon-cart"></i>
				<span>Thêm vào giỏ</span>
			</button>
		</div>
	</div>
</div>
