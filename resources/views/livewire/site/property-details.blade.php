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
                                        <p><img src="{{asset('assets/img/icon/location2.png')}}" alt="img"> {{$property->property_address}}</p>
                                        <ul>
                                            <li>{{$property->property_rooms}} Rooms</li>
                                            <li>{{$property->property_kitchens}} Kitchens</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-5 text-lg-right">
                                        <h4>PK {{$property->property_price}}</h4>
                                        <ul>
                                            <li><img src="{{asset('assets/img/icon/1.png')}}" alt="img">{{$property->created_at->diffForHumans()}}</li>
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
                                <h4>Real Investment Location</h4>
                                <div class="property-map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3322.5509909143643!2d72.96939247452866!3d33.61695284059152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df968cf40a7279%3A0xc5f472b78a8bcfc4!2sRiphah%20International%20University!5e0!3m2!1sen!2s!4v1747243490835!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- property-page- end -->
    </div>
