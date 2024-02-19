<!DOCTYPE html>
<html>

<head>

    <title>{{$blog->title}}</title>
    <meta name="description"
        content="{{$blog->short_description}}">
    <meta name="keywords"
        content="india tour, tours in india, india tourism portal, travel guide india, incredible india, india tourism">
    <meta property="og:title" content="{{$blog->title}}" />
    <meta property="og:description"
        content="{{$blog->short_description}}" />
    <meta property="og:url" content="index.html" />
    <meta property="og:image" content="{{ Storage::url($blog->featured_image) }}" />
    <meta property="og:image:secure_url" content="{{ Storage::url($blog->featured_image) }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description"
        content="{{$blog->short_description}}" />
    <meta name="twitter:title" content="{{$blog->title}}" />
    <meta name="twitter:image" content="{{ Storage::url($blog->featured_image) }}" />
    @include('web.head')
    <link rel="stylesheet" href="{{asset('assets/web/csss/packages.css')}}">
     
    <style>
        .myblog{
                padding: 56px 0;background: #f7f8fa;
        }
        .myblog .card{
     border: 0;
    background: transparent;
    padding: 0;
    border-radius: 0;
        }.myblog .card img{
                border: 0;
    border-radius: 0;
    height: 160px;
    object-fit: cover;}.myblog .card-body{
        padding:0;
    }.myblog .card-title{
        font-size: 16px;
    margin-top: 8px;
    }.read_more{
          font-size: 14px;
    margin: 0;
    border-bottom: 1px dashed;
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
                        <li class="breadcrumb-item"><a href="{{url('/blogs/')}}"><span
                                    itemprop="name">Blogs</span></a>
                            <meta itemprop="position" content="2">
                        </li>
                      
                    
                        <li style="color:black;" class="breadcrumb-item active"  aria-current="page"><span itemprop="name"><a>{{$blog->title}}</a></span>
                            <meta itemprop="position" content="3">
                        </li>

                    </ol>
                </nav>
            </div>
            </div>
            </div>
 
      </section>
    <!-- footer -->
  <section class="overview-content  py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 me-4">
                <div class="row">
                    <div id="overview" class="col-lg-12 overview_box mt-3">
                        
                        <div class="row mt-3 package_deal">
                              <div class="col-12  ">   
                                    <img src="{{ Storage::url($blog->featured_image) }}" class="card-img-top" alt="{{$blog->title}}">
                                <h3 class="overview-heading border-bottom pt-3">{{$blog->title}}</h3>
                                  
                                      <p class="mt-4">Date: <span>{{$blog->created_at->format('F d, Y')}}</span></p>
                                      <div>{!! $blog->description !!}</div>
                                      
                                    </div>
                                </div>
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
            
                        <textarea placeholder="Where you want to go e.g. North India, South India or special interests like Ayurveda, wildlife, Beach, Culture etc." name="detail" id="gquery" autocomplete="off"
                            spellcheck="false" required></textarea>
            
                    </div>
                    <div class="full">
                        <div class="half-50"><label for="travel dates">Travel Date<span>*</span></label>
                            <input type="date" name="tdate" placeholder="Travel Dates" id="gdates" class="gdates hasDatepicker"
                                autocomplete="off" required>
                        </div>
                        <div class="half-50"><label for="stay">Duration of the Stay<span>*</span></label>
                            <input type="text" name="stay" id="gstay" placeholder="Duration of the Stay" required>
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
      
      
      
      
    @include('web.footer')
   @include('admin.utils.notification')
</body>

</html>