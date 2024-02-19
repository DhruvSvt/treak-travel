<!-- footer -->
<footer>
    <div class="container1 footer-con">
        <div class="footer-content">
            <div class="footer-head">
                <div class="foot-head-left">
                    <div class="footer-logo">
                        <a href="#"><img src="{{asset('assets/images/logo.png')}}" alt="logo"></a>
                    </div>
                    <span>It's time for new Experiences</span>
                </div>
                <div class="foot-head-right">
                    <small>Find The Perfect Escape</small>
                    <a href="{{url('/plan-your-trip')}}" class="open-popup myBtn" data-id="popup_default">Plan Your Trip</a>
                </div>
            </div>
            <div class="footer-sec">
                <div class="row">
                    @php($cats = App\Models\TourCategory::select('*')->where('showinheader',1)->get())
                    @if(count($cats)> 0)
                    @foreach($cats as $cat)
                <div class="col-md-3 col-sm-6 col-6 mt-3 ">
                    <h6>{{$cat->tour_category_name}}</h6>
                    <ul class="quicks-packages">
                        
                    
                                                        @php($scats =
                                                        App\Models\TourSubcategory::select('*')->where('tour_categories_id',$cat->id)->get())
                                                        @if(count($scats)> 0)
                                                        @foreach($scats as $scats)
                                                        <li><a
                                                                href="{{url('/category/'.$scats->slug)}}">{{$scats->tour_subcategory_name}}</a>
                                                        </li>
                                                        @endforeach
                                                        @endif
                                                   
                                            </ul>
                                      
                                    </div>
                                
                    @endforeach
                    @endif
                
                </div>

            </div>
        </div>
        <div class="partners-sec">
            <ul class="partners">
                <li><img src="{{asset('assets/web/imagess/incridble.webp')}}" alt="partners image"></li>
                <li><img src="{{asset('assets/web/imagess/tigers.webp')}}" alt="partners image"></li>
                <li> <img src="{{asset('assets/web/imagess/triangle.webp')}}" alt="partners image"></li>
                <li><img src="{{asset('assets/web/imagess/iata.webp')}}" alt="partners image"></li>
            </ul>
        </div>
        <div class="footer-info-content">
            <ul class="footer-info">
                <li><i class="fa fa-map-marker" aria-hidden="true"></i>C -Sanjay Place - 201301</li>
                <li><i class="fa fa-phone" aria-hidden="true"></i>+91-856-84459162 - 99 (85 hunting lines are
                    available)</li>
                <li><i class="fa fa-fax" aria-hidden="true"></i>+91-120-84459162</li>
                <li><i class="fa fa-mobile" aria-hidden="true"></i>+91-84459162/24</li>
                <li><i class="fa fa-envelope-o" aria-hidden="true"></i>info@anureetholiday.com </li>
                <li><i class="fa fa-whatsapp" aria-hidden="true"></i>+91-9212777225 (Only for Whatsapp)</li>
                <li><i class="fa fa-skype" aria-hidden="true"></i>anureetholiday</li>
            </ul>
            <div class="social-icons">
                <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"
                        aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"
                        aria-hidden="true"></i></a>
                <a href="https://www.linkedin.com/"
                    target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com" target="_blank"><i class="fa fa-youtube-play"
                        aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="footer-end">
            <p>CopyRight©2023, Anureet Holiday</p>
        </div>
    </div>
</footer>
<!-- modal -->


<!-- popup -->
<script type="text/javascript" src="{{asset('assets/web/formjs/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/web/formjs/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/web/formjs/jqueryvalidation.js')}}"></script>
<script src="{{asset('assets/web/formjs/jquery-1.12.4.js')}}"></script>
<script src="{{asset('assets/web/formjs/jquery-ui.js')}}"></script>
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Slick Slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<!-- fancybox popup-->
<script src="{{asset('assets/web/jsnew/my.js')}}"></script>


<!-- Custom JS -->
<script src="{{asset('assets/web/jss/main.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".u-vmenu").vmenuModule({
            Speed: 555,
            autostart: false,
            autohide: true
        });
        $('#onclic').click(function () {
            $('#u-vmenu').slideToggle("slow");
        });
    });
    //for footer mobile display block on click start 
    $('.footer-box').click(function () {
        $(this).find('.drop').toggleClass('active');
    });
    //for footer start
    $(".footer-box h3").click(function () {
        $(this).toggleClass("highlight");
    });

    $('.tmimenu_btn').click(function () {
        $(this).toggleClass("tmimenu_btn_close");
    });
</script>