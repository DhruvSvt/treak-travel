<!DOCTYPE html>
<html>

<head>

    <title>{{$tour->tours_name}} | Tour Packages</title>
    <meta name="description" content="{{$tour->tours_description}}">
    <meta name="keywords" content="{{$tour->tours_name}},Treak Travel, Tour Packages">
    <meta property="og:title" content="{{$tour->tours_name}} Tour Packages |  Tour Packages" />
    <meta property="og:description" content="{{$tour->tours_description}}" />
    <meta property="og:url" content="index.html" />
    <meta property="og:image" content="{{ Storage::url($tour->tours_banner) }}" />
    <meta property="og:image:secure_url" content="{{ Storage::url($tour->tours_banner) }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="{{$tour->tours_description}}" />
    <meta name="twitter:title" content="{{$tour->tours_name}} Tour Packages |  Tour Packages" />
    <meta name="twitter:image" content="{{ Storage::url($tour->tours_banner) }}" />
    @include('web.head')
    <link rel="stylesheet" href="{{asset('assets/web/csss/tour.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />

    <!--fancybox popup-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
    <style>
        @media only screen and (max-width: 576px) {
            .golden-banner {
                padding: 0;
                width: 100% !important;
            }
        }
    </style>
</head>

<body>
    <!-- header -->
    @include('web.header')

    <section class="golden-tour">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                            <li class="breadcrumb-item" i><a href=""><span itemprop="name">Home</span></a>
                                <meta itemprop="position" content="1">
                            </li>

                            @php
                            if ($destination!=null) {
                            @endphp
                            <li class="breadcrumb-item"><a
                                    href="{{url('/packages/'.$destination->destination_slug)}}"><span
                                        itemprop="name">{{$destination->destination_name}}</span></a>
                                <meta itemprop="position" content="2">
                            </li>
                            @php
                            }else{ @endphp
                            <li class="breadcrumb-item"><a href="{{url('/category/'.$subcategory->slug)}}"><span
                                        itemprop="name">{{$subcategory->tour_subcategory_name}}</span></a>
                                <meta itemprop="position" content="2">
                            </li>
                            @php } @endphp



                            <li style="color:black;" class="breadcrumb-item active" aria-current="page"><span
                                    itemprop="name"><a>{{$tour->tours_name}}</a></span>
                                <meta itemprop="position" content="3">
                            </li>

                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12 destinations">
                    <div class="row">
                        <div class="col-lg-12 text-content">
                            <div class="main-heading d-flex align-items-center">
                                <h1>{{$tour->tours_name}}</h1>

                            </div>
                            <p>{{$tour->tours_duration}}</p>
                            </p>
                            <ul class="d-flex route-line">

                                @foreach ($destinations as $res)
                                <li> {{$res->destination_name}}
                                    @if( !$loop->last)
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </section>
    <!--golden tour -->

    <!--golden tour banner-->
    <section class="golden-tour-banner">
        <div class="col-lg-12 mt-3 pictures-slider">
            <div class="row align-items-start golden-page-row d-flex">
                <div class=" golden-banner">
                    <div class="picture-slide owl-carousel">
                        <div class="item">
                            <img src="{{ Storage::url($tour->tours_banner) }}" alt="">
                        </div>
                        @php
                        $gal = explode(',', $tour->tours_gallery);

                        @endphp
                        @foreach($gal as $gallery)
                        <div class="item">
                            <img src="{{ Storage::url($gallery) }}" alt="">
                        </div>
                        @endforeach


                    </div>
                </div>
                <div class="pic-gallery d-none d-sm-inline">
                    <div class="row picture-gallery popup-gallery justify-content-between">
                        @foreach($gal as $gallery)

                        <a href="{{ Storage::url($gallery) }}">
                            <img src="{{ Storage::url($gallery) }}">
                        </a>
                        @if($loop->index == 3)
                        @php break; @endphp
                        @endif
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bottom-links mt-2 ">
        <div class="container">
            <ul class="nav nav-pills nav-fill p-0 ">
                <li><a href="#overview">Overview</a></li>
                <li><a href="#itinerary">Itinerary</a></li>
                <li><a href="#inclusions">Inclusions & Exclusions</a></li>
                <li><a href="#hotels">Hotels</a></li>
                <li><a href="#disclaimer">Disclaimer</a></li>
            </ul>
        </div>
    </section>

    <!-- Overview -->
    <section class="overview-content mt-5 mb-5  py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 me-4">
                    <div class="row">
                        <div id="overview" class="col-lg-12 overview_box mt-3">
                            <h3 class="overview-heading border-bottom pt-0">Overview</h3>
                            <div class="row mt-3 package_deal">
                                <?php
                             $tour->select_inclusion = explode(',', $tour->select_inclusion);
                                                                    ?>
                                @foreach($tour->select_inclusion as $sinc)
                                <div class="col-6 col-lg-3 col-md-4 destination">
                                    <div class="rounded-circle destination-circle"><img
                                            src="{{asset('assets/images/'.$sinc.'.png')}}" alt="destination icon"
                                            class="w-100"></div>
                                    <p style="display: block;">{{$sinc}}</p>
                                </div>
                                @endforeach
                            </div>
                            <div class="mt-3">{!! $tour->tours_overview !!}</div>
                        </div>
                        <div id="itinerary" class="col-lg-12 itinerary overview_box mt-3 mb-3">
                            <h3>Itinerary</h3>
                            <div class="accordion" id="accordionExample">
                                @foreach($tourItineiry as $res)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{$loop->index}}">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{$loop->index}}"
                                            aria-expanded="false"
                                            aria-controls="collapse{{$loop->index}}">{{$res->tours_itineries_title }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{$loop->index}}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{$loop->index}}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">

                                            <div>{!! $res->tours_itineries_desc !!}</div>
                                        </div><!-- accordion body -->
                                    </div>
                                </div>
                                @endforeach


                            </div>
                        </div>
                        <div id="inclusions" class="col-lg-12 mb-4 inclusions_and_exclusions overview_box">
                            <h3>Inclusions & Exclusions</h3>
                            <div class="row">
                                <div class="col-lg-12 bottom-links mt-2 ">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-home" type="button" role="tab"
                                                aria-controls="pills-home" aria-selected="true">Inclusions</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link " id="pills-profile-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-profile" type="button" role="tab"
                                                aria-controls="pills-profile" aria-selected="false">Exclusions</button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-12">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                            aria-labelledby="pills-home-tab">
                                            <div class="row">
                                                <div class="col-lg-12 inclusion ">
                                                    {!! $tour->tours_inclusion !!}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show" id="pills-profile" role="tabpanel"
                                            aria-labelledby="pills-profile-tab">
                                            <div class="row">
                                                <div class="col-lg-12 exclusion ">
                                                    {!! $tour->tours_exclusion !!}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="hotels" class="col-lg-12 mb-4 inclusions_and_exclusions overview_box">
                            <h3>Hotels</h3>
                            <div class="row">

                                @foreach($tourhotels as $res)
                                <div class="col-lg-4 mt-2 ">
                                    <div class="card">
                                        <img src="{{ Storage::url($res->hotel_banner) }}" class="card-img-top"
                                            alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title" style="    font-size: 15px;">{{$res->hotel_name }}
                                            </h5>
                                            <p class="p-0 m-0" style="    font-size: 13px;">{{$res->hotel_location }}
                                            </p>
                                            <span style="    color: #ff5c0f;">

                                                @for ($i = 0; $i < $res->hotel_rate; $i++)
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    @endfor

                                            </span>


                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="disclaimer" class="policies overview_box">
                            <h3>Information</h3>
                            <div>{!! $tour->tours_disclaimer !!}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-3">
                    <!-- form section -->
                    <div class="quote-form sticky">

                        <h2>Quick<span> Enquiry</span></h2>

                        <form method="POST" action="{{ url('/form-submit') }}">
                            @csrf
                            <div class="full">

                                <div class="half-50">

                                    <label for="fname">Full Name<span>*</span></label>

                                    <input type="text" name="name" placeholder="Your name.." required>
                                </div>

                                <div class="half-50">

                                    <label for="fname">Country<span>*</span></label>
                                    <input type="text" name="country" placeholder="Your Country.." required>

                                </div>
                            </div>

                            <div class="full"><label for="lname">Email ID<span>*</span></label>

                                <input type="email" name="email" placeholder="Email" id="gemail" required>
                            </div>

                            <div class="full">

                                <label for="tour description">Details<span>*</span></label>

                                <textarea
                                    placeholder="Where you want to go e.g. North India, South India or special interests like Ayurveda, wildlife, Beach, Culture etc."
                                    name="detail" id="gquery" autocomplete="off" spellcheck="false" required></textarea>

                            </div>
                            <div class="full">
                                <div class="half-50"><label for="travel dates">Travel Date<span>*</span></label>
                                    <input type="date" name="tdate" placeholder="Travel Dates" id="gdates"
                                        class="gdates hasDatepicker" autocomplete="off" required>
                                </div>
                                <div class="half-50"><label for="stay">Duration of the Stay<span>*</span></label>
                                    <input type="text" name="stay" id="gstay" placeholder="Duration of the Stay"
                                        required>
                                </div>
                            </div>
                            <div class="full">
                                <div class="half-50"><label for="no of person">No of Person<span>*</span></label>
                                    <input type="text" name="person" placeholder="No of Person" id="gperson" required>
                                </div>
                                <div class="half-50">
                                    <label for="lname">Contact No<span>*</span></label>
                                    <input type="tel" name="phone" id="gno" placeholder="Contact No" required>
                                </div>
                            </div>
                            <div class="full">
                                <div class="submit"><input type="submit" value="Submit" name="submit"></div>
                            </div>

                        </form>

                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- End Overview -->

    <!-- review section -->
    <!-- review section -->
    <section class="happy-customers p-tb">
        <div class="container1">
            <div class="main-heading mb-3">
                <h2>Happy Customers</h2>
            </div>
            <div class="feedback-client info-india">
                @foreach ( $feedback as $res )
                <div>
                    <div class="inform m-3">
                        <div class="info-sec">
                            <h4>{{$res->sub_title}}</h4>
                            <p>{{$res->description}}</p>
                            <p><b>By:</b> {{$res->title}}</p>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </section>

    @include('web.footer')
    @include('admin.utils.notification')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <!-- owl crousel-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{asset('assets/web/jss/main-script.js')}}"></script>
    <script>
        $('.feedback-client').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        focusOnSelect: false,
        arrows: false,
        centreMode: true,
        prevArrow:
            '<span class="prev-arrow "><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>',
        nextArrow:
            '<span class="next-arrow "><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>',
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    </script>
</body>

</html>
