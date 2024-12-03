
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
                                    <img src="assets/img/project/1.png" alt="img">
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
                    <p>Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, </p>
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
                                <span class="designation">First-Time Investor</span>
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
                                <img src="assets/img/testimonial/4.png" alt="img" style="height: 120px">
                            </div>
                            <div class="details">
                                <h6 class="name">Sarif Jaya Miprut</h6>
                                <span class="designation">Guest</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut</p>
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


        <!-- agent area start -->
        <div class="agent-area text-center pd-top-118 pd-bottom-90">
            <div class="container">
                <div class="section-title text-center">
                    <h6>Meet Our Agent</h6>
                    <h2>Our Best Agent</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-agent-wrap style-3">
                            <div class="thumb">
                                <img src="assets/img/agent/Bilal Ahmed.png" alt="img">
                            </div>
                            <div class="details">
                                <a class="phone-inner" href="#"><i class="fa fa-phone"></i></a>
                                <h4>Bilal Ahmed</h4>
                                <h6>Estate Agent</h6>
                                <ul class="social-area style-2">
                                    <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-agent-wrap style-3">
                            <div class="thumb">
                                <img src="assets/img/agent/hamza.png" alt="img">
                            </div>
                            <div class="details">
                                <a class="phone-inner" href="#"><i class="fa fa-phone"></i></a>
                                <h4>Hamza Khan</h4>
                                <h6>Estate Agent</h6>
                                <ul class="social-area style-2">
                                    <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-agent-wrap style-3">
                            <div class="thumb">
                                <img src="assets/img/agent/Bilal Ahmed.png" alt="img">
                            </div>
                            <div class="details">
                                <a class="phone-inner" href="#"><i class="fa fa-phone"></i></a>
                                <h4>Bilal Ahmed</h4>
                                <h6>Estate Agent</h6>
                                <ul class="social-area style-2">
                                    <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- agent area end -->

        <!-- blog area start -->
        <div class="blog-area pd-top-118 pd-bottom-90">
            <div class="container">
                <div class="section-title text-center">
                    <h6>Secondary Market</h6>
                    <h2>Properties</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product-wrap style-2">
                            <div class="thumb">
                                <img src="assets/img/project/7.png" alt="img">
                            </div>
                            <div class="product-details-inner">
                                <ul class="meta-inner d-flex">
                                    <li><i class="fa fa-user"></i>By Admin</li>
                                    <li><i class="fa fa-calendar-alt"></i>Marce 9, 2020</li>
                                    <li class="ms-auto"><i class="fa fa-solid fa-money"></i> PK 50000</li>
                                </ul>
                                <div class="d-flex">
                                    <h4><a href="blog-details.html">Family House</a></h4>
                                    <p class="ms-auto"><i class="fa fa-solid fa-coins"></i> 12</p>
                                </div>
                                <p>Lorem ipsum dolor consectetur iicing elit, sed do eius Lorem ipsum dolo amet, costur
                                    adipisicing eiusmod.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product-wrap style-2">
                            <div class="thumb">
                                <img src="assets/img/project/7.png" alt="img">
                            </div>
                            <div class="product-details-inner">
                                <ul class="meta-inner d-flex">
                                    <li><i class="fa fa-user"></i>By Admin</li>
                                    <li><i class="fa fa-calendar-alt"></i>Marce 9, 2020</li>
                                    <li class="ms-auto"><i class="fa fa-solid fa-money"></i> PK 50000</li>
                                </ul>
                                <div class="d-flex">
                                    <h4><a href="blog-details.html">Family House</a></h4>
                                    <p class="ms-auto"><i class="fa fa-solid fa-coins"></i> 12</p>
                                </div>
                                <p>Lorem ipsum dolor consectetur iicing elit, sed do eius Lorem ipsum dolo amet, costur
                                    adipisicing eiusmod.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product-wrap style-2">
                            <div class="thumb">
                                <img src="assets/img/project/7.png" alt="img">
                            </div>
                            <div class="product-details-inner">
                                <ul class="meta-inner d-flex">
                                    <li><i class="fa fa-user"></i>By Admin</li>
                                    <li><i class="fa fa-calendar-alt"></i>Marce 9, 2020</li>
                                    <li class="ms-auto"><i class="fa fa-solid fa-money"></i> PK 50000</li>
                                </ul>
                                <div class="d-flex">
                                    <h4><a href="blog-details.html">Family House</a></h4>
                                    <p class="ms-auto"><i class="fa fa-solid fa-coins"></i> 12</p>
                                </div>
                                <p>Lorem ipsum dolor consectetur iicing elit, sed do eius Lorem ipsum dolo amet, costur
                                    adipisicing eiusmod.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog area end -->

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
