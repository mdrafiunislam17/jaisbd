@extends('frontend.layouts.app')

@section('title', 'Visa')

@section('content')

<section class="visa-single">
    <div class="tf-container">

        <div class="row pd-main">
            <div class="col-lg-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-information" role="tabpanel"
                        aria-labelledby="pills-information-tab" tabindex="0">
                        <div class="row mb-50">
                            <div class="col-lg-12">
                                <div class="inner-heading-wrap flex-two">
                                    <div class="inner-heading">
                                        {{-- <span class="feature">Featured</span> --}}
                                        <h2 class="title">{{$visa->title}}</h2>
                                        <ul class="flex-three list-wrap-heading">
                                            <li class="flex-three">
                                                <i class="icon-time-left"></i>
                                                <span>{{$visa->duration }}</span>
                                            </li>
                                            <li class="flex-three">
                                                <i class="icon-user"></i>
                                                <span>Guests: {{ $visa->guests }}</span>
                                            </li>
                                            <li class="flex-three">
                                                <i class="icon-18"></i>
                                                <span>{{$visa->location}}</span>
                                            </li>


                                        </ul>

                                    </div>
                                    <div class="inner-price">
                                        {{-- <div class="flex-three">
                                            <div class="start">
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                                <i class="icon-Star"></i>
                                            </div>
                                            <span class="review">(1 Review)</span>
                                        </div> --}}
                                      <p class="price-sale text-main">
                                        @if($visa->discount)
                                            ৳ {{ $visa->discount }}
                                            <span class="price line-through">৳ {{ $visa->price }}</span>
                                        @else
                                            ৳ {{ $visa->price }}
                                        @endif
                                    </p>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row mb-40 image-gallery-single">

                            <div class="col-12 col-sm-12">
                                <img src="{{ asset('uploads/visa/' . $visa->image)}}" alt="image" style="max-width: 100%; height: auto; max-height: 450px;">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="information-content-visa">
                                    <div class="description-wrap mb-40">
                                        <span class="description">Description:</span>
                                        <p class="des">{!! $visa->description !!}</p>
                                    </div>


                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="side-bar-right">
                                    <div class="sidebar-widget">
                                        <h6 class="block-heading">Book This visa</h6>
                                        <form action="{{ route('bookings.store') }}" method="POST" id="form-book-visa">
                                            @csrf

                                            <!-- Hidden user_id, bookable_id, bookable_type -->
                                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                            <input type="hidden" name="bookable_id" value="{{ $visa->id }}">
                                             <input type="hidden" name="bookable_type" value="{{ get_class($visa) }}">
                                             <input type="hidden" name="status" value="pending">

                                            <!-- Booking Date -->
                                            <div class="input-wrap mb-30">
                                                <label for="booking_date">Booking Date</label>
                                                <input type="date" name="booking_date" id="booking_date" required>
                                            </div>

                                            <!-- Notes -->
                                            <div class="input-wrap mb-30">
                                                <label for="notes">Notes</label>
                                                <textarea name="notes" id="notes" rows="4" placeholder="Add any notes..."></textarea>
                                            </div>

                                            <div class="flex-two mb-40">
                                                <span class="label">Total:</span>
                                                <span class="total text-main">
                                                    @if($visa->discount)
                                                        ৳ {{ $visa->discount }}
                                                    @else
                                                        ৳ {{ $visa->price }}
                                                    @endif
                                                </span>
                                                <input type="hidden" name="booking_amount"
                                                    value="{{ $visa->discount ?: $visa->price }}">
                                            </div>


                                            <button type="submit">Proceed Booking</button>
                                        </form>
                                    </div>

                                    <div class="sidebar-widget">
                                        <h6 class="block-heading">Book With Confidence</h6>
                                        <ul class="category-confidence">
                                            <li class="flex-three">
                                                <i class="icon-customer-service-1"></i>
                                                <span>Customer care available 24/7</span>
                                            </li>
                                            <li class="flex-three">
                                                <i class="icon-Vector-6"></i>
                                                <span>Hand-picked visas & Activities</span>
                                            </li>
                                            {{-- <li class="flex-three">
                                                <i class="icon-insurance-1"></i>
                                                <span>Free Travel Insureance</span>
                                            </li> --}}
                                            <li class="flex-three">
                                                <i class="icon-price-tag-1-1"></i>
                                                <span>No-hassle best price guarantee</span>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-visa-planing" role="tabpanel"
                        aria-labelledby="pills-visa-planing-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="planing-content-visa">
                                    <h3 class="title-plan">visa Plan :</h3>
                                    <div class="visa-planing-section flex">
                                        <div class="number-box flex-five">01</div>
                                        <div class="content-box">
                                            <h5 class="title">Day 1: Arrive in Zürich, Switzerland</h5>
                                            <p class="des">We’ll meet at 4 p.m. at our hotel in Luzern
                                                (Lucerne) for a “Welcome to Switzerland”
                                                meeting. Then we’ll take a meandering evening walk
                                                through Switzerland’s most
                                                charming lakeside town, and get acquainted with one
                                                another over dinner we've
                                                focused on improving our funct together. Sleep in Luzern
                                                (2 nights). No bus. Walk</p>
                                        </div>
                                    </div>
                                    <div class="visa-planing-section flex">
                                        <div class="number-box flex-five">02</div>
                                        <div class="content-box">
                                            <h5 class="title">Day 2: Zürich–Biel/BienneNeuchâtel–Geneva
                                            </h5>
                                            <p class="des mb-10">We’ll meet at 4 p.m. at our hotel in
                                                Luzern (Lucerne) for a “Welcome to Switzerland”
                                                meeting. Then we’ll take a meandering evening walk
                                                through Switzerland’s most
                                                charming lakeside town, and get acquainted with one
                                                another over </p>
                                            <ul class="listing-des">
                                                <li>
                                                    <p>View the City Walls</p>
                                                </li>
                                                <li>
                                                    <p>Hiking in the forest</p>
                                                </li>
                                                <li>
                                                    <p>Discover the famous view point “The Lark”</p>
                                                </li>
                                                <li>
                                                    <p>Sunset on the cruise</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="visa-planing-section flex">
                                        <div class="number-box flex-five">03</div>
                                        <div class="content-box">
                                            <h5 class="title">Day 3: Enchanting Engelberg</h5>
                                            <p class="des mb-22">We’ll meet at 4 p.m. at our hotel in
                                                Luzern (Lucerne) for a “Welcome to Switzerland”
                                                meeting. Then we’ll take a meandering evening walk
                                                through Switzerland’s most
                                                charming lakeside town, and get acquainted with one
                                                another over </p>
                                            <ul class="listing-icon">
                                                <li class="flex-three">
                                                    <i class="icon-10"></i>
                                                    <p>Praesent vulputate at enim sit amet mattis
                                                        lobortis ante pulvinar at diam</p>
                                                </li>
                                                <li class="flex-three">
                                                    <i class="icon-10"></i>
                                                    <p>Donec ut lobortis ante, non lobortis ante
                                                        imperdiet est volutpat in diam erat</p>
                                                </li>
                                                <li class="flex-three">
                                                    <i class="icon-10"></i>
                                                    <p>Donec ut lobortis ante, non lobortis ante
                                                        imperdiet est volutpat in diam erat</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="visa-planing-section flex">
                                        <div class="number-box flex-five">04</div>
                                        <div class="content-box">
                                            <h5 class="title">Day 4: Arrive in Zürich, Switzerland</h5>
                                            <p class="des mb-25">We’ll meet at 4 p.m. at our hotel in
                                                Luzern (Lucerne) for a “Welcome to Switzerland”
                                                meeting. Then we’ll take a meandering evening walk
                                                through Switzerland</p>
                                            <ul class="listing-clude">
                                                <li class="flex-three">
                                                    <i class="icon-Vector-7"></i>
                                                    <p>Pick and Drop Services</p>
                                                </li>
                                                <li class="flex-three">
                                                    <i class="icon-Vector-7"></i>
                                                    <p>1 Meal Per Day</p>
                                                </li>
                                                <li class="flex-three">
                                                    <i class="icon-Vector-7"></i>
                                                    <p>Cruise Dinner & Music Event</p>
                                                </li>
                                                <li class="flex-three">
                                                    <i class="icon-Vector-7"></i>
                                                    <p>Visit 7 Best Places in the City With Group</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="side-bar-right">
                                    <div class="sidebar-widget">
                                        <h6 class="block-heading">Book This visa</h6>
                                        <form action="/" id="form-book-visa">
                                            <div class="input-wrap mb-30">
                                                <input type="date">
                                            </div>
                                            <div class="flex-two mb-30">
                                                <span class="label">Time:</span>
                                                <div class="radio">
                                                    <input id="first" type="radio" name="numbers"
                                                        value="first" checked>
                                                    <label for="first">14.00</label>
                                                    <input id="second" type="radio" name="numbers"
                                                        value="second">
                                                    <label for="second">16.00</label>
                                                </div>
                                            </div>
                                            <div class="input-wrap-sellect mb-30">
                                                <span class="label">Tickets:</span>
                                                <div class="flex-two mb-15">
                                                    <p>Children (0-12 years)$129.00</p>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">1</span>
                                                        <ul class="list">
                                                            <li data-value=""
                                                                class="option selected focus">1</li>
                                                            <li data-value="2" class="option">2</li>
                                                            <li data-value="3" class="option">3</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="flex-two mb-15">
                                                    <p>Youth (13-17 years)$169.00</p>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">1</span>
                                                        <ul class="list">
                                                            <li data-value=""
                                                                class="option selected focus">1</li>
                                                            <li data-value="2" class="option">2</li>
                                                            <li data-value="3" class="option">3</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="flex-two">
                                                    <p>Adult (18+ years)$189.00</p>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">1</span>
                                                        <ul class="list">
                                                            <li data-value=""
                                                                class="option selected focus">1</li>
                                                            <li data-value="2" class="option">2</li>
                                                            <li data-value="3" class="option">3</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-wrap-checkbox mb-30">
                                                <span class="label">Add Extra</span>
                                                <div class="checkbox">
                                                    <input id="check" type="checkbox" name="check"
                                                        value="check">
                                                    <label for="check">Service per booking</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input id="check1" type="checkbox" name="check"
                                                        value="check">
                                                    <label for="check1">Service per person</label>
                                                </div>
                                                <div class="extra">
                                                    <div class="flex-three">
                                                        <span class="name">Adult:</span>
                                                        <span class="price">$18.00</span>
                                                    </div>
                                                    <div class="flex-three">
                                                        <span class="name">Youth:</span>
                                                        <span class="price">$16.00</span>
                                                    </div>
                                                    <div class="flex-three">
                                                        <span class="name">Children:</span>
                                                        <span class="price">$16.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-two mb-40">
                                                <span class="label">Total:</span>
                                                <span class="total text-main">$130.00</span>
                                            </div>
                                            <button type="submit">Procced Booking</button>

                                        </form>
                                    </div>
                                    <div class="sidebar-widget">
                                        <h6 class="block-heading">Book With Confidence</h6>
                                        <ul class="category-confidence">
                                            <li class="flex-three">
                                                <i class="icon-customer-service-1"></i>
                                                <span>Customer care available 24/7</span>
                                            </li>
                                            <li class="flex-three">
                                                <i class="icon-Vector-6"></i>
                                                <span>Hand-picked visas & Activities</span>
                                            </li>
                                            {{-- <li class="flex-three">
                                                <i class="icon-insurance-1"></i>
                                                <span>Free Travel Insureance</span>
                                            </li> --}}
                                            <li class="flex-three">
                                                <i class="icon-price-tag-1-1"></i>
                                                <span>No-hassle best price guarantee</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="sidebar-widget">
                                        <h4 class="block-heading">Recent News</h4>
                                        <div class="recent-post-list">
                                            <div class="list-recent flex-three">
                                                <a href="blog-details.html" class="recent-image">
                                                    <img src="./assets/images/blog/re-blog1.jpg"
                                                        alt="Image">
                                                </a>
                                                <div class="recent-info">
                                                    <div class="start">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                    </div>
                                                    <h4 class="title">
                                                        <a href="blog-details.html">Walking the Amalfi
                                                            Coast</a>
                                                    </h4>
                                                    <p>From <span class="text-main">$129.00</span></p>
                                                </div>
                                            </div>
                                            <div class="list-recent flex-three">
                                                <a href="blog-details.html" class="recent-image">
                                                    <img src="./assets/images/blog/re-blog2.jpg"
                                                        alt="Image">
                                                </a>
                                                <div class="recent-info">
                                                    <div class="start">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                    </div>
                                                    <h4 class="title">
                                                        <a href="blog-details.html">Walking the Amalfi
                                                            Coast</a>
                                                    </h4>
                                                    <p>From <span class="text-main">$129.00</span></p>
                                                </div>
                                            </div>
                                            <div class="list-recent flex-three">
                                                <a href="blog-details.html" class="recent-image">
                                                    <img src="./assets/images/blog/re-blog3.jpg"
                                                        alt="Image">
                                                </a>
                                                <div class="recent-info">
                                                    <div class="start">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                    </div>
                                                    <h4 class="title">
                                                        <a href="blog-details.html">Walking the Amalfi
                                                            Coast</a>
                                                    </h4>
                                                    <p>From <span class="text-main">$129.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-location-share" role="tabpanel"
                        aria-labelledby="pills-location-share-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="localtion-content-visa">
                                    <div class="map2 relative mb-32">
                                        <div id="map2"></div>
                                    </div>
                                    <div class="flex-three map-list mb-50">
                                        <i class="icon-18"></i>
                                        <p>1421 San Pedro St, Los Angeles, CA</p>
                                    </div>
                                    <h3 class="title-location">Description:</h3>
                                    <p class="des mb-22">Description It is a long established fact that
                                        a reader will be distrac by any websites look for ways mornings
                                        even
                                        of spring prevent AdBlock from blocking annoying ads. As a
                                        result, we've focused on improving our funct walk
                                        so that we can overcome these anti-ad blocking attempts. Of
                                        course, you can help us continue improve our
                                        ad blocking ability by reporting any time you run into a website
                                        that won't allow you to block the readable dine
                                        content of a page when looking at its layout. It is a long
                                        established fact
                                    </p>
                                    <ul class="listing-des">
                                        <li>
                                            <p>View the City Walls</p>
                                        </li>
                                        <li>
                                            <p>Hiking in the forest</p>
                                        </li>
                                        <li>
                                            <p>Discover the famous view point “The Lark”</p>
                                        </li>
                                        <li>
                                            <p>Sunset on the cruise</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="side-bar-right">
                                    <div class="sidebar-widget">
                                        <h6 class="block-heading">Book This visa</h6>
                                        <form action="/" id="form-book-visa">
                                            <div class="input-wrap mb-30">
                                                <input type="date">
                                            </div>
                                            <div class="flex-two mb-30">
                                                <span class="label">Time:</span>
                                                <div class="radio">
                                                    <input id="first" type="radio" name="numbers"
                                                        value="first" checked>
                                                    <label for="first">14.00</label>
                                                    <input id="second" type="radio" name="numbers"
                                                        value="second">
                                                    <label for="second">16.00</label>
                                                </div>
                                            </div>
                                            <div class="input-wrap-sellect mb-30">
                                                <span class="label">Tickets:</span>
                                                <div class="flex-two mb-15">
                                                    <p>Children (0-12 years)$129.00</p>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">1</span>
                                                        <ul class="list">
                                                            <li data-value=""
                                                                class="option selected focus">1</li>
                                                            <li data-value="2" class="option">2</li>
                                                            <li data-value="3" class="option">3</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="flex-two mb-15">
                                                    <p>Youth (13-17 years)$169.00</p>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">1</span>
                                                        <ul class="list">
                                                            <li data-value=""
                                                                class="option selected focus">1</li>
                                                            <li data-value="2" class="option">2</li>
                                                            <li data-value="3" class="option">3</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="flex-two">
                                                    <p>Adult (18+ years)$189.00</p>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">1</span>
                                                        <ul class="list">
                                                            <li data-value=""
                                                                class="option selected focus">1</li>
                                                            <li data-value="2" class="option">2</li>
                                                            <li data-value="3" class="option">3</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-wrap-checkbox mb-30">
                                                <span class="label">Add Extra</span>
                                                <div class="checkbox">
                                                    <input id="check" type="checkbox" name="check"
                                                        value="check">
                                                    <label for="check">Service per booking</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input id="check1" type="checkbox" name="check"
                                                        value="check">
                                                    <label for="check1">Service per person</label>
                                                </div>
                                                <div class="extra">
                                                    <div class="flex-three">
                                                        <span class="name">Adult:</span>
                                                        <span class="price">$18.00</span>
                                                    </div>
                                                    <div class="flex-three">
                                                        <span class="name">Youth:</span>
                                                        <span class="price">$16.00</span>
                                                    </div>
                                                    <div class="flex-three">
                                                        <span class="name">Children:</span>
                                                        <span class="price">$16.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-two mb-40">
                                                <span class="label">Total:</span>
                                                <span class="total text-main">$130.00</span>
                                            </div>
                                            <button type="submit">Procced Booking</button>

                                        </form>
                                    </div>
                                    <div class="sidebar-widget">
                                        <h6 class="block-heading">Book With Confidence</h6>
                                        <ul class="category-confidence">
                                            <li class="flex-three">
                                                <i class="icon-customer-service-1"></i>
                                                <span>Customer care available 24/7</span>
                                            </li>
                                            <li class="flex-three">
                                                <i class="icon-Vector-6"></i>
                                                <span>Hand-picked visas & Activities</span>
                                            </li>
                                            {{-- <li class="flex-three">
                                                <i class="icon-insurance-1"></i>
                                                <span>Free Travel Insureance</span>
                                            </li> --}}
                                            <li class="flex-three">
                                                <i class="icon-price-tag-1-1"></i>
                                                <span>No-hassle best price guarantee</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="sidebar-widget">
                                        <h4 class="block-heading">Recent News</h4>
                                        <div class="recent-post-list">
                                            <div class="list-recent flex-three">
                                                <a href="blog-details.html" class="recent-image">
                                                    <img src="./assets/images/blog/re-blog1.jpg"
                                                        alt="Image">
                                                </a>
                                                <div class="recent-info">
                                                    <div class="start">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                    </div>
                                                    <h4 class="title">
                                                        <a href="blog-details.html">Walking the Amalfi
                                                            Coast</a>
                                                    </h4>
                                                    <p>From <span class="text-main">$129.00</span></p>
                                                </div>
                                            </div>
                                            <div class="list-recent flex-three">
                                                <a href="blog-details.html" class="recent-image">
                                                    <img src="./assets/images/blog/re-blog2.jpg"
                                                        alt="Image">
                                                </a>
                                                <div class="recent-info">
                                                    <div class="start">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                    </div>
                                                    <h4 class="title">
                                                        <a href="blog-details.html">Walking the Amalfi
                                                            Coast</a>
                                                    </h4>
                                                    <p>From <span class="text-main">$129.00</span></p>
                                                </div>
                                            </div>
                                            <div class="list-recent flex-three">
                                                <a href="blog-details.html" class="recent-image">
                                                    <img src="./assets/images/blog/re-blog3.jpg"
                                                        alt="Image">
                                                </a>
                                                <div class="recent-info">
                                                    <div class="start">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                    </div>
                                                    <h4 class="title">
                                                        <a href="blog-details.html">Walking the Amalfi
                                                            Coast</a>
                                                    </h4>
                                                    <p>From <span class="text-main">$129.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-reviews" role="tabpanel"
                        aria-labelledby="pills-reviews-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="review-content-visa">
                                    <div class="custom-review mb-80">
                                        <h4 class="title-review mb-37">Customer Review</h4>
                                        <div class="flex card-list">
                                            <div class="card-review">
                                                <div class="percent">
                                                    <svg>
                                                        <circle cx="105" cy="105" r="100"></circle>
                                                        <circle cx="105" cy="105" r="100"
                                                            style="--percent: 30"></circle>
                                                    </svg>
                                                    <div class="number center">
                                                        <span>overall Ratings</span>
                                                        <h5 class="number-reating">4.8</h5>
                                                        <span>Out of 5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-list">
                                                <div class="review-list-item mb-40">
                                                    <span class="comfort">Comfort</span>
                                                    <div class="flex-two">
                                                        <span class="reating">Rating 4.8 </span>
                                                        <div class="start">
                                                            <i class=" icon-Star"></i>
                                                            <i class=" icon-Star"></i>
                                                            <i class=" icon-Star"></i>
                                                            <i class=" icon-Star"></i>
                                                            <i class=" icon-Star"></i>
                                                            <span>5.0</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress" role="progressbar"
                                                        aria-label="example" aria-valuenow="25"
                                                        aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar" style="width: 70%">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="review-list-item mb-40">
                                                    <span class="comfort">Comfort</span>
                                                    <div class="flex-two">
                                                        <span class="reating">Rating 4.8 </span>
                                                        <div class="start">
                                                            <i class=" icon-Star"></i>
                                                            <i class=" icon-Star"></i>
                                                            <i class=" icon-Star"></i>
                                                            <i class=" icon-Star"></i>
                                                            <i class=" icon-Star"></i>
                                                            <span>5.0</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress" role="progressbar"
                                                        aria-label="example" aria-valuenow="25"
                                                        aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar" style="width: 80%">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="review-list-item mb-40">
                                                    <span class="comfort">Comfort</span>
                                                    <div class="flex-two">
                                                        <span class="reating">Rating 4.8 </span>
                                                        <div class="start">
                                                            <i class=" icon-Star"></i>
                                                            <i class=" icon-Star"></i>
                                                            <i class=" icon-Star"></i>
                                                            <i class=" icon-Star"></i>
                                                            <i class=" icon-Star"></i>
                                                            <span>5.0</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress" role="progressbar"
                                                        aria-label="example" aria-valuenow="25"
                                                        aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar" style="width: 60%">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="review-list-item mb-40">
                                                    <span class="comfort">Comfort</span>
                                                    <div class="flex-two">
                                                        <span class="reating">Rating 4.8 </span>
                                                        <div class="start">
                                                            <i class=" icon-Star"></i>
                                                            <i class=" icon-Star"></i>
                                                            <i class=" icon-Star"></i>
                                                            <i class=" icon-Star"></i>
                                                            <i class=" icon-Star"></i>
                                                            <span>5.0</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress" role="progressbar"
                                                        aria-label="example" aria-valuenow="25"
                                                        aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar" style="width: 90%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                    <div class="client-review mb-80">
                                        <div class="flex-two mb-50 inner-header">
                                            <h4 class="title-review">Client’s Review</h4>
                                            <div class="client-review flex">
                                                <span>6 Reviews</span>
                                                <div class="start">
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                </div>
                                                <span>(5 out of 5)</span>
                                            </div>

                                        </div>

                                        <div class="client-review-list">
                                            <div class="client-review-item flex">
                                                <div class="avata">
                                                    <img src="./assets/images/avata/avt-review.jpg"
                                                        alt="image">
                                                </div>
                                                <div class="content">
                                                    <span class="name">Rohan De Spond</span>
                                                    <p class="des">Lorem ipsum dolor sit amet,
                                                        consectetur adipiscing elit.Curabitur have is
                                                        covered many vulputate vestibulum Phasellus
                                                        rhoncus, dolor eget viverra
                                                        pretium dolor tellus aliquet nunc, vitae
                                                        ultricies erat elit eu lacus.
                                                    </p>
                                                    <div class="start">
                                                        <i class=" icon-Star"></i>
                                                        <i class=" icon-Star"></i>
                                                        <i class=" icon-Star"></i>
                                                        <i class=" icon-Star"></i>
                                                        <i class=" icon-Star"></i>
                                                        <span>5.0</span>
                                                    </div>
                                                    <span class="date">25 jan 2021</span>

                                                </div>

                                            </div>
                                            <div class="client-review-item flex">
                                                <div class="avata">
                                                    <img src="./assets/images/avata/avt-review.jpg"
                                                        alt="image">
                                                </div>
                                                <div class="content">
                                                    <span class="name">Rohan De Spond</span>
                                                    <p class="des">Lorem ipsum dolor sit amet,
                                                        consectetur adipiscing elit.Curabitur have is
                                                        covered many vulputate vestibulum Phasellus
                                                        rhoncus, dolor eget viverra
                                                        pretium dolor tellus aliquet nunc, vitae
                                                        ultricies erat elit eu lacus.
                                                    </p>
                                                    <div class="start">
                                                        <i class=" icon-Star"></i>
                                                        <i class=" icon-Star"></i>
                                                        <i class=" icon-Star"></i>
                                                        <i class=" icon-Star"></i>
                                                        <i class=" icon-Star"></i>
                                                        <span>5.0</span>
                                                    </div>
                                                    <span class="date">25 jan 2021</span>

                                                </div>

                                            </div>
                                            <div class="client-review-item flex">
                                                <div class="avata">
                                                    <img src="./assets/images/avata/avt-review.jpg"
                                                        alt="image">
                                                </div>
                                                <div class="content">
                                                    <span class="name">Rohan De Spond</span>
                                                    <p class="des">Lorem ipsum dolor sit amet,
                                                        consectetur adipiscing elit.Curabitur have is
                                                        covered many vulputate vestibulum Phasellus
                                                        rhoncus, dolor eget viverra
                                                        pretium dolor tellus aliquet nunc, vitae
                                                        ultricies erat elit eu lacus.
                                                    </p>
                                                    <div class="start">
                                                        <i class=" icon-Star"></i>
                                                        <i class=" icon-Star"></i>
                                                        <i class=" icon-Star"></i>
                                                        <i class=" icon-Star"></i>
                                                        <i class=" icon-Star"></i>
                                                        <span>5.0</span>
                                                    </div>
                                                    <span class="date">25 jan 2021</span>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-review bg-1">
                                        <h4 class="title-review mb-60">leave a comment</h4>
                                        <div class="inner-review flex-one mb-50">
                                            <div class="inner-review-item">
                                                <span class="text-review">Value for Money*</span>
                                                <div class="start">
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                </div>

                                            </div>
                                            <div class="inner-review-item">
                                                <span class="text-review">Destination*</span>
                                                <div class="start">
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                </div>

                                            </div>
                                            <div class="inner-review-item">
                                                <span class="text-review">Accommodation*</span>
                                                <div class="start">
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                </div>

                                            </div>
                                            <div class="inner-review-item">
                                                <span class="text-review">Transport*</span>
                                                <div class="start">
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                    <i class=" icon-Star"></i>
                                                </div>

                                            </div>

                                        </div>
                                        <form action="/" id="form-review">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset class="relative input-wrap mb-37">
                                                        <i class="icon-user-1-1"></i>
                                                        <input type="text" placeholder="First name"
                                                            name="name">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="relative input-wrap mb-37">
                                                        <i class="icon-Group-51"></i>
                                                        <input type="email" placeholder="Email Address"
                                                            name="email">
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset class="relative input-wrap mb-37">
                                                        <i class="icon-content"></i>
                                                        <textarea name="review" rows="10" cols="50"
                                                            placeholder="Write Review"></textarea>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="checkbox mb-60">
                                                        <input id="check-review" type="checkbox"
                                                            name="check" value="check">
                                                        <label for="check-review">I agree to Terms &
                                                            Conditions, Refund Policy and Privacy Policy
                                                            of Fabrilife.</label>
                                                    </div>
                                                </div>
                                                <div class="cok-lg-12">
                                                    <button type="submit" class="submit">Post
                                                        Comment</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-4">
                                <div class="side-bar-right">
                                    <div class="sidebar-widget">
                                        <h6 class="block-heading">Book This visa</h6>
                                        <form action="/" id="form-book-visa">
                                            <div class="input-wrap mb-30">
                                                <input type="date">
                                            </div>
                                            <div class="flex-two mb-30">
                                                <span class="label">Time:</span>
                                                <div class="radio">
                                                    <input id="first" type="radio" name="numbers"
                                                        value="first" checked>
                                                    <label for="first">14.00</label>
                                                    <input id="second" type="radio" name="numbers"
                                                        value="second">
                                                    <label for="second">16.00</label>
                                                </div>
                                            </div>
                                            <div class="input-wrap-sellect mb-30">
                                                <span class="label">Tickets:</span>
                                                <div class="flex-two mb-15">
                                                    <p>Children (0-12 years)$129.00</p>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">1</span>
                                                        <ul class="list">
                                                            <li data-value=""
                                                                class="option selected focus">1</li>
                                                            <li data-value="2" class="option">2</li>
                                                            <li data-value="3" class="option">3</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="flex-two mb-15">
                                                    <p>Youth (13-17 years)$169.00</p>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">1</span>
                                                        <ul class="list">
                                                            <li data-value=""
                                                                class="option selected focus">1</li>
                                                            <li data-value="2" class="option">2</li>
                                                            <li data-value="3" class="option">3</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="flex-two">
                                                    <p>Adult (18+ years)$189.00</p>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">1</span>
                                                        <ul class="list">
                                                            <li data-value=""
                                                                class="option selected focus">1</li>
                                                            <li data-value="2" class="option">2</li>
                                                            <li data-value="3" class="option">3</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-wrap-checkbox mb-30">
                                                <span class="label">Add Extra</span>
                                                <div class="checkbox">
                                                    <input id="check" type="checkbox" name="check"
                                                        value="check">
                                                    <label for="check">Service per booking</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input id="check1" type="checkbox" name="check"
                                                        value="check">
                                                    <label for="check1">Service per person</label>
                                                </div>
                                                <div class="extra">
                                                    <div class="flex-three">
                                                        <span class="name">Adult:</span>
                                                        <span class="price">$18.00</span>
                                                    </div>
                                                    <div class="flex-three">
                                                        <span class="name">Youth:</span>
                                                        <span class="price">$16.00</span>
                                                    </div>
                                                    <div class="flex-three">
                                                        <span class="name">Children:</span>
                                                        <span class="price">$16.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-two mb-40">
                                                <span class="label">Total:</span>
                                                <span class="total text-main">$130.00</span>
                                            </div>
                                            <button type="submit">Procced Booking</button>

                                        </form>
                                    </div>
                                    <div class="sidebar-widget">
                                        <h6 class="block-heading">Book With Confidence</h6>
                                        <ul class="category-confidence">
                                            <li class="flex-three">
                                                <i class="icon-customer-service-1"></i>
                                                <span>Customer care available 24/7</span>
                                            </li>
                                            <li class="flex-three">
                                                <i class="icon-Vector-6"></i>
                                                <span>Hand-picked visas & Activities</span>
                                            </li>
                                            {{-- <li class="flex-three">
                                                <i class="icon-insurance-1"></i>
                                                <span>Free Travel Insureance</span>
                                            </li> --}}
                                            <li class="flex-three">
                                                <i class="icon-price-tag-1-1"></i>
                                                <span>No-hassle best price guarantee</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="sidebar-widget">
                                        <h4 class="block-heading">Recent News</h4>
                                        <div class="recent-post-list">
                                            <div class="list-recent flex-three">
                                                <a href="blog-details.html" class="recent-image">
                                                    <img src="./assets/images/blog/re-blog1.jpg"
                                                        alt="Image">
                                                </a>
                                                <div class="recent-info">
                                                    <div class="start">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                    </div>
                                                    <h4 class="title">
                                                        <a href="blog-details.html">Walking the Amalfi
                                                            Coast</a>
                                                    </h4>
                                                    <p>From <span class="text-main">$129.00</span></p>
                                                </div>
                                            </div>
                                            <div class="list-recent flex-three">
                                                <a href="blog-details.html" class="recent-image">
                                                    <img src="./assets/images/blog/re-blog2.jpg"
                                                        alt="Image">
                                                </a>
                                                <div class="recent-info">
                                                    <div class="start">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                    </div>
                                                    <h4 class="title">
                                                        <a href="blog-details.html">Walking the Amalfi
                                                            Coast</a>
                                                    </h4>
                                                    <p>From <span class="text-main">$129.00</span></p>
                                                </div>
                                            </div>
                                            <div class="list-recent flex-three">
                                                <a href="blog-details.html" class="recent-image">
                                                    <img src="./assets/images/blog/re-blog3.jpg"
                                                        alt="Image">
                                                </a>
                                                <div class="recent-info">
                                                    <div class="start">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                    </div>
                                                    <h4 class="title">
                                                        <a href="blog-details.html">Walking the Amalfi
                                                            Coast</a>
                                                    </h4>
                                                    <p>From <span class="text-main">$129.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-shot-gallery" role="tabpanel"
                        aria-labelledby="pills-shot-gallery-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="gallery-content-visa">
                                    <div class="image-gallery1 image">
                                        <img src="./assets/images/gallery/gallery.jpg" alt="image"
                                            class="item1">
                                    </div>

                                    <div class="image-gallery2 image">
                                        <img src="./assets/images/gallery/gallery2.jpg" alt="image"
                                            class="item2">
                                    </div>

                                    <div class="image-gallery3 image">
                                        <img src="./assets/images/gallery/gallery3.jpg" alt="image"
                                            class="item1">
                                    </div>

                                    <div class="image-gallery4 image">
                                        <img src="./assets/images/gallery/gallery4.jpg" alt="image"
                                            class="item2">
                                    </div>

                                    <div class="image-gallery5 image">
                                        <img src="./assets/images/gallery/gallery5.jpg" alt="image"
                                            class="item1">
                                    </div>

                                    <div class="image-gallery6 image">
                                        <img src="./assets/images/gallery/gallery6.jpg" alt="image"
                                            class="item2">
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <div class="side-bar-right">
                                    <div class="sidebar-widget">
                                        <h6 class="block-heading">Book This visa</h6>
                                        <form action="/" id="form-book-visa">
                                            <div class="input-wrap mb-30">
                                                <input type="date">
                                            </div>
                                            <div class="flex-two mb-30">
                                                <span class="label">Time:</span>
                                                <div class="radio">
                                                    <input id="first" type="radio" name="numbers"
                                                        value="first" checked>
                                                    <label for="first">14.00</label>
                                                    <input id="second" type="radio" name="numbers"
                                                        value="second">
                                                    <label for="second">16.00</label>
                                                </div>
                                            </div>
                                            <div class="input-wrap-sellect mb-30">
                                                <span class="label">Tickets:</span>
                                                <div class="flex-two mb-15">
                                                    <p>Children (0-12 years)$129.00</p>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">1</span>
                                                        <ul class="list">
                                                            <li data-value=""
                                                                class="option selected focus">1</li>
                                                            <li data-value="2" class="option">2</li>
                                                            <li data-value="3" class="option">3</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="flex-two mb-15">
                                                    <p>Youth (13-17 years)$169.00</p>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">1</span>
                                                        <ul class="list">
                                                            <li data-value=""
                                                                class="option selected focus">1</li>
                                                            <li data-value="2" class="option">2</li>
                                                            <li data-value="3" class="option">3</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="flex-two">
                                                    <p>Adult (18+ years)$189.00</p>
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">1</span>
                                                        <ul class="list">
                                                            <li data-value=""
                                                                class="option selected focus">1</li>
                                                            <li data-value="2" class="option">2</li>
                                                            <li data-value="3" class="option">3</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-wrap-checkbox mb-30">
                                                <span class="label">Add Extra</span>
                                                <div class="checkbox">
                                                    <input id="check" type="checkbox" name="check"
                                                        value="check">
                                                    <label for="check">Service per booking</label>
                                                </div>
                                                <div class="checkbox">
                                                    <input id="check1" type="checkbox" name="check"
                                                        value="check">
                                                    <label for="check1">Service per person</label>
                                                </div>
                                                <div class="extra">
                                                    <div class="flex-three">
                                                        <span class="name">Adult:</span>
                                                        <span class="price">$18.00</span>
                                                    </div>
                                                    <div class="flex-three">
                                                        <span class="name">Youth:</span>
                                                        <span class="price">$16.00</span>
                                                    </div>
                                                    <div class="flex-three">
                                                        <span class="name">Children:</span>
                                                        <span class="price">$16.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-two mb-40">
                                                <span class="label">Total:</span>
                                                <span class="total text-main">$130.00</span>
                                            </div>
                                            <button type="submit">Procced Booking</button>

                                        </form>
                                    </div>
                                    <div class="sidebar-widget">
                                        <h6 class="block-heading">Book With Confidence</h6>
                                        <ul class="category-confidence">
                                            <li class="flex-three">
                                                <i class="icon-customer-service-1"></i>
                                                <span>Customer care available 24/7</span>
                                            </li>
                                            <li class="flex-three">
                                                <i class="icon-Vector-6"></i>
                                                <span>Hand-picked visas & Activities</span>
                                            </li>
                                            {{-- <li class="flex-three">
                                                <i class="icon-insurance-1"></i>
                                                <span>Free Travel Insureance</span>
                                            </li> --}}
                                            <li class="flex-three">
                                                <i class="icon-price-tag-1-1"></i>
                                                <span>No-hassle best price guarantee</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="sidebar-widget">
                                        <h4 class="block-heading">Recent News</h4>
                                        <div class="recent-post-list">
                                            <div class="list-recent flex-three">
                                                <a href="blog-details.html" class="recent-image">
                                                    <img src="./assets/images/blog/re-blog1.jpg"
                                                        alt="Image">
                                                </a>
                                                <div class="recent-info">
                                                    <div class="start">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                    </div>
                                                    <h4 class="title">
                                                        <a href="blog-details.html">Walking the Amalfi
                                                            Coast</a>
                                                    </h4>
                                                    <p>From <span class="text-main">$129.00</span></p>
                                                </div>
                                            </div>
                                            <div class="list-recent flex-three">
                                                <a href="blog-details.html" class="recent-image">
                                                    <img src="./assets/images/blog/re-blog2.jpg"
                                                        alt="Image">
                                                </a>
                                                <div class="recent-info">
                                                    <div class="start">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                    </div>
                                                    <h4 class="title">
                                                        <a href="blog-details.html">Walking the Amalfi
                                                            Coast</a>
                                                    </h4>
                                                    <p>From <span class="text-main">$129.00</span></p>
                                                </div>
                                            </div>
                                            <div class="list-recent flex-three">
                                                <a href="blog-details.html" class="recent-image">
                                                    <img src="./assets/images/blog/re-blog3.jpg"
                                                        alt="Image">
                                                </a>
                                                <div class="recent-info">
                                                    <div class="start">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                    </div>
                                                    <h4 class="title">
                                                        <a href="blog-details.html">Walking the Amalfi
                                                            Coast</a>
                                                    </h4>
                                                    <p>From <span class="text-main">$129.00</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@push('styles')
<style>

</style>
@endpush

@push('scripts')
<script>

</script>

@endpush
