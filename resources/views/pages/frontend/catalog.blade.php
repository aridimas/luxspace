@extends('layouts.frontend')

@section('content')
<section class="bg-gray-100 py-8 px-4">
	 <div class="container mx-auto">
      <ul class="breadcrumb">
        <li>
          <a href="/">Home</a>
        </li>
        <li>
          <a href="#" aria-label="current-page">Catalog</a>
        </li>
      </ul>
    </div>
  </section>
<div class="section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12 p-0">
						<div class="noo-simple-product banner_left">
							<div class="simple-banner-left bottom_right" data-image="{{url('/frontend/images/banner/banner_11.jpg')}}">
								<div class="banner-left-content">
									<h3>{{ $category[0]['name'] }} </h3>
									<p>{{ $category[1]['description'] }}</p>
								</div>
							</div>
							<div class="noo-simple-content">
								@foreach ($products as $product)
								<div class="noo-inner" style="width: 50%; height: 286px">
									<a href="#">
										<img  src=" {{$product->galleries()->exists() ? Storage::url($product->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }} "
										alt=""
										class="w-full h-full object-cover object-center"
									  />
									</a>
									<div class="noo-loop-cart">
										<a href="#" class="button">Add to cart</a> 
									</div>
									<div class="simple-product-entry">
										<div class="price">IDR {{number_format($product->price)}}</div>
										<div class="wishlist-button">
											<a href="#">Wishlist</a>
										</div>
										<h3><a href=" {{route('details', $product->slug)}} ">{{ $product->name }}</a></h3>
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<div class="noo-simple-product banner_right">
							<div class="simple-banner-left top_left" data-image="{{url('/frontend/images/banner/banner_12.jpg')}}">
								<div class="banner-left-content">
									<h3>{{ $category[1]['name'] }}</h3>
									<p>{{ $category[1]['description'] }}</p>
								</div>
							</div>
							<div class="noo-simple-content">
								@foreach ($products2 as $product)
								<div class="noo-inner" style="width: 50%; height: 286px">
									<a href="#">
										<img  src=" {{$product->galleries()->exists() ? Storage::url($product->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }} "
										alt=""
										class="w-full h-full object-cover object-center"
									  />
									</a>
									<div class="noo-loop-cart">
										<a href="#" class="button">Add to cart</a> 
									</div>
									<div class="simple-product-entry">
										<div class="price">IDR {{number_format($product->price)}}</div>
										<div class="wishlist-button">
											<a href="#">Wishlist</a>
										</div>
										<h3><a href=" {{route('details', $product->slug)}} ">{{ $product->name }}</a></h3>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				
				<div class="section pt-9 pb-4">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="noo-section-title">
									<br><br><h3><span>Bestseller</span></h3>
									<p>hottest products of month</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				@foreach ($products3 as $product)
				<div class="noo-product-grid mt-0 ">
					<div class="noo-product-item style-2 col-md-4 col-sm-6">

						<div class="noo-product-inner">
							<div class="noo-product-thumbnail" style="width: 80%; height: 286px">
								<a href="shop-detail.html">
									<img  src=" {{$product->galleries()->exists() ? Storage::url($product->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }} "
											alt=""
											class="w-full h-full object-cover object-center" 
									/>
								</a>
								<div class="noo-product-meta">
									<div class="wishlist-button">
										<a href="#">Wishlist</a>
									</div>
									<div class="noo-quick-view">
										<a href="ajax/product-quickview.html"></a>
									</div>
								</div>
							</div>
							<h3><a href=" {{route('details', $product->slug)}} ">{{ $product->name }}</a></h3>
							<div class="shop-loo-after-item">
								<div class="price">
									{{number_format($product->price)}}
								</div>
								<div class="star-rating">
									<span style="width:40%"></span>
								</div>
							</div>
							<div class="noo-loop-cart">
								<a href="#" class="button add-to-cart"></a>
							</div>
						</div>
						
					</div>
				</div>
				@endforeach
				
			</div>
			<div class="flex">
				<span class="mx-auto text-xs font-bold">
				{{ $products3->links('pagination::bootstrap-4') }}
				</span>
			</div>
		</div>
	</div>
  <!-- END: BREADCRUMB -->

@endsection