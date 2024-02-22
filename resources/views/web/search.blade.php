<!DOCTYPE html>
<html>

<head>

    <title>{{$search}} | Treak Travel</title>
    <meta name="description" content="{{$search}}">
    <meta name="keywords" content="{{$search}},Treak Travel">
    <meta property="og:title" content="{{$search}}   | Treak Travel" />
    <meta property="og:description" content="{{$search}}" />
    <meta property="og:url" content="index.html" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="{{$search}}" />
    <meta name="twitter:title" content="{{$search}}   | Treak Travel" />

    @include('web.head')
    <link rel="stylesheet" href="{{asset('assets/web/csss/packages.css')}}">
</head>

<body>
    <!-- header -->
    @include('web.header')

    <section class="banner-sec" style="background: #cdcdcd;
    max-height: 263px;">
        <div class="container">
            <div class="banner-heading">
                <span>{{$search}} </span>

            </div>
        </div>
        <div class="baseline">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb " itemscope="" itemtype="https://schema.org/BreadcrumbList">
                        <li style="color:white;" class="breadcrumb-item" itemprop="itemListElement" itemscope=""
                            itemtype="https://schema.org"><a itemprop="item" href="{{url('/')}}"><span
                                    itemprop="name">Home</span></a>
                            <meta itemprop="position" content="1">
                        </li>

                        <li class="breadcrumb-item " itemscope="" itemprop="itemListElement"
                            itemtype="https://schema.org" aria-current="page"><span itemprop="name"><a>
                                    {{$search}}
                                </a></span>
                            <meta itemprop="position" content="3">
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- footer -->
    <section class="tour-packages-section font-1 p-tb" style="    padding-left: 0;
    padding-right: 0;" id="popular-rajasthan-packages">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">

                    <?php
                            if($tour->isEmpty()){
                         echo '<h2>No Tour Found</h2><span>No Tour Found for the selected destination Please Try Other Destinations</span>';
                            }?>

                    @foreach ($tour as $res)
                    <div class="destination_card">

                        <div class="destination_card-inner mb-3">
                            <div class="row">
                                <div class="col-12 col-md-4 destinationimg col-12"><img
                                        src="{{ Storage::url($res->tours_banner) }}" alt="" class="w-100"></div>
                                <div class=" col-md-5 col-8">
                                    <div class="package">
                                        <h2>{{$res->tours_name}}</h2>
                                        <p class="mn-1">{{$res->tours_description}}</p>
                                        <div class="row package_deal">
                                            <?php
                                            $res->select_inclusion = explode(',', $res->select_inclusion);
                                            ?>
                                            @foreach($res->select_inclusion as $sinc)
                                            <div class="col-6 col-lg-3 col-md-4 destination">
                                                <div class="rounded-circle destination-circle"><img
                                                        src="{{asset('assets/images/'.$sinc.'.png')}}"
                                                        alt="destination icon" class="w-100"></div>
                                                <p style="display: block;">{{$sinc}}</p>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="  col-md-3 col-4">
                                    <div class="destination_price" style="height: 100%;">
                                        <p>{{$res->tours_duration}}</p>
                                        <p>Deluxe</p>
                                        <div class="inner">
                                            <h3></h3><span>Starting From</span>{{$res->tours_price}}</h3>
                                            <div class="d-flex flex-wrap justify-content-around"><button type="button"
                                                    class="mybtn"><a
                                                        href="{{url('/tour/'.$res->destination_slug.'/'.$res->tours_url)}}"
                                                        style="text-decoration: none; color: white;">Explore
                                                        Now</a></button><button type="button" class="mybtn1"
                                                    data-bs-toggle="modal" data-bs-target="#form46">Enquire Now</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    @endforeach
                </div>
                <div class="col-lg-3">

                    <div class="quote-form sticky">

                        <h2>Request a <span>Quote</span></h2>

                        <form action="#" method="post" id="tmiform">

                            <div class="full">

                                <div class="half-50">

                                    <label for="fname">Full Name<span>*</span></label>

                                    <input type="text" name="gname" id="gname" placeholder="Your name..">
                                </div>

                                <div class="half-50">

                                    <label for="fname">Country<span>*</span></label>

                                    <select id="gcountry" class="query-select-frm qForm" name="gcountry">
                                        <option value="">Select Country</option>
                                    </select>

                                </div>
                            </div>

                            <div class="full"><label for="lname">Email ID<span>*</span></label>

                                <input type="text" name="gemail" placeholder="Email" id="gemail">
                            </div>

                            <div class="full">

                                <label for="tour description">Tour Descriptions<span>*</span></label>

                                <textarea placeholder="Enter Your Tour Description" name="gquery" id="gquery"
                                    autocomplete="off" spellcheck="false"></textarea>

                            </div>
                            <div class="full">
                                <div class="half-50"><label for="travel dates">Travel Dates<span>*</span></label>
                                    <input type="text" name="gdates" placeholder="Travel Dates" id="gdates"
                                        class="gdates hasDatepicker" autocomplete="off" onfocus="this.blur()">
                                </div>
                                <div class="half-50"><label for="stay">Duration of the Stay<span>*</span></label>
                                    <input type="text" name="gstay" id="gstay" placeholder="Duration of the Stay">
                                </div>
                            </div>
                            <div class="full">
                                <div class="half-50"><label for="no of person">No of Person<span>*</span></label>
                                    <input type="text" name="gperson" placeholder="No of Person" id="gperson">
                                </div>
                                <div class="half-50">
                                    <label for="lname">Contact No<span>*</span></label>
                                    <input type="text" name="gno" id="gno" placeholder="Contact No">
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
    <section class="international-pack p-tb mt-5">
        <div class="container1">
            <div class="main-heading mb-3">
                <h2>Top Weekend Destinations</h2>

            </div>
            <div class="row international-col">
                @foreach ( $weekend_d as $res )


                <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                    <div class="abroad-package common-hover">
                        <a href="{{url('/packages/'.$res->destinations->destination_slug)}}"><img
                                src="{{ Storage::url($res->international_destination_image) }}" alt="bhutan image"></a>
                        <h4><a
                                href="{{url('/packages/'.$res->destinations->destination_slug)}}">{{$res->international_destination_name}}</a>
                        </h4>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </section>
    @include('web.footer')

</body>

</html>