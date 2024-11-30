 <div>
        <!-- breadcrumb start -->
        <div class="breadcrumb-area bg-overlay-2" style="background-image:url('{{asset('assets/img/other/7.png')}}')">
            <div class="container">
                <div class="breadcrumb-inner">
                    <div class="section-title text-center">
                        <h2 class="page-title">Property Details</h2>
                        <ul class="page-list">
                            <li><a href="index.html">Home</a></li>
                            <li>Property Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->

        <!-- property-page- Start -->
        <div class="property-page-area pd-top-120 pd-bottom-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="property-details-top pd-bottom-70">
                            <div class="property-details-top-inner">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <h3>{{$property->property_name}}</h3>
                                        <p><img src="{{asset('assets/img/icon/location2.png')}}" alt="img"> {{$property->property_address}},
                                            Right
                                            Side real estate </p>
                                        <ul>
                                            <li>3 Bedroom</li>
                                            <li>Bathroom</li>
                                            <li>1026 sqft</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-5 text-lg-right">
                                        <h4>PK {{$property->property_price}}</h4>
                                        <ul>
                                            <li><img src="{{asset('assets/img/icon/1.png')}}" alt="img">Marce 9 , 2020</li>
                                            <li><img src="{{asset('assets/img/icon/2.png')}}" alt="img">4263</li>
                                            <li><img src="{{asset('assets/img/icon/3.png')}}" alt="img">68</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumbnail-wrapper" wire:ignore>
                                <div class="single-thumbnail-slider">
                                    <div class="slider-item">
                                        <img src="{{asset('storage/' . $property->property_image)}}" alt="img" >
                                    </div>
                                    <div class="slider-item">
                                        <img src="{{asset('assets/img/project-single/2.png')}}" alt="img">
                                    </div>
                                    <div class="slider-item">
                                        <img src="{{asset('assets/img/project-single/3.png')}}" alt="img">
                                    </div>
                                    <div class="slider-item">
                                        <img src="{{asset('assets/img/project-single/4.png')}}" alt="img">
                                    </div>
                                    <div class="slider-item">
                                        <img src="{{asset('assets/img/project-single/5.png')}}" alt="img">
                                    </div>
                                </div>
                                <div class="product-thumbnail-carousel">
                                    <div class="single-thumbnail-item">
                                        <img src="{{asset('storage/' . $property->property_image)}}" alt="img">
                                    </div>
                                    <div class="single-thumbnail-item">
                                        <img src="{{asset('assets/img/project-single/2.png')}}" alt="img">
                                    </div>
                                    <div class="single-thumbnail-item">
                                        <img src="{{asset('assets/img/project-single/3.png')}}" alt="img">
                                    </div>
                                    <div class="single-thumbnail-item">
                                        <img src="{{asset('assets/img/project-single/4.png')}}" alt="img">
                                    </div>
                                    <div class="single-thumbnail-item">
                                        <img src="{{asset('assets/img/project-single/5.png')}}" alt="img">
                                    </div>
                                    <div class="single-thumbnail-item">
                                        <img src="{{asset('assets/img/project-single/2.png')}}" alt="img">
                                    </div>
                                    <div class="single-thumbnail-item">
                                        <img src="{{asset('assets/img/project-single/3.png')}}" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-lg-4">--}}
{{--                        <aside class="sidebar-area">--}}
{{--                            <div class="widget widget-category">--}}
{{--                                <form wire:submit.prevent="calculateTotal" method="POST">--}}
{{--                                    <div class="d-flex justify-content-between align-items-center" style="border-bottom: 1px solid black;">--}}
{{--                                        <label>Total Shares</label>--}}
{{--                                        <p class="mb-0 text-right">{{ $totalShares }}</p>--}}
{{--                                    </div>--}}

{{--                                    <div class="mt-2 d-flex justify-content-between align-items-center" style="border-bottom: 1px solid black;">--}}
{{--                                        <label>Available Shares</label>--}}
{{--                                        <p class="mb-0 text-right">{{ $availableShares }}</p>--}}
{{--                                    </div>--}}

{{--                                    <div class="mt-2 d-flex justify-content-between align-items-center" style="border-bottom: 1px solid black;">--}}
{{--                                        <label>Share Price</label>--}}
{{--                                        <p id="sharePrice" class="mb-0 text-right">{{ $sharePrice }}</p>--}}
{{--                                    </div>--}}

