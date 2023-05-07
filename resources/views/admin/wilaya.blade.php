@extends('admin.layouts.admin')

@section('content')
<br><br><br><br>
<div class="text-center">
    <a href="{{ url('addwilaya') }}" class="btn btn-primary mx-5" >ajouter wilaya</a>
</div>

<div class="card container">
    <div class="card-header">
        <h4 style="color: white">wilaya's</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <!--<th>id</th>-->
                    <th>nom du wilaya</th>
                    <th>numéro du wilaya</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wilaya as $item)
                 <tr style="background-color: rgb(34, 34, 34)">
                     <!--<td>{{$item->id}}</td>-->
                     <td>{{$item->nom}}</td>
                     <td>{{$item->numero_du_wilaya}}</td>
                      <td width="30%">
                          <a href="{{url('modifier_wilaya/'.$item->id)}}" class="btn btn-primary">modifier </a>
                          <a href="{{url('suprimer_wilaya/' .$item->id)}}" class="btn btn-danger">suprimer </a>
                      </td>
                 </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection
