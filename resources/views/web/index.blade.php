<!DOCTYPE html>
<html>
<head>
   
    <title>Tourism & Tour Packages Travel | Anureet Holidays</title>
    <meta name="description"
        content="The best travel guides on India travel & tourism to explore the best of Incredible India tours along with affordable India tour packages. Get the best deals with Anureet Holidays.">
    <meta name="keywords"
        content="india tour, tours in india, india tourism portal, travel guide india, incredible india, india tourism">
    <meta property="og:title" content="Anureet Holidays: Your Gateway to Incredible India | India Tourism" />
    <meta property="og:description"
        content="The best travel guides on India travel & tourism to explore the best of Incredible India tours along with affordable India tour packages. Get the best deals with Anureet Holidays." />
    <meta property="og:url" content="index.html" />
    <meta property="og:image" content="{{asset('assets/images/logo.jpg')}}" />
    <meta property="og:image:secure_url" content="{{asset('assets/images/logo.jpg')}}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description"
        content="The best travel guides on India travel & tourism to explore the best of Incredible India tours along with affordable India tour packages. Get the best deals with Anureet Holidays." />
    <meta name="twitter:title" content="Anureet Holidays: Your Gateway to Incredible India | India Tourism" />
    <meta name="twitter:image" content="{{asset('assets/images/logo.jpg')}}" />
    @include('web.head')
</head>

<body>
    <!-- header -->
@include('web.header')
 
    <!-- query popup html start-->
   
    <!-- query popup html end-->
    <!-- query popup html end-->
    <section class="banner d-flex">
        <div class="banner-sec">
            <div class="banner-left">
                @foreach ( $topBanner as $res )
                <div>
                    <div class="main-img">
                        <figure>
                            <a href="{{$res->page_url}}" target="_blank"><img src="{{ Storage::url( $res->banner_image) }}"
                                    alt="Anureet Holidays"></a>
                        </figure>
                        
                    </div>
                </div>
                @endforeach
            </div>
        </div>
         
    </section><!-- banner -->
<div >
<form method="POST" action="{{ url('/search') }}" class="search-container" style="    float: unset;">
    @csrf
     <div class="search-inner"><img src="{{asset('assets/images/search.svg')}}" alt="Search"><input type="text"
            placeholder="Search holidays by destination &amp; theme" name="search" autocomplete="off"></div>
    <div class="search-btn"><button type="submit " class="btn btn-primary">Search</button></div>
    </form>
</div>
    <!-- trending destinations -->
    <section class="trending p-tb">
        <div class="container1">
            <div class="main-heading mb-3">
                <h2>Explore Top Destinations</h2>
            </div>
             
             
                    <div class="row">
@foreach ( $first_fd as $res )
                        <div class="col-lg-5 col-md-12 col-sm-12">
                            <div class="trend-sec-left">
                                <a href="{{url('/packages/'.$res->destinations->destination_slug)}}" target="_blank"><img
                                        src="{{ Storage::url( $res->featured_destination_image) }}" alt="{{$res->featured_destination_name}}"><div class="overlay"></div></a>
                                <div class="trend-left">
                                    <h4><a href="{{url('/packages/'.$res->destinations->destination_slug)}}"
                                            target="_blank">{{$res->featured_destination_name}}</a>
                                    </h4>
                                    <span>Starting at:{{$res->destinations->destination_starting_price}}</span>
                                   </div>
                                  </div>
                                </div>
@endforeach
<div class="col-lg-7 col-md-12 col-sm-12">
    <div class="row flex-wrap">
@foreach ( $next_fd as $res )
<div class="col-lg-4 col-md-4 col-sm-6 col-6 trend-visit">
    <div class="trend-sec-right">
<a href="{{url('/packages/'.$res->destinations->destination_slug)}}" target="_blank"><img
        src="{{ Storage::url( $res->featured_destination_image) }}" alt="{{$res->featured_destination_name}}">
    <div class="overlay"></div></a>
