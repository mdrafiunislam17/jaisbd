 <!-- Start Footer
    ============================================= -->
    <footer class="bg-dark text-light">
        <div class="container">
            <div class="f-items default-padding">
                <div class="row">
                    <div class="col-lg-4 col-md-6 item">
                        <div class="f-item about">
                            <img class="logo" src="{{ asset('uploads/' . $settings['SETTING_SITE_LOGO']) }}" alt="Logo">
                            <p>
                                Excellence decisively nay man yet impression for contrasted remarkably. There spoke happy for you are out. Fertile how old address did showing.
                            </p>
                            <ul class="social">
                                <li>
                                    <a href="{{ $settings["SETTING_SOCIAL_FACEBOOK"] }}"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $settings["SETTING_SOCIAL_TWITTER"] }}"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $settings["SETTING_SOCIAL_LINKEDIN"] }}"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $settings["SETTING_SOCIAL_YOUTUBE"] }}"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 item">
                        <div class="f-item link">
                            <h4 class="widget-title">Solutions</h4>
                            <ul>

                                 <li >
                                        <a href="{{route('aboutus')}}" class="fas fa-angle-righte" data-toggle="dropdown" >About Us</a>

                                </li>
                                  <li >
                                        <a href="{{route('oureTeam')}}" class="fas fa-angle-righte" data-toggle="dropdown" >Team</a>

                                </li>
                                  <li >
                                        <a href="{{route('contact')}}" class="fas fa-angle-righte" data-toggle="dropdown" >Contact Us</a>

                                </li>
                                <li >
                                        <a href="{{route('projectus')}}" class="fas fa-angle-righte" data-toggle="dropdown" >Projects</a>

                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 item">
                        <div class="f-item contact-widget">
                            <h4 class="widget-title">Contact Info</h4>
                            <div class="address">
                                <ul>
                                    <li>
                                      {!! $settings["CONTACT_ADDRESS"] !!}
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fal fa-envelope"></i>

                                        </div>
                                        <div class="content">
                                            <strong>Email:</strong>
                                            {!! $settings["CONTACT_EMAIL"] !!}
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fal fa-user-headset"></i>
                                        </div>
                                      <div class="content">
                                        <strong>Phone:</strong>
                                        <a href="tel:{!! $settings['CONTACT_PHONE'] !!}">
                                            {!! $settings['CONTACT_PHONE'] !!}
                                        </a>
                                    </div>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 item">
                        <div class="f-item newsletter">
                            <h4 class="widget-title">Subscribe to Newsletter</h4>
                            <p>
                                Join our subscribers list to get the latest news and special offers.
                            </p>
                          <form method="POST" action="{{ route('newsletter.subscribe') }}">
                            @csrf
                            <input type="email" name="email" placeholder="Your Email" class="form-control" required>
                            <button type="submit">Subscribe Now <i class="fa fa-paper-plane"></i></button>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-box">
                    <div class="row">
                        <div class="col-lg-6">
                            <p>&copy; Copyright  &copy; {{ now()->year }}.Developed by <a href="#">rafiun</a></p>
                        </div>
                        <div class="col-lg-6 text-right">
                            {{-- <ul>
                                <li>
                                    <a href="about-us.html">Terms</a>
                                </li>
                                <li>
                                    <a href="about-us.html">Privacy</a>
                                </li>
                                <li>
                                    <a href="about-us.html">Support</a>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer -->
