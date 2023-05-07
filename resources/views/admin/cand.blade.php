@extends('admin.layouts.admin')

@section('content')
<br><br><br><br>
<div class="card">
    <div class="card-header">
        <h4 style="color: white">liste des candidats</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" >
            <thead>
                <tr>
                    <th>id</th>
                    <th>intitulé</th>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>genre</th>
                    <th>date de naissance</th>
                    <th>wilaya</th>
                    <th>cv</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $candidature as $item)
                 @if ($item->approuvé==0)
                 <tr style="background-color: rgb(34, 34, 34)">
                     <td>{{$item->id}}</td>
                     <td>{{$item->intitule}}</td>
                     <td>{{$item->nom}}</td>
                     <td>{{$item->prenom}}</td>
                     <td>{{$item->genre}}</td>
                     <td>{{$item->date_de_naissanse}}</td>
                     <td>{{$item->nom_wilaya}}</td>
                     <td>
                         <embed src="{{ asset('images/candidature/cv/' .$item->cv)}}" class="cate-image" alt="file here" width="100%">
                     </td>
                      <td>
                        <form action="{{url('approuverr/'.  $item->id )}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="1" name="approuverr">
                            <button type="submit"class="btn btn-primary">approuver</button>
                        </form>
                          <br>
                          <a href="{{url('suprimer_can/' .$item->id)}}" class="btn btn-danger">suprimer</button>
                      </td>
                 </tr>
                 @endif
                 @if ($item->approuvé==1)
                 <tr style="background-color: rgb(34, 34, 34)">
                     <td>{{$item->id}}</td>
                     <td>{{$item->intitule}}</td>
                     <td>{{$item->nom}}</td>
                     <td>{{$item->prenom}}</td>
                     <td>{{$item->genre}}</td>
                     <td>{{$item->date_de_naissanse}}</td>
                     <td>{{$item->nom_wilaya}}</td>
                     <td>
                         <embed src="{{ asset('images/candidature/cv/' .$item->cv)}}" class="cate-image" alt="file here" width="100%">
                     </td>
                      <td>
                        <h4>déja approuvé</h4>
                          <br>
                          <a href="{{url('suprimer_can/' .$item->id)}}" class="btn btn-danger">suprimer</button>
                      </td>
                 </tr>
                 @endif
                @endforeach
            </tbody>
        </table>
        <style>
            .page-item.active .page-link {
                z-index: 1;
                color: #fff;
                background-color: #833498; //your color
                border-color: green; //your color
            }
            </style>
                        <nav>
                          <ul class="pagination  justify-content-center ">

                                {{ $candidature->withQueryString()->links() }}

                          </ul>
                        </nav>
    </div>
</div>
@endsection
