<footer class="main-footer">
    <div class="footer-top bg-color-2">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget about-widget">
                        <div class="widget-title">
                            <h3>About</h3>
                        </div>
                        <div class="text">
                            <p>Lorem ipsum dolor amet consetetur adi pisicing elit sed eiusm tempor in cididunt
                                ut labore dolore magna aliqua enim ad minim venitam</p>
                            <p>Quis nostrud exercita laboris nisi ut aliquip commodo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget ml-70">
                        <div class="widget-title">
                            <h3>Services</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list class">
                                <li><a href="index.html">About Us</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="{{ Route('frontend.all.project') }}">Project</a></li>
                                <li><a href="{{ route('all.team') }}">Team</a></li>
                                <li><a href="#">Our Blog</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget post-widget">
                        <div class="widget-title">
                            <h3>Top News</h3>
                        </div>
                        @php
                            $blog = App\Models\Blog::latest()->limit(2)->get();
                        @endphp
                        <div class="post-inner">

                            @foreach ($blog as $item)
                            <div class="post">
                                <figure class="post-thumb"><a href="{{url('blog/details/'.$item->id.'/'.$item->blog_slug)}}"><img
                                            src="{{ asset($item->image) }}"
                                            alt=""></a></figure>
                                <h5><a href="{{url('blog/details/'.$item->id.'/'.$item->blog_slug)}}">{{$item->blog_name}}</a></h5>
                                <p>{{$item->created_at->format('d M Y')}}</p>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                @php
                    $site = App\Models\SiteSetting::find(1);
                @endphp
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget">
                        <div class="widget-title">
                            <h3>Contacts</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="info-list clearfix">
                                <li><i class="fas fa-map-marker-alt"></i>{{ $site->address }}</li>
                                <li><i class="fas fa-microphone"></i><a href="#">{{ $site->phone }}</a></li>
                                <li><i class="fas fa-envelope"></i><a href="#">{{ $site->email }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="inner-box clearfix">
                <figure class="footer-logo"><a href="index.html"><img
                            src="{{ asset('frontend/assets/') }}images/footer-logo.png" alt=""></a></figure>
                <div class="copyright pull-left">
                    <p><a href="index.html">Realshed</a> &copy; {{ date('Y') }} All Right Reserved</p>
                </div>
                <ul class="footer-nav pull-right clearfix">
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
