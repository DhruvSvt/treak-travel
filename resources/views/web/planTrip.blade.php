<!DOCTYPE html>
<html>

<head>

    <title>Customized Holiday Tour Packages, Personalized Vacation | Treak Travel</title>
    <meta name="description"
        content="Book customized tour packages at Treak Travel for an unforgettable travel experience. Best offers on customized international holiday packages to match your budget and travel needs. Call for personalized vacation today.">
    <meta name="keywords"
        content="india tour, tours in india, india tourism portal, travel guide india, incredible india, india tourism">
    <meta property="og:title" content="Customized Holiday Tour Packages, Personalized Vacation | Treak Travel" />
    <meta property="og:description"
        content="Book customized tour packages at Treak Travel for an unforgettable travel experience. Best offers on customized international holiday packages to match your budget and travel needs. Call for personalized vacation today." />
    <meta property="og:url" content="index.html" />
    <meta property="og:image" content="{{asset('assets/images/logo.jpg')}}" />
    <meta property="og:image:secure_url" content="{{asset('assets/images/logo.jpg')}}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description"
        content="Book customized tour packages at Treak Travel for an unforgettable travel experience. Best offers on customized international holiday packages to match your budget and travel needs. Call for personalized vacation today." />
    <meta name="twitter:title" content="Customized Holiday Tour Packages, Personalized Vacation | Treak Travel" />
    <meta name="twitter:image" content="{{asset('assets/images/logo.jpg')}}" />
    @include('web.head')
    <link rel="stylesheet" href="{{asset('assets/web/csss/packages.css')}}">
</head>

<body>
    <!-- header -->
    @include('web.header')
    <section class="banner-sec" style="background-image:url('{{asset('assets/images/luxury.avif')}}')">
        <div class="container">
            <div class="banner-heading">
                <span>Get Personalized Itineraries</span>
                <p>Tailor-made Itinerary for you! Tell us what you want and we will design it for you or explore our
                    special packages.</p>
            </div>
        </div>
        <div class="baseline">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb " itemscope="" itemtype="https://schema.org/BreadcrumbList">
                        <li style="color:white;" class="breadcrumb-item" itemprop="itemListElement" itemscope=""
                            itemtype="https://schema.org"><a itemprop="item"
                                href="https://tour.mdayurvediccollege.in"><span itemprop="name">Home</span></a>
                            <meta itemprop="position" content="1">
                        </li>

                        <li class="breadcrumb-item " itemscope="" itemprop="itemListElement"
                            itemtype="https://schema.org" aria-current="page"><span itemprop="name"><a>
                                    Personalized Itineraries
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
                <div class="col-lg-7">
                    <div class="quote-form " style="     border: 3px solid #ff0505;
    border-radius: 0;">

                        <h2>Request a <span>Custom Itinerary</span></h2>


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
                <div class="col-lg-5">

                    <div class="contact-info ">
                        <div class="main-heading mb-3">
                            <h2>Best in Entire Indian Subcontinent!</h2>
                        </div>
                        <p class="text-justify">To ensure we create the best-in-class experience for you, please provide
                            us with some key details. This will allow us to design a personalized itinerary that
                            maximizes your time and captures the essence of your destination. Providing any specific
                            interests, activities, or landmarks you'd like to include.
                            <br><br>
                            Our team of travel experts will curate a tailor-made itinerary, encompassing top
                            attractions, hidden gems, dining recommendations, and local insights. Your journey begins
                            here, and we can't wait to craft a remarkable adventure just for you!
                            <br><br>
                            You can also call us at your preferred time.
                            <br>
                            Just click on the link below:
                            <br>
                        </p>
                        <center><a style="    background: #ff0505;
    border-color: #ff0505;" class="btn btn-primary" href="tel:+919876543210">Call Now</a></center>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('web.footer')
    @include('admin.utils.notification')
</body>

</html>
