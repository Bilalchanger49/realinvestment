
    <div>
        <!-- banner start -->
        <!-- banner start -->

        <div class="banner-area-bg banner-area">
            <div class="row justify-content-center">
                <div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active c-item">
                            <img src="assets/img/banner/2.png" class="d-block w-100" alt="...">

                        </div>
                        <div class="carousel-item c-item">
                            <img src="assets/img/banner/1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item c-item">
                            <img src="assets/img/banner/3.jpg" class="d-block w-100" alt="...">

                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center top-50 start-50 translate-middle text-center"
                         style="height: 100%;">
                        <p class="fs-5 mb-2">Welcome to your ultimate source for investing,</p>
                        <div class="line"></div>
                        <h2 class="display-6 fw-semibold">The Best Way To Invest In Real Estate</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- banner end -->
        <!-- banner end -->

        <!-- product area start -->
        <div class="product-area pd-top-90 pd-bottom-90">
            <div class="container">
                <div class="section-title text-center">
                    <h6>We are offring the best real estate Investments </h6>
                    <h2>New Arival</h2>
                </div>
                <div class="row justify-content-center">
                    @foreach($properties as $property)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product-wrap style-bottom">
                                <div class="thumb">
                                    <img src="{{asset('storage/' . $property->property_image)}}" alt="img" >
                                    <div class="product-wrap-details">
                                        <div class="media justify-content-end">
                                            <a class="fav-btn" href="#"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-details-inner">

                                    <div class="d-flex justify-content-between align-items-center">
                                        @if( $property->id)
                                            <h4><a href="{{ route('site.property.details', $property->id) }}">{{ $property->property_name }}</a></h4>
                                        @else
                                            <h4><a href="">{{ $property->property_name }}</a></h4>
                                        @endif


                                        <span class="price text-end"> <strong>PK {{$property->property_share_price}}</strong> </span>
                                    </div>

                                    <ul class="meta-inner">
                                        <li><img src="assets/img/icon/location2.png" alt="img">{{$property->property_address}}</li>
                                    </ul>
                                    <p>{{$property->property_description}}</p>
                                </div>
                                <div class="product-meta-bottom">
                                    <span class="price">PKR {{$property->property_price}}</span>
                                    <span>2 months ago</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
{{--                    <div class="col-lg-4 col-md-6">--}}
{{--                        <div class="single-product-wrap style-bottom">--}}
{{--                            <div class="thumb">--}}
{{--                                <img src="assets/img/project/1.png" alt="img">--}}
{{--                                <div class="product-wrap-details">--}}
{{--                                    <div class="media justify-content-end">--}}
{{--                                        <a class="fav-btn" href="#"><i class="far fa-heart"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-details-inner">--}}
{{--                                <div class="d-flex justify-content-between align-items-center">--}}
{{--                                    <h4><a href="{{route('site.property.details')}}">Seaside Villa</a></h4>--}}
{{--                                    <span class="price text-end"> <strong>PK 50000</strong> </span>--}}
{{--                                </div>--}}
{{--                                <ul class="meta-inner">--}}
{{--                                    <li><img src="assets/img/icon/location2.png" alt="img">Gwadar</li>--}}
{{--                                </ul>--}}
{{--                                <p>Own a slice of paradise with this Seaside Villa in Gwadar. Perfect for vacation rentals or personal use, offering breathtaking sea views..</p>--}}
{{--                            </div>--}}
{{--                            <div class="product-meta-bottom">--}}
{{--                                <span class="price">PKR 25,000,000</span>--}}
{{--                                <span>3 weeks ago</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>
        <!-- product area end -->

        <!-- testimonial area start -->
        <div class="testimonial-area bg-overlay pd-top-118 pd-bottom-120 bg-overlay"
             style="background: url(assets/img/bg/2.png);">
            <div class="container">
                <div class="section-title style-white text-center">
                    <h6>Our Testomonial </h6>
                    <h2>What Client Say</h2>
{{--                    <p>Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, </p>--}}
                </div>
                <div class="testimonial-slider-2 owl-carousel text-center">
                    <div class="item">
                        <div class="single-testimonial-inner style-three text-center">
                            <div class="thumb main-thumb">
                                <img src="assets/img/testimonial/1.png" alt="img" style="height: 120px">
                            </div>
                            <div class="details">
                                <h6 class="name">Ayesha Malik</h6>
                                <span class="designation">Investor</span>
                                <p>Real Investment made it possible for me to own a share in a commercial property
                                    without breaking my savings. A seamless and rewarding experience!</p>
                                <div class="rating-inner">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-testimonial-inner style-three text-center">
                            <div class="thumb main-thumb">
                                <img src="assets/img/testimonial/3.png" alt="img" style="height: 120px">
                            </div>
                            <div class="details">
                                <h6 class="name"> Zahid Khan</h6>
                                <span class="designation">Investor</span>
                                <p>I never thought owning a share in real estate could be so easy. Thanks to Real
                                    Investment, I'm earning steady rental income every year.</p>
                                <div class="rating-inner">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-testimonial-inner style-three text-center">
                            <div class="thumb main-thumb">
                                <img src="assets/img/agent/9.png" alt="img" style="height: 120px">
                            </div>
                            <div class="details">
                                <h6 class="name">Saim Malik</h6>
                                <span class="designation">investor</span>
                                <p>Real Investment made it possible for me to own a share in a commercial property
                                    without breaking my savings. A seamless and rewarding experience!</p>
                                <div class="rating-inner">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial area end -->

        <!-- Secondary market area start -->
        <div class="blog-area pd-top-90 pd-bottom-90">
            <div class="container">
                <div class="section-title text-center">
                    <h6>Secondary Market</h6>
                    <h2>Properties</h2>
                </div>
                @livewire('site.view-property_add-component')

            </div>
        </div>
        <!-- Secondary market area end -->

        <script>
            document.querySelectorAll('.toggle-content-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const card = this.closest('.single-product-wrap');
                    const isExpanded = card.getAttribute('data-expanded') === 'true';

                    // Toggle the expanded state
                    card.setAttribute('data-expanded', !isExpanded);

                    // Update the button text
                    this.textContent = isExpanded ? 'Read More' : 'Show Less';
                });
            });
        </script>
    </div>
