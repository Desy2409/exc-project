@extends('showcase.layouts.app')
@section('page-title',"A propos de nous")
@section('content-title',"A propos de nous")
@section('breadcrumb',"A propos de nous")

@section('page-content')
    <section class="uza-about-us-area section-padding-80">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12 col-lg-6">
                    <div class="about-us-thumbnail mb-80">
                        <img src="{{ asset('assets/showcase/img/bg-img/x2.jpg.pagespeed.ic.nXDY7IzkDZ.jpg') }}" alt="">

                        <div class="uza-video-area hi-icon-effect-8">
                            <a href="https://www.youtube.com/watch?v=sSakBz_eYzQ" class="hi-icon video-play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="section-heading mb-5">
                        <h2>Notre Mission</h2>
                    </div>
                    <div class="about-us-content mb-80">
                        <div class="about-tab-area">
                            <ul class="nav nav-tabs mb-50" id="mona_modelTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">CREATION</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"> ANALYSIS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">STRATEGY</a>
                                </li>
                            </ul>
                        </div>

                        <div class="about-tab-content">
                            <div class="tab-content" id="mona_modelTabContent">
                                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                                    <div class="tab-content-text">
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing esed diam nonumy eirmod tempor invidunt ut labore et dolore magna.</p>
                                        <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est Lorem ipsum dolor sit amet ipsumlor eut consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore et dolore magna liquyam erat.</p>
                                        <a href="#" class="btn uza-btn mt-30">Get In Touch</a>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                                    <div class="tab-content-text">
                                        <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est Lorem ipsum dolor sit amet ipsumlor eut consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore et dolore magna liquyam erat.</p>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing esed diam nonumy eirmod tempor invidunt ut labore et dolore magna.</p>
                                        <a href="#" class="btn uza-btn mt-30">Get In Touch</a>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab3">
                                    <div class="tab-content-text">
                                        <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata. Lorem ipsum dolor sit amet, consetetur sadipscing esed diam nonumy eirmod tempor invidunt ut labore et dolore magna.</p>
                                        <p>sanctus est Lorem ipsum dolor sit amet ipsumlor eut consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore et dolore magna liquyam erat.</p>
                                        <a href="#" class="btn uza-btn mt-30">Get In Touch</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about-bg-pattern">
            <img src="{{ asset('assets/showcase/img/core-img/xcurve-2.png.pagespeed.ic.dpDp7fCvQM.png') }}" alt="">
        </div>
    </section>


    <section class="uza-why-choose-us-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="choose-us-content mb-80">
                        <div class="section-heading mb-4">
                            <h2>Pourquoi nous choisir ?</h2>
                            <p>We’re Your Partner in Your Success</p>
                        </div>
                        <ul>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Distinctive Experts That Provide Effortless Expertise</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Enriched Outcomes Enabled By Experienced Professionals</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Wide-Ranging Thoughts Bread Exceptional Ideas</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Generating Best Results Through Open Communication</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Extensive Marketing Research Generates Valuable Insights</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> We are Results-Driven, Oriented, We deliver results</li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="choose-us-thumbnail mb-80">
                        <img class="w-100" src="{{ asset('assets/showcase/img/bg-img/22.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="uza-portfolio-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Team of Experts</h2>
                        <p>We stay on top of our industry by being experts in yours.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="team-sildes owl-carousel">
                    <div class="single-team-slide">
                        <img src="{{ asset('assets/showcase/img/bg-img/18.jpg') }}" alt="">
                        <div class="overlay-effect">
                            <h6>DESIGNER</h6>
                            <h4>Roger Black</h4>
                            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est.</p>
                        </div>
                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <div class="single-team-slide">
                        <img src="{{ asset('assets/showcase/img/bg-img/19.jpg') }}" alt="">

                        <div class="overlay-effect">
                            <h6>DESIGNER</h6>
                            <h4>Roger Black</h4>
                            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est.</p>
                        </div>

                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <div class="single-team-slide">
                        <img src="{{ asset('assets/showcase/img/bg-img/20.jpg') }}" alt="">

                        <div class="overlay-effect">
                            <h6>DESIGNER</h6>
                            <h4>Roger Black</h4>
                            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est.</p>
                        </div>

                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <div class="single-team-slide">
                        <img src="{{ asset('assets/showcase/img/bg-img/21.jpg') }}" alt="">

                        <div class="overlay-effect">
                            <h6>DESIGNER</h6>
                            <h4>Roger Black</h4>
                            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est.</p>
                        </div>

                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <div class="single-team-slide">
                        <img src="{{ asset('assets/showcase/img/bg-img/18.jpg') }}" alt="">

                        <div class="overlay-effect">
                            <h6>DESIGNER</h6>
                            <h4>Roger Black</h4>
                            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est.</p>
                        </div>

                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <div class="single-team-slide">
                        <img src="{{ asset('assets/showcase/img/bg-img/19.jpg') }}" alt="">

                        <div class="overlay-effect">
                            <h6>DESIGNER</h6>
                            <h4>Roger Black</h4>
                            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est.</p>
                        </div>

                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <div class="single-team-slide">
                        <img src="{{ asset('assets/showcase/img/bg-img/20.jpg') }}" alt="">

                        <div class="overlay-effect">
                            <h6>DESIGNER</h6>
                            <h4>Roger Black</h4>
                            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est.</p>
                        </div>

                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <div class="single-team-slide">
                        <img src="{{ asset('assets/showcase/img/bg-img/21.jpg') }}" alt="">

                        <div class="overlay-effect">
                            <h6>DESIGNER</h6>
                            <h4>Roger Black</h4>
                            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est.</p>
                        </div>

                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="border-line mt-80"></div>
        </div>
    </section>


    <div class="uza-cta-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="cta-content mb-80">
                        <h3>Intéressé de travailler avec nous ?</h3>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="cta-content mb-80">
                        <div class="call-now-btn">
                            <a href="#"><span>Appelez-nous maintenant:</span> (+228) 93 64 29 09</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="clients-feedback-area section-padding-0-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-slides owl-carousel">
                        <div class="single-testimonial-slide d-flex align-items-center">
                            <div class="testimonial-thumbnail">
                                <img src="{{ asset('assets/showcase/img/bg-img/x7.jpg.pagespeed.ic.8AMSu-iuBd.jpg') }}" alt="">
                            </div>
                            <div class="testimonial-content">
                                <h4>“Colorlib Ltd’s ranking has gone up so much from the great work that your team has done and our brand get organic sales consistently from your efforts. We are happy that the results of your efforts were lasting and profitable.”</h4>
                                <div class="ratings">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                </div>
                                <div class="author-info">
                                    <h5>Darrell Goodman <span>- CEO colorlib</span></h5>
                                </div>
                                <div class="quote-icon"><img src="{{ asset('assets/showcase/img/core-img/xquote.png.pagespeed.ic.CibaJaBq7j.png') }}" alt=""></div>
                            </div>
                        </div>

                        <div class="single-testimonial-slide d-flex align-items-center">
                            <div class="testimonial-thumbnail">
                                <img src="{{ asset('assets/showcase/img/bg-img/x23.jpg.pagespeed.ic.L86Jk0HzSY.jpg') }}" alt="">
                            </div>
                            <div class="testimonial-content">
                                <h4>“Colorlib Ltd’s ranking has gone up so much from the great work that your team has done and our brand get organic sales consistently from your efforts. We are happy that the results of your efforts were lasting and profitable.”</h4>
                                <div class="ratings">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                </div>
                                <div class="author-info">
                                    <h5>Darrell Goodman <span>- CEO colorlib</span></h5>
                                </div>
                                <div class="quote-icon"><img src="{{ asset('assets/showcase/img/core-img/xquote.png.pagespeed.ic.CibaJaBq7j.png') }}" alt=""></div>
                            </div>
                        </div>

                        <div class="single-testimonial-slide d-flex align-items-center">
                            <div class="testimonial-thumbnail">
                                <img src="{{ asset('assets/showcase/img/bg-img/x24.jpg.pagespeed.ic.XheM69Bk0J.jpg') }}" alt="">
                            </div>
                            <div class="testimonial-content">
                                <h4>“Colorlib Ltd’s ranking has gone up so much from the great work that your team has done and our brand get organic sales consistently from your efforts. We are happy that the results of your efforts were lasting and profitable.”</h4>
                                <div class="ratings">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                </div>
                                <div class="author-info">
                                    <h5>Darrell Goodman <span>- CEO colorlib</span></h5>
                                </div>
                                <div class="quote-icon"><img src="{{ asset('assets/showcase/img/core-img/xquote.png.pagespeed.ic.CibaJaBq7j.png') }}" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="uza-cf-area section-padding-80-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cf-area d-flex align-items-center mb-80">
                        <h2><span class="counter">90</span></h2>
                        <div class="cf-text">
                            <h6>Courses<br>effectuées</h6>
                        </div>
                        <div class="bg-icon"><i class="icon_piechart"></i></div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cf-area d-flex align-items-center mb-80">
                        <h2><span class="counter">120</span></h2>
                        <div class="cf-text">
                            <h6>Clients<br>Heureux</h6>
                        </div>
                        <div class="bg-icon"><i class="icon_heart_alt"></i></div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cf-area d-flex align-items-center mb-80">
                        <h2><span class="counter">50</span></h2>
                        <div class="cf-text">
                            <h6>WEB<br>awards</h6>
                        </div>
                        <div class="bg-icon"><i class="icon_book_alt"></i></div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cf-area d-flex align-items-center mb-80">
                        <h2><span class="counter">20</span></h2>
                        <div class="cf-text">
                            <h6>Nos<br>experts</h6>
                        </div>
                        <div class="bg-icon"><i class="icon_profile"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
