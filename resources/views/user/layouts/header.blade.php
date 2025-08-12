 <div class="sidebar-dashboard">
                <div class="db-logo">
                    <a href="{{route('frontend.index')}}"><img src="{{ asset("uploads/" . $settings["SETTING_SITE_LOGO"]) }}" alt="Logo"><span>Vitour</span></a>
                </div>
                <div class="db-menu">
                    <ul>
                        <li class="{{ request()->routeIs('user') ? 'active' : '' }}">
                            <a href="{{route('user')}}">
                                <i class="icon-Vector-9"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('userBooking') ? 'active' : '' }}" >
                            <a href="{{route('userBooking')}}">
                                <i class="icon-Layer-2"></i>
                                <span>My Booking</span>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="my-listing.html">
                                <i class="icon-Group-81"></i>
                                <span>My Listing</span>
                            </a>
                        </li>
                        <li>
                            <a href="add-tour.html">
                                <i class="icon-Group-91"></i>
                                <span>Add Tour</span>
                            </a>
                        </li>
                        <li>
                            <a href="my-favorite.html">
                                <i class="icon-Vector-10"></i>
                                <span>My Favorites</span>
                            </a>
                        </li> --}}
                        <li class="{{ request()->routeIs('editUser') ? 'active' : '' }}">
                            <a href="{{route('editUser')}}">
                                <i class="icon-profile-user-1"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('login')}}">
                                <i class="icon-turn-off-1"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>


                </div>

            </div>
