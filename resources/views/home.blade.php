@extends('layauts.admin')

@section('title', 'Home Page')

@section('pageTitle', 'Home Page')

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="{{asset('homeAssets/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('homeAssets/css/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
<link rel="stylesheet" href="{{asset('homeAssets/css/style.css')}}">


@section('content')
<section class="ftco-section">
			<div class="container">
				<div class="row">
					
					<div class="col-md-12">
						<div class="featured-carousel owl-carousel">
							<div class="item">
								<div class="work-wrap d-md-flex">
									<div class="img order-md-last" style="background-image: url({{asset('homeAssets/images/work-1.jpg')}});"></div>
									<div class="text text-left text-lg-right p-4 px-xl-5 d-flex align-items-center">
										<div class="desc w-100">
											<h2 class="mb-4">Define <br> Your Budget</h2>
											<p class="h5">Call: 0123 456 78901</p>
											<p class="h5 mb-4">Email Address: email@info.com</p>
											<div class="row justify-content-end">
												<div class="col-xl-8">
													<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
												</div>
											</div>
											<p>
												<button type="button" class="btn btn-outline-dark mb-2 py-3 px-4">Shop the collection Outline</button>
												<button type="button" class="btn btn-dark mb-2 py-3 px-4">Learn More</button>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="work-wrap d-md-flex">
									<div class="img order-md-last" style="background-image: url({{asset('homeAssets/images/work-2.jpg')}});"></div>
									<div class="text text-left text-lg-right p-4 px-xl-5 d-flex align-items-center">
										<div class="py-md-5">
											<h2 class="mb-4">Kids <br> Collection</h2>
											<p class="h5">Call: 0123 456 78901</p>
											<p class="h5 mb-4">Email Address: email@info.com</p>
											<div class="row justify-content-end">
												<div class="col-xl-8">
													<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
												</div>
											</div>
											<p>
												<button type="button" class="btn btn-outline-dark mb-2 py-3 px-4">Shop the collection Outline</button>
												<button type="button" class="btn btn-dark mb-2 py-3 px-4">Learn More</button>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="work-wrap d-md-flex">
									<div class="img order-md-last" style="background-image: url({{asset('homeAssets/images/work-3.jpg')}});"></div>
									<div class="text text-left text-lg-right p-4 px-xl-5 d-flex align-items-center">
										<div class="py-md-5">
											<h2 class="mb-4">Ladies <br> Collection</h2>
											<p class="h5">Call: 0123 456 78901</p>
											<p class="h5 mb-4">Email Address: email@info.com</p>
											<div class="row justify-content-end">
												<div class="col-xl-8">
													<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
												</div>
											</div>
											<p>
												<button type="button" class="btn btn-outline-dark mb-2 py-3 px-4">Shop the collection Outline</button>
												<button type="button" class="btn btn-dark mb-2 py-3 px-4">Learn More</button>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="work-wrap d-md-flex">
									<div class="img order-md-last" style="background-image: url({{asset('homeAssets/images/work-4.jpg')}});"></div>
									<div class="text text-left text-lg-right p-4 px-xl-5 d-flex align-items-center">
										<div class="py-md-5">
											<h2 class="mb-4">Ladies <br> Collection</h2>
											<p class="h5">Call: 0123 456 78901</p>
											<p class="h5 mb-4">Email Address: email@info.com</p>
											<div class="row justify-content-end">
												<div class="col-xl-8">
													<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
												</div>
											</div>
											<p>
												<button type="button" class="btn btn-outline-dark mb-2 py-3 px-4">Shop the collection Outline</button>
												<button type="button" class="btn btn-dark mb-2 py-3 px-4">Learn More</button>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                
			</div>
		</section>

    <script src="{{asset('homeAssets/js/jquery.min.js')}}"></script>
    <script src="{{asset('homeAssets/js/popper.js')}}"></script>
    <script src="{{asset('homeAssets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('homeAssets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('homeAssets/js/main.js')}}"></script>
@endsection



 
        
    