{{--                                    <!-- Input to select the number of shares -->--}}
{{--                                    <div class="mt-3">--}}
{{--                                        <label for="numShares">Number of Shares to Buy:</label>--}}

{{--                                        <input type="number" id="numShares" name="numShares" class="form-control" min="1"--}}
{{--                                               max="{{ $availableShares }}"--}}
{{--                                               wire:model="numShares"--}}
{{--                                               wire:input="calculateTotal">--}}
{{--                                    </div>--}}

{{--                                    <!-- Display the total price -->--}}
{{--                                    <div class="mt-3 d-flex justify-content-between align-items-center" style="border-bottom: 1px solid black;">--}}
{{--                                        <label>Total Price</label>--}}
{{--                                        <p id="totalPrice" class="mb-0 text-right">{{ $totalPrice }}</p>--}}
{{--                                    </div>--}}

{{--                                    <!-- Buy button -->--}}
{{--                                    <div class="mt-3 text-center">--}}
{{--                                        <div class="btn-wrap">--}}
{{--                                            <button  wire.click="BuyProperty({{$property->id}})" class="btn btn-base w-md-auto w-50">Buy</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </aside>--}}
{{--                    </div>--}}
{{--                    @include('livewire.site.buy-property')--}}
                    @livewire('site.buy-property-component', ['id' => $property->id])
                </div>
            </div>


            <div>
                <div class="container">
                    <div class="col-lg-12">
                        <div class="single-property-details-inner">
                            <h4>Brief Description</h4>
                            <p>{{$property->property_description}}</p>
                            <div class="single-property-grid">
                                <h4>Poperty Details</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul>
                                            <li>Bedrooms: 3</li>
                                            <li>All Rooms: 12</li>
                                            <li>Kitchen: 2</li>
                                            <li>Type: Privet House</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul>
                                            <li>Bedrooms: 3</li>
                                            <li>Livingroom: 2</li>
                                            <li>Year Built: 2020</li>
                                            <li>Area: 1258</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul>
                                            <li>Bedrooms: 3</li>
                                            <li>All Rooms: 12</li>
                                            <li>Kitchen: 2</li>
                                            <li>Type: Privet House</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-property-grid">
                                <h4>Proparty Attachment</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="PDFLINK.html" download>
                                            <img src="{{asset('assets/img/icon/9.png')}}" alt="img">
                                        </a>
                                    </div>
                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                        <a href="PDFLINK.html" download>
                                            <img src="{{asset('assets/img/icon/9.png')}}" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-property-grid">
                                <h4>Estate Location</h4>
                                <div class="property-map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d198059.49240377638!2d-84.68048827338674!3d39.13652252762691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1615660592820!5m2!1sen!2sbd"></iframe>
                                </div>
                            </div>
                            <div class="single-property-grid">
                                <h4>Floor Plans</h4>
                                <img src="assets/img/project-single/6.png" alt="img">
                            </div>
                            <div class="single-property-grid">
                                <h4>Intro Video</h4>
                                <div class="property-video text-center"
                                     style="background: url(assets/img/project-single/8.png);">
                                    <a class="play-btn" href="https://www.youtube.com/embed/Wimkqo8gDZ0"
                                       data-effect="mfp-zoom-in"><i class="fa fa-play" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <form class="single-property-comment-form">
                                <div class="single-property-grid bg-black">
                                    <div class="single-property-form-title">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4>Post Your Comment</h4>
                                            </div>
                                            <div class="col-md-4 text-md-right">
                                                <div class="ratting-inner">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="single-input-inner style-bg">
                                                <span class="label">Enter Your Name</span>
                                                <input type="text" placeholder="Your name here....">
                                            </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="single-input-inner style-bg">
                                                <span class="label">Enter Your MAil</span>
                                                <input type="text" placeholder="Your email here....">
                                            </label>
                                        </div>
                                        <div class="col-12">
                                            <label class="single-input-inner style-bg">
                                                <span class="label">Enter Your Messege</span>
                                                <textarea placeholder="Enter your messege here...."></textarea>
                                            </label>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <button class="btn btn-base radius-btn">Submit Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- property-page- end -->
    </div>
