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
                            <div class="product-thumbnail-wrapper pt-3" wire:ignore>

                                <div class="single-thumbnail-slider">
                                    @foreach($images as $image)
                                        <div class="slider-item">
                                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Property Image">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="product-thumbnail-carousel">
                                    @foreach($images as $image)
                                        <div class="single-thumbnail-item">
                                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Property Image">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <div class="">
                                        <ul class="d-flex justify-content-between">
                                            <li>No of Rooms: {{$property->property_rooms}}</li>
                                            <li>Kitchen: {{$property->property_kitchens}}</li>
                                            <li>Type: {{$property->property_type}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-property-grid">
                                <h4>Estate Location</h4>
                                <div class="property-map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26559.881691762537!2d72.96755217665297!3d33.68344710204144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38dfbde37b1f3fe9%3A0x742d0ad4f5b956fd!2sF-11%2C%20Islamabad%2C%20Islamabad%20Capital%20Territory%2C%20Pakistan!5e0!3m2!1sen!2s!4v1735188285577!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
