@extends('layouts.apps')


@section('content')
    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets1/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>les <em>employeurs</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>

            <div class="row">
                <!--<div class="col-lg-4">
                    <form action="#">
                         <h5 style="margin-bottom: 15px">Type</h5>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Contract (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Full time (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Internship (5)</span>
                              </label>
                         </div>

                         <br>

                         <h5 style="margin-bottom: 15px">Category</h5>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Accounting / Finance / Insurance Jobs (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Accounting / Finance / Insurance Jobs (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Accounting / Finance / Insurance Jobs (5)</span>
                              </label>
                         </div>

                         <br>

                         <h5 style="margin-bottom: 15px">Career levels</h5>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Entry Level (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Entry Level (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Entry Level (5)</span>
                              </label>
                         </div>

                         <br>

                         <h5 style="margin-bottom: 15px">Education levels</h5>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Associate Degree (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Associate Degree (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Associate Degree (5)</span>
                              </label>
                         </div>

                         <br>


                         <h5 style="margin-bottom: 15px">Years of experience</h5>

                         <div>
                              <label>
                                   <input type="checkbox">

                                    <span>&lt; 1 (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                    <span>&lt; 1 (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                    <span>&lt; 1 (5)</span>
                              </label>
                         </div>
                    </form>

                    <br>
                </div> -->
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($cv as $item )
                        @if (Auth::user()->id==$item->user_id)

                        @if ($item->approuvé==1)
                        <div class="col-md-6">
                            <div class="trainer-item">
                                <div class="image-thumb">
                                    <embed src="{{asset('images/cv/'.$item->cv)}}" alt="cv" style="height: 350px ;width: 510px">
                                </div>
                                <div class="down-content">
                                    <!--<span> <sup>$</sup>70 000 </span>-->
                                    <span>{{$item->genre}}</span>

                                    <h4>{{$item->nom}} {{$item->prenom}} ({{$item->nom_wilaya}})</h4>

                                    <h6>0{{$item->numero_de_telephone}}<h6>
                                    <!--<p>Medical &nbsp;/&nbsp; Health Jobs</p>-->
                                    <br>

                                    <ul class="social-icons">
                                        <li><a href="{{url('empvue/' .$item->id)}}">+ View More</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif

                        @endif
                        @endforeach
                       <!-- <div class="col-md-6">
                            <div class="trainer-item">
                                <div class="image-thumb">
                                    <img src="assets1/images/product-2-720x480.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <span> <sup>$</sup>70 000 </span>

                                    <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                                    <p>Medical &nbsp;/&nbsp; Health Jobs</p>

                                    <ul class="social-icons">
                                        <li><a href="job-details.html">+ View More</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="trainer-item">
                                <div class="image-thumb">
                                    <img src="assets1/images/product-3-720x480.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <span> <sup>$</sup>70 000 </span>

                                    <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                                    <p>Medical &nbsp;/&nbsp; Health Jobs</p>

                                    <ul class="social-icons">
                                        <li><a href="job-details.html">+ View More</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="trainer-item">
                                <div class="image-thumb">
                                    <img src="assets1/images/product-4-720x480.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <span> <sup>$</sup>70 000 </span>

                                    <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                                    <p>Medical &nbsp;/&nbsp; Health Jobs</p>

                                    <ul class="social-icons">
                                        <li><a href="job-details.html">+ View More</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="trainer-item">
                                <div class="image-thumb">
                                    <img src="assets1/images/product-5-720x480.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <span> <sup>$</sup>70 000 </span>

                                    <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                                    <p>Medical &nbsp;/&nbsp; Health Jobs</p>

                                    <ul class="social-icons">
                                        <li><a href="job-details.html">+ View More</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="trainer-item">
                                <div class="image-thumb">
                                    <img src="assets1/images/product-6-720x480.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <span> <sup>$</sup>70 000 </span>

                                    <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                                    <p>Medical &nbsp;/&nbsp; Health Jobs</p>

                                    <ul class="social-icons">
                                        <li><a href="job-details.html">+ View More</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>-->

                    </div>
                </div>
            </div>



            <br>

            <style>
                .page-item.active .page-link {
                    z-index: 1;
                    color: #fff;
                    background-color: #ED563B; //your color
                    border-color: green; //your color
                }
                </style>
                            <nav>
                              <ul class="pagination pagination-lg justify-content-center ">

                                    {{ $cv->links() }}

                              </ul>
                            </nav>

        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->


    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2020 Company Name
                        - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

@endsection
