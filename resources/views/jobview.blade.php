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
                        <h2>description du travaille :</h2>
                        <br>
                        <h2><em>{{$travaille->intitule}}</em></h2>
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

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trainer-item" style="height: 900px">
                            <div class="image-thumb">
                                <img src="{{asset('images/travaille/'.$travaille->photo)}}" alt="cv" style="height: 550px ;width: 510px; float: right">
                            </div>
                            <div class="down-content">
                                <!--<span> <sup>$</sup>70 000 </span>-->
                                <br><br>

                                <h3 style="color: rgb(184, 48, 48)">l'intitulé du travaille:</h3><br> <h4> {{$travaille->intitule}}</h4>
                                <h3 style="color: rgb(184, 48, 48)">le salaire:</h3><br> <h4> {{$travaille->salaire}} DZD</h4>
                                <h3 style="color: rgb(184, 48, 48)">les horaires du travaille:</h3><br> <h4> {{$travaille->horaires}} heures</h4>
                                <h3 style="color: rgb(184, 48, 48)">la localisation du travaille:</h3><br> <h4> {{$travaille->localisation}} <br><br> wilaya de: {{$travaille->nom_wilaya}}</h4>
                                @if($travaille->information==null)
                                <h3 style="color: rgb(184, 48, 48)">informations générales sur le travaille:</h3><br> <h4> non disponible</h4>
                                @else
                                <h3 style="color: rgb(184, 48, 48)">informations générales sur le travaille:</h3><br> <h4> {{$travaille->information}} </h4>
                                @endif
                                @if($travaille->diplome==null)
                                <h3 style="color: rgb(184, 48, 48)">diplome/formation nésessaire:</h3><br> <h4> /  </h4>
                                @else
                                <h3 style="color: rgb(184, 48, 48)">diplome/formation nésessaire:</h3><br> <h4> {{$travaille->diplome}} </h4>
                                @endif
                                @if($travaille->necessite==null)
                                <h3 style="color: rgb(184, 48, 48)">autres nécessité:</h3><br> <h4> /  </h4>
                                @else
                                <h3 style="color: rgb(184, 48, 48)">autres nécessité:</h3><br> <h4> {{$travaille->necessite}} </h4>
                                @endif
                                <!--<p>Medical &nbsp;/&nbsp; Health Jobs</p>-->
                                <br>

                            </div>
                        </div>
                        <div >
                            @if (Auth::user()->id==$travaille->user_id)
                            <a href="{{ url('modtrv/' .$travaille->id) }}" class="btn btn-primary container col-md-4" style="float: left" >modifier le travaille</a>
                            <a href="{{ url('suptrv/'.$travaille->id) }}" class="btn btn-primary container col-md-4" style="float: right" >suprimer le travaille</a></h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trainer-item" style="height: 600px">
                            <div class="image-thumb">
                                <embed src="{{asset('images/travaille/'.$travaille->contrat)}}" alt="contrat" style="height: 550px ;width: 350px; float: right">
                            </div>

                            <div class="down-content">
                                <!--<span> <sup>$</sup>70 000 </span>-->
                                <br><br>

                                <h3 style="color: rgb(184, 48, 48)">contrat standard:</h3>
                                <br><br><br>
                                <h4 style="color: rgb(184, 48, 48)">Notes:</h4>
                                <h4>-les diplomes et les formation sont afficher sous forme d'un fichier pdf <br><br>  -le contrat doit......</h4>

                                <!--<p>Medical &nbsp;/&nbsp; Health Jobs</p>-->
                                <br>

                            </div>
                        </div>
                    </div>
                </div>
                <div >
                    @if (Auth::user()->id==$travaille->user_id)
                    <a href="{{ url('trvclist/' .$travaille->id) }}" class="btn btn-primary container col-md-4" style="float: left" >voir la liste des candidature pour ce travaille</a>
                    <a href="{{ url('vtrv') }}" class="btn btn-primary container col-md-4" style="float: right" >revenir vers votre liste</a></h4>
                    @else
                    <h4>si le travaille vous intéresse:</h4>
                    <br>
                    <a href="{{ url('trvcond/' .$travaille->id) }}" class="btn btn-primary container col-md-4" style="float: left" >postulez pour ce travaille</a>
                    <a href="{{ url('jobs') }}" class="btn btn-primary container col-md-4" style="float: right" >revenir vers la liste</a></h4>
                    @endif
                    <h4 style="text-align: center">ou

                </div>
            </div>
<br><br><br><br>
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
