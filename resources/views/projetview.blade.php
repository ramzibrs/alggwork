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
                        <h4 style="color: white">le CV de Mr/Mme:</h4>
                        <br>
                        <h2>{{$cv->nom}} <em>{{$cv->prenom}} </em></h2>
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

            @if ($cv->diplome_formation==null)
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trainer-item" style="height: 600px">
                            <div class="image-thumb">
                                <embed src="{{asset('images/cv/'.$cv->cv)}}" alt="cv" style="height: 550px ;width: 510px; float: right">
                            </div>
                            <div class="down-content">
                                <!--<span> <sup>$</sup>70 000 </span>-->
                                <br><br>

                                <h3 style="color: rgb(184, 48, 48)">Nom et Prenom:</h3><br> <h4> {{$cv->nom}} {{$cv->prenom}} ({{$cv->genre}})</h4>
                                <h3 style="color: rgb(184, 48, 48)">date de naissance:</h3><br> <h4> {{$cv->date_de_naissanse}}</h4>
                                <h3 style="color: rgb(184, 48, 48)">adresse:</h3><br> <h4> {{$cv->adresse}} <br><br> wilaya de: {{$cv->nom_wilaya}}</h4>
                                <h3 style="color: rgb(184, 48, 48)">numéro du telephone:</h3><br> <h4>0{{$cv->numero_de_telephone}} </h4>
                                @if($cv->adresse_email==null)
                                <h3 style="color: rgb(184, 48, 48)">adresse email:</h3><br> <h4> non disponible</h4>
                                @else
                                <h3 style="color: rgb(184, 48, 48)">adresse email:</h3><br> <h4> {{$cv->adresse_email}} </h4>
                                @endif
                                <!--<p>Medical &nbsp;/&nbsp; Health Jobs</p>-->
                                <br>

                            </div>
                        </div>
                    </div>
                </div>
                <div >
                    @if (Auth::user()->id==$cv->user_id)

                    <br>
                    <a href="{{ url('vcv') }}" class="btn btn-primary container col-md-4" style="float: right" >revenir vers votre cv's</a></h4>
                    @endif
                </div>

                <div >
                    @if (Auth::user()->id!=$cv->user_id)
                    <h4>si le cv vous intéresse:</h4>
                    <br>
                    <a href="{{ url('contcv/' .$cv->id) }}" class="btn btn-primary container col-md-4" style="float: left" >contacter Mr/Mme: {{$cv->nom}} {{$cv->prenom}}</a>
                    <h4 style="text-align: center">ou
                    <a href="{{ url('employeur') }}" class="btn btn-primary container col-md-4" style="float: right" >revenir vers la liste des employeurs</a></h4>
                    @endif
                </div>
                <div>
                    @if (Auth::user()->id==$cv->user_id)
                                <a href="{{ url('modcv/' .$cv->id) }}" class="btn btn-primary container col-md-4" style="float: left" >modifier le cv</a>
                                <a href="{{ url('supcv/'.$cv->id) }}" class="btn btn-primary container col-md-4" style="float: right" >suprimer le cv</a></h4>
                                @endif
                </div>
            </div>
            @else
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trainer-item" style="height: 600px">
                            <div class="image-thumb">
                                <embed src="{{asset('images/cv/'.$cv->cv)}}" alt="cv" style="height: 550px ;width: 350px; float: right">
                            </div>

                            <div class="down-content">
                                <!--<span> <sup>$</sup>70 000 </span>-->
                                <br><br>

                                <h3 style="color: rgb(184, 48, 48)">Nom et Prenom:</h3><br> <h4> {{$cv->nom}} {{$cv->prenom}} ({{$cv->genre}})</h4>
                                <h3 style="color: rgb(184, 48, 48)">date de naissance:</h3><br> <h4> {{$cv->date_de_naissanse}}</h4>
                                <h3 style="color: rgb(184, 48, 48)">adresse:</h3><br> <h4> {{$cv->adresse}} <br><br> wilaya de: {{$cv->nom_wilaya}}</h4>
                                <h3 style="color: rgb(184, 48, 48)">numéro du telephone:</h3><br> <h4>0{{$cv->numero_de_telephone}} </h4>
                                @if($cv->adresse_email==null)
                                <h3 style="color: rgb(184, 48, 48)">adresse email:</h3><br> <h4> non disponible</h4>
                                @else
                                <h3 style="color: rgb(184, 48, 48)">adresse email:</h3><br> <h4> {{$cv->adresse_email}} </h4>
                                @endif

                                <!--<p>Medical &nbsp;/&nbsp; Health Jobs</p>-->
                                <br>

                            </div>
                        </div>
                        <div>
                            @if (Auth::user()->id==$cv->user_id)
                                        <a href="{{ url('modcv/' .$cv->id) }}" class="btn btn-primary container col-md-4" style="float: left" >modifier le cv</a>
                                        <a href="{{ url('supcv/'.$cv->id) }}" class="btn btn-primary container col-md-4" style="float: right" >suprimer le cv</a></h4>
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
                                <embed src="{{asset('images/cv/dip/'.$cv->diplome_formation)}}" alt="cv" style="height: 550px ;width: 350px; float: right">
                            </div>

                            <div class="down-content">
                                <!--<span> <sup>$</sup>70 000 </span>-->
                                <br><br>

                                <h3 style="color: rgb(184, 48, 48)">diplome/formation:</h3>
                                <br><br><br><br>
                                <h4 style="color: rgb(184, 48, 48)">Note:</h4>
                                <h4>les diplomes et les formation sont afficher sous forme d'un fichier pdf </h4>

                                <!--<p>Medical &nbsp;/&nbsp; Health Jobs</p>-->
                                <br>

                            </div>
                        </div>
                    </div>
                </div>
                <div >
                    @if (Auth::user()->id==$cv->user_id)

                    <br>
                    <a href="{{ url('vcv') }}" class="btn btn-primary container col-md-4" style="float: right" >revenir vers votre cv's</a></h4>
                    @endif
                </div>

                <div >
                    @if (Auth::user()->id!=$cv->user_id)
                    <h4>si le cv vous intéresse:</h4>
                    <br>
                    <a href="{{ url('contcv/' .$cv->id) }}" class="btn btn-primary container col-md-4" style="float: left" >contacter Mr/Mme: {{$cv->nom}} {{$cv->prenom}}</a>
                    <h4 style="text-align: center">ou
                    <a href="{{ url('employeur') }}" class="btn btn-primary container col-md-4" style="float: right" >revenir vers la liste des employeurs</a></h4>
                    @endif
                </div>
            </div>
            @endif
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