<div class="trend-right">
    <h4><a href="{{url('/packages/'.$res->destinations->destination_slug)}}"
            target="_blank">{{$res->featured_destination_name}}</a>
    </h4>
    <span>Starting at:{{$res->destinations->destination_starting_price}}</span>
</div>
</div>
</div>
@endforeach
                </div>
                </div>
                   
                      
                    </div>
               
        </div>
    </section>

    <!-- holiday packages -->
    <section class="holiday-package holiday-arrows">
        <div class="container1">
            <div class="main-heading mb-3">
                <h2>Top Trending Destinations</h2>
                
            </div>
            <div class="holiday-pack">
                @foreach ( $trending_d as $res )
                <div>
                    <div class="pack-sec">
                        <a href="{{url('/packages/'.$res->destination_slug)}}"><img
                                src="{{ Storage::url($res->destination_card_image) }}" alt="{{$res->destination_name}}"></a>
                        <div class="pack-content common-hover">
                            <span>Starting @ {{$res->destination_starting_price}}</span>
                            <h3><a
                                    href="{{url('/packages/'.$res->destination_slug)}}">{{$res->destination_name}}</a>
                            </h3>
                        </div>
                    </div>
                </div>
                @endforeach
          
        
            </div>
        </div>
    </section>
<section class="banner d-flex mt-5 p-0">
    <div class="banner-sec">
        <div class="banner-left">
            @foreach ( $promoBanner as $res )
            <div>
                <div class="main-img">
                    <figure>
                        <a href="{{$res->page_url}}" target="_blank"><img src="{{ Storage::url( $res->banner_image) }}"
                                alt="Anureet Holidays"></a>
                    </figure>

                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>
    <!-- package interest -->
    
    <!-- luxury -->
  
    <!-- holidays by interest -->
    <section class="intresting-holidays holiday-arrows p-tb">
        <div class="container1">
            <div class="main-heading mb-3">
                <h2>Holidays by Interest</h2>
              
            </div>
            <div class="best-holidays">
        @foreach ( $interest_d as $res )
                <div>
                    <div class="best-holiday-sec">
                        <a href="{{url('/'.$res->slug.'/'.$res->id)}}"><img height="200" 
                                src="{{ Storage::url($res->destination_card_image) }}" alt="{{$res->destionation_type_name}} Tour Packages"></a>
                        <div class="bh-content common-hover">
                            <h4><a href="{{url('/'.$res->slug.'/'.$res->id)}}">{{$res->destionation_type_name}} <br>Tours Packages</a>
                            </h4>
                        </div>
                    </div>
                </div>
                @endforeach
              
              

            </div>
        </div>
    </section>

    <!-- weekend destination -->
   

    <!-- international package -->
    <section class="international-pack p-tb mt-5">
        <div class="container1">
            <div class="main-heading mb-3">
                <h2>Top Weekend Destinations</h2>
           
            </div>
            <div class="row international-col">
                @foreach ( $weekend_d as $res )
               
               
                <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                    <div class="abroad-package common-hover">
                        <a href="{{url('/packages/'.$res->destinations->destination_slug)}}"><img src="{{ Storage::url($res->international_destination_image) }}"
                                alt="bhutan image"></a>
                        <h4><a href="{{url('/packages/'.$res->destinations->destination_slug)}}">{{$res->international_destination_name}}</a></h4>
                    </div>
                </div>
                @endforeach
               
              
              
            </div>
        </div>
    </section>

    <!-- top rated experience -->
    

    <!-- Happy travelers -->
    <section class="happy-customers p-tb">
        <div class="container1">
            <div class="main-heading mb-3">
                <h2>Guest Satisfaction is Our Goal;<br> Valuable Feedback Matters to Us</h2>
            </div>
        <div class="feedback-client info-india">
            @foreach ( $feedback as $res )
            <div><div class="inform m-3">
                <div class="info-sec">
                   <h4>{{$res->sub_title}}</h4>
                    <p>{{$res->description}}</p>
            <p><b>By:</b> {{$res->title}}</p>
                </div>
            </div></div>
@endforeach
            
          
       
        </div>
        </div>
    </section>

    <!-- why choose us -->
  


    <div class="blog p-tb">
        <div class="container">
            <div class="main-heading mb-3">
            <h2>Exclusive collection of travel blogs</h2>
            </div>
            <div class="blog-area">
                @foreach ( $blog as $res )
                <div class="blog-box">
                    <a href="{{url('blog/'.$res->page_url)}}">
                        <figure><img src="{{ Storage::url($res->featured_image) }}">
                        </figure> <span>{{$res->created_at->format('F d, Y')}}</span>
                        <h3>{{$res->title}}</h3>
                        <p style="color:#38404F">{{$res->short_description}}</p>
                    </a>
                </div>

            @endforeach


            </div>
        </div>
    </div>

    
    <!-- information -->
    
    <!-- india at a glance -->
   
    <!-- Search -->
   
    <!-- more info -->
    <section class="more-info p-tb">
        <div class="container1">
            <div class="more-info-sec page-btn">
                <h3>India Overview</h3>
                <p>
Traveling in India can be a transformative experience due to its rich cultural tapestry, diverse landscapes, and historical significance. Here's an overview of what to expect when traveling in India:

</p><p><b>Cultural Diversity:</b> India is a melting pot of cultures, languages, religions, and traditions. Each region of the country has its own distinct identity, offering travelers a unique and immersive experience.

</p><p><b>Historical Landmarks:</b> India is home to numerous historical landmarks, including ancient temples, palaces, forts, and monuments. The Taj Mahal in Agra, the forts of Rajasthan, the temples of Varanasi, and the cave temples of Ajanta and Ellora are just a few examples of India's rich architectural heritage.

</p><p><b>Spirituality and Religion:</b> India is the birthplace of several major religions, including Hinduism, Buddhism, Jainism, and Sikhism. Travelers can visit sacred sites, participate in religious rituals and festivals, and explore the spiritual aspects of Indian culture.

</p><p><b>Natural Beauty:</b> From the snow-capped peaks of the Himalayas to the sun-kissed beaches of Goa and Kerala, India offers a diverse range of natural landscapes. Travelers can explore national parks, wildlife sanctuaries, hill stations, and backwaters, experiencing the country's biodiversity and natural beauty.

</p><p><b>Cuisine:</b> Indian cuisine is renowned for its variety, flavor, and complexity. Each region of India has its own unique culinary traditions, influenced by local ingredients and cultural practices. Travelers can indulge in a wide array of dishes, from spicy curries and street food to vegetarian thalis and traditional sweets.

</p><p><b>Transportation:</b> India has a well-developed transportation network, including trains, buses, taxis, and domestic flights. While traveling within cities, options like auto-rickshaws and cycle rickshaws are common. Trains are a popular and affordable mode of long-distance travel, offering a chance to interact with locals and take in the scenic countryside.

</p><p><b>Challenges:</b> Traveling in India can also present certain challenges, such as crowded streets, traffic congestion, pollution, and cultural differences. It's important for travelers to exercise caution, respect local customs, and be mindful of safety and hygiene practices.

</p><p><b>Hospitality:</b> Indian hospitality is renowned for its warmth and generosity. Travelers can expect to encounter friendly locals who are often eager to share their culture, traditions, and stories.

</p><p> Overall, traveling in India offers a rich and rewarding experience, allowing visitors to immerse themselves in a tapestry of history, spirituality, cuisine, and natural beauty unlike anywhere else in the world. With proper planning and an open mind, exploring India can be an unforgettable journey of discovery.</p>
                 
            </div>
        </div>
    </section>
 
    <!-- footer -->

@include('web.footer')
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