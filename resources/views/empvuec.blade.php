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
                        <h2>{{$candidature->nom}} <em>{{$candidature->prenom}} </em></h2>
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

          <h4 class="heading" style="text-align: center">le travaille : {{$candidature->intitule}}</h4>

          <br><br>

            @if ($candidature->diplome_formation==null)
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trainer-item" style="height: 600px">
                            <div class="image-thumb">
                                <embed src="{{asset('images/candidature/cv/'.$candidature->cv)}}" alt="cv" style="height: 550px ;width: 510px; float: right">
                            </div>
                            <div class="down-content">
                                <!--<span> <sup>$</sup>70 000 </span>-->
                                <br><br>

                                <h3 style="color: rgb(184, 48, 48)">Nom et Prenom:</h3><br> <h4> {{$candidature->nom}} {{$candidature->prenom}} ({{$candidature->genre}})</h4>
                                <h3 style="color: rgb(184, 48, 48)">date de naissance:</h3><br> <h4> {{$candidature->date_de_naissanse}}</h4>
                                <h3 style="color: rgb(184, 48, 48)">adresse:</h3><br> <h4> {{$candidature->adresse}} <br><br> wilaya de: {{$candidature->nom_wilaya}}</h4>
                                <h3 style="color: rgb(184, 48, 48)">numéro du telephone:</h3><br> <h4> 0{{$candidature->numero_de_telephone}} </h4>
                                @if($candidature->adresse_email==null)
                                <h3 style="color: rgb(184, 48, 48)">adresse email:</h3><br> <h4> non disponible</h4>
                                @else
                                <h3 style="color: rgb(184, 48, 48)">adresse email:</h3><br> <h4> {{$candidature->adresse_email}} </h4>
                                @endif
                                <!--<p>Medical &nbsp;/&nbsp; Health Jobs</p>-->
                                <br>

                            </div>
                        </div>
                    </div>
                </div>

                <div >
                    @if (Auth::user()->id==$candidature->user_id)

                    <br>
                    <a href="{{ url('vcand' ) }}" class="btn btn-primary container col-md-4" style="float: right" >revenir vers la liste des employeurs</a></h4>
                    @endif
                </div>

                <div >
                    @if (Auth::user()->id!=$candidature->user_id)
                    <h4>si le cv vous intéresse:</h4>
                    <br>
                    <a href="{{ url('contcvc/' .$candidature->id) }}" class="btn btn-primary container col-md-4" style="float: left" >contacter Mr/Mme: {{$candidature->nom}} {{$candidature->prenom}}</a>
                    <h4 style="text-align: center">ou
                    <a href="{{ url('trvclist/' .$candidature->trv_id ) }}" class="btn btn-primary container col-md-4" style="float: right" >revenir vers la liste des employeurs</a></h4>
                    @endif
                </div>

                <div>
                    @if (Auth::user()->id==$candidature->user_id)
                                <a href="{{ url('modcand/' .$candidature->id , $travaille->id) }}" class="btn btn-primary container col-md-4" style="float: left" >modifier le cv</a>
                                <a href="{{ url('supcand/'.$candidature->id) }}" class="btn btn-primary container col-md-4" style="float: right" >suprimer le cv</a></h4>
                                @endif
                </div>

            </div>
            @else
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trainer-item" style="height: 600px">
                            <div class="image-thumb">
                                <embed src="{{asset('images/candidature/cv/'.$candidature->cv)}}" alt="cv" style="height: 550px ;width: 350px; float: right">
                            </div>

                            <div class="down-content">
                                <!--<span> <sup>$</sup>70 000 </span>-->
                                <br><br>

                                <h3 style="color: rgb(184, 48, 48)">Nom et Prenom:</h3><br> <h4> {{$candidature->nom}} {{$candidature->prenom}} ({{$candidature->genre}})</h4>
                                <h3 style="color: rgb(184, 48, 48)">date de naissance:</h3><br> <h4> {{$candidature->date_de_naissanse}}</h4>
                                <h3 style="color: rgb(184, 48, 48)">adresse:</h3><br> <h4> {{$candidature->adresse}} <br><br> wilaya de: {{$candidature->nom_wilaya}}</h4>
                                <h3 style="color: rgb(184, 48, 48)">numéro du telephone:</h3><br> <h4>0{{$candidature->numero_de_telephone}} </h4>
                                @if($candidature->adresse_email==null)
                                <h3 style="color: rgb(184, 48, 48)">adresse email:</h3><br> <h4> non disponible</h4>
                                @else
                                <h3 style="color: rgb(184, 48, 48)">adresse email:</h3><br> <h4> {{$candidature->adresse_email}} </h4>
                                @endif

                                <!--<p>Medical &nbsp;/&nbsp; Health Jobs</p>-->
                                <br>

                            </div>
                        </div>
                        <div>
                            @if (Auth::user()->id==$candidature->user_id)
                                        <a href="{{ url('modcand/' .$candidature->id , $travaille->id) }}" class="btn btn-primary container col-md-4" style="float: left" >modifier le cv</a>
                                        <a href="{{ url('supcand/'.$candidature->id) }}" class="btn btn-primary container col-md-4" style="float: right" >suprimer le cv</a></h4>
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
                                <embed src="{{asset('images/candidature/candidaturedip/'.$candidature->diplome_formation)}}" alt="cv" style="height: 550px ;width: 350px; float: right">
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
                    @if (Auth::user()->id==$candidature->user_id)

                    <br>
                    <a href="{{ url('vcand' ) }}" class="btn btn-primary container col-md-4" style="float: right" >revenir vers la liste des employeurs</a></h4>
                    @endif
                </div>

                <div >
                    @if (Auth::user()->id!=$candidature->user_id)
                    <h4>si le cv vous intéresse:</h4>
                    <br>
                    <a href="{{ url('contcvc/' .$candidature->id) }}" class="btn btn-primary container col-md-4" style="float: left" >contacter Mr/Mme: {{$candidature->nom}} {{$candidature->prenom}}</a>
                    <h4 style="text-align: center">ou
                    <a href="{{ url('trvclist/' .$candidature->trv_id) }}" class="btn btn-primary container col-md-4" style="float: right" >revenir vers la liste des employeurs</a></h4>
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
