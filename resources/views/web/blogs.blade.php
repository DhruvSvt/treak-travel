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

        <section class="banner-sec" style="background-image:url('{{asset('assets/images/travel-blogger.jpg')}}')">
            <div class="container">
                <div class="banner-heading">
                    <span>Travel blogs</span>
                    <p>Exclusive collection of travel blogs</p>
                </div>
            </div>
            <div class="baseline">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb " itemscope="" itemtype="https://schema.org/BreadcrumbList">
                            <li style="color:white;" class="breadcrumb-item" itemprop="itemListElement" itemscope=""
                                itemtype="https://schema.org"><a itemprop="item"
                                    href="{{url('/')}}"><span itemprop="name">Home</span></a>
                                <meta itemprop="position" content="1">
                            </li>
                            
                            <li class="breadcrumb-item " itemscope="" itemprop="itemListElement"
                                itemtype="https://schema.org" aria-current="page"><span itemprop="name"><a>
                                       Travel blogs
                                    </a></span>
                                <meta itemprop="position" content="3">
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
    <!-- footer -->
      
      <section class="myblog">
        <div class="container">
            
                <div class="row">
                @foreach ( $blog as $res )
                     <div class="col-12 col-md-6 col-xl-3 mb-4">
                                <div class="card mr-3">
                                    <img src="{{ Storage::url($res->featured_image) }}" class="card-img-top" alt="{{$res->title}}">
                                    <div class="card-body">
                                      <h5 class="card-title">{{$res->title}}</h5><span>{{$res->created_at->format('F d, Y')}}</span>
                                      <p class="card-text">{{$res->short_description}}</p>
                                      <a href="{{url('blog/'.$res->page_url)}}" class="read_more">Read more</a>
                                    </div>
                                </div>
                            </div>   
            @endforeach

</div>
            </div>
      </section>
      
      
      
      
    @include('web.footer')
   @include('admin.utils.notification')
</body>

</html>