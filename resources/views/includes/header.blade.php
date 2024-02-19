<div class="main-header">
    <div class="logo">
        <img src="{{asset('assets/images/logo.png')}}" alt="">
    </div>

    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>



    <div style="margin: auto"></div>

    <div class="header-part-right">
        <!-- Full screen toggle -->
        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
        <!-- Grid menu Dropdown -->


        <!-- User avatar dropdown -->
        <div class="dropdown">
            <div class="user col align-self-end">
                <img src="assets/images/faces/3.jpg" id="userDropdown" alt="" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-header">
                        <i class="i-Lock-User mr-1"></i> {{config('app.name')}} Admin
                    </div>
                    <a class="dropdown-item" href="/admin/bookings">Bookings</a>
                    <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- header top menu end -->




<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
             <li class="nav-item ">
                <a class="nav-item-hold" href="/admin/">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li>

            {{-- <li class="nav-item " data-item="bookings">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Library"></i>
                    <span class="nav-text">Bookings</span>
                </a>
                <div class="triangle"></div>
            </li> --}}
             <li class="nav-item " data-item="tour">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Jeep"></i>
                    <span class="nav-text">Tour Package</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item " data-item="blogs">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Blogger"></i>
                    <span class="nav-text">Blogs</span>
                </a>
                <div class="triangle"></div>
            </li>


            <li class="nav-item " data-item="cms">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Windows-2"></i>
                    <span class="nav-text">CMS</span>
                </a>
                <div class="triangle"></div>
            </li>

            {{-- <li class="nav-item " data-item="cruise">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Windows-2"></i>
                    <span class="nav-text">Cruise</span>
                </a>
                <div class="triangle"></div>
            </li> --}}




        </ul>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <!-- Submenu Dashboards -->
   <ul class="childNav" data-parent="bookings">
            <li class="nav-item">
                <a class="" href="/admin/bookings">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">New Bookings</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="" href="/admin/bookings">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">Completed Bookings</span>
                </a>
            </li>

        </ul>
        <ul class="childNav" data-parent="blogs">
            <li class="nav-item">
                <a class="" href="/admin/blogs">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">Blogs List</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="" href="/admin/blogs-add">
                    <i class="nav-icon i-Add"></i>
                    <span class="item-name">Add Blog</span>
                </a>
            </li>


        </ul>
        <ul class="childNav" data-parent="cms">
            {{-- <li class="nav-item">
                <a class="" href="/admin/pages">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">Custom Pages</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="" href="/admin/pages">
                    <i class="nav-icon i-Add"></i>
                    <span class="item-name">Add Custom Page</span>
                </a>
            </li> --}}

            <li class="nav-item">
                <a class="" href="/admin/homepage-banner">
                    <i class="nav-icon i-Add"></i>
                    <span class="item-name">HomePage Banner</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="" href="/admin/promotional-banner">
                    <i class="nav-icon i-Add"></i>
                    <span class="item-name">Promotional Banner</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="" href="/admin/homepage-featured-destination">
                    <i class="nav-icon i-Add"></i>
                    <span class="item-name">HomePage Top Destinations</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="" href="/admin/best-international-destination">
                    <i class="nav-icon i-Add"></i>
                    <span class="item-name">Top Weekend Destinations</span>
                </a>
            </li>

            <!-- <li class="nav-item">
                <a class="" href="/admin/best-indian-destination">
                    <i class="nav-icon i-Add"></i>
                    <span class="item-name">Top India Tourism Experiences</span>
                </a>
            </li> -->
<!-- 
            <li class="nav-item">
                <a class="" href="/admin/best-shortbrake-destination">
                    <i class="nav-icon i-Add"></i>
                    <span class="item-name">Best Deals of The Season</span>
                </a>
            </li> -->

              <!-- <li class="nav-item">
                <a class="" href="/admin/our-client">
                    <i class="nav-icon i-Add"></i>
                    <span class="item-name">Our Client</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="" href="/admin/our-accreditations">
                    <i class="nav-icon i-Add"></i>
                    <span class="item-name">Our Accreditations</span>
                </a>
            </li> -->
<!-- 
            <li class="nav-item">
                <a class="" href="/admin/ads">
                    <i class="nav-icon i-Add"></i>
                    <span class="item-name">Ads</span>
                </a>
            </li> -->
 
        <li class="nav-item">
          <a class="" href="/admin/jobs">
              <i class="nav-icon i-Add"></i>
              <span class="item-name">Client Feedback</span>
          </a>
      </li>




        </ul>
        <ul class="childNav" data-parent="tour">


            <li class="nav-item">
                <a class="" href="/admin/destination">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">Destinations</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="" href="/admin/category">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">Tour Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="" href="/admin/subcategory">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">Tour Subcategory</span>
                </a>
            </li>
           
            <li class="nav-item">
                <a class="" href="/admin/tours">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">Tour Packages</span>
                </a>
            </li>
<li class="nav-item">
    <a class="" href="/admin/hotels">
        <i class="nav-icon i-Receipt-4"></i>
        <span class="item-name">Hotels</span>
    </a>
</li>
            <!-- <li class="nav-item">
                <a class="" href="/admin/cruise">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">cruise</span>
                </a>
            </li> -->



        </ul>



    </div>
    <div class="sidebar-overlay"></div>
</div>
