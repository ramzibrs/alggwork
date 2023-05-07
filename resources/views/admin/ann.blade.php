@extends('admin.layouts.admin')

@section('content')
<br><br><br><br>
<div class="card">
    <div class="card-header">
        <h4 style="color: white">liste des annonces</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" >
            <thead>
                <tr>
                    <th>id</th>
                    <th>titre</th>
                    <th>sous titre</th>
                    <th>wilaya</th>
                    <th>n° tlp</th>
                    <th>image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $annonce as $item)
                 @if ($item->approuvé==0)
                 <tr style="background-color: rgb(34, 34, 34)">
                     <td>{{$item->id}}</td>
                     <td>{{$item->titre}}</td>
                     <td>{{$item->sous_titre}}</td>
                     <td>{{$item->nom_wilaya}}</td>
                     <td>0{{$item->numero_de_telephone}}</td>
                     <td><img src="{{ asset('images/annonce/images/' .$item->photo)}}" class="cate-image" alt="image here"></td>
                      <td>
                        <form action="{{url('approuvera/'.  $item->id )}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="1" name="approuvera">
                            <button type="submit"class="btn btn-primary">approuver</button>
                        </form>

                            @if ($item->tendance==0)
                            <form action="{{url('tendanceaa/'.  $item->id )}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="1" name="tendanceaa">
                                <button type="submit"class="btn btn-primary">tendance</button>
                            </form>
                            @endif


                            @if ($item->tendance==1)
                            <form action="{{url('tendancead/'.  $item->id )}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="0" name="tendancead">
                                <button type="submit"class="btn btn-primary">enlever tendance</button>
                            </form>
                            @endif
                          <a href="{{url('suprimer_ann/' .$item->id)}}" class="btn btn-danger">suprimer</button>


                      </td>
                 </tr>
                 @endif
                 @if ($item->approuvé==1)
                 <tr style="background-color: rgb(34, 34, 34)">
                    <td>{{$item->id}}</td>
                     <td>{{$item->titre}}</td>
                     <td>{{$item->sous_titre}}</td>
                     <td>{{$item->nom_wilaya}}</td>
                     <td>0{{$item->numero_de_telephone}}</td>
                     <td><img src="{{ asset('images/annonce/images/' .$item->photo)}}" class="cate-image" alt="image here"></td>
                      <td>
                        <h4>déja approuvé</h4>

                        @if ($item->tendance==0)
                            <form action="{{url('tendanceaa/'.  $item->id )}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="1" name="tendanceaa">
                                <button type="submit"class="btn btn-primary">tendance</button>
                            </form>
                            @endif


                            @if ($item->tendance==1)
                            <form action="{{url('tendancead/'.  $item->id )}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="0" name="tendancead">
                                <button type="submit"class="btn btn-primary">enlever tendance</button>
                            </form>
                            @endif

                          <a href="{{url('suprimer_ann/' .$item->id)}}" class="btn btn-danger">suprimer</button>

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

                                {{ $annonce->withQueryString()->links() }}

                          </ul>
                        </nav>
    </div>
</div>
@endsection
