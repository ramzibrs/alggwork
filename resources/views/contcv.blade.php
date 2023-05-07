@extends('layouts.apps')


@section('content')
<section class="section section-bg" id="call-to-action" style="background-image: url(assets1/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <h2>vous pouvez contacter Mr/Mme {{$cv->nom}} <em>{{$cv->prenom}}</em> via :</h2>
                    <br><br>
                    <h2>numéro de telephone: <em>0{{$cv->numero_de_telephone}}</em></h2>
                    <br><br>
                    @if ($cv->adresse_email!=null)
                        <h2>adresse email: <em>{{$cv->adresse_email}}</em></h2>
                    @endif
                    <br>
                    <br>
                    <h4 style="color: white">autres méthodes de communication sera annoncé prochainement sur votre site </h4>
                    <br>
                    <h4 style="color: white">merci de votre confiance et fidelité</h4>


                </div>
            </div>
        </div>
    </div>

</section>
<br>
<div class="text-center">
    <a href="{{ url('employeur') }}" class="btn btn-primary container col-md-4" style="align-items:center" >revenir vers la liste des employeurs</a></h4>
    </div>
    <br>
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
