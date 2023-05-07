@extends('admin.layouts.admin')

@section('content')
<br><br><br>
<div class="card">
    <br><br><br>
    <div class="card-header text-center">
        <h4 style="color: white">modifier wilaya</h4>
    </div>
<br><br>
    <form action="{{url('mise_wilaya/' .$wilaya->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <h6 style="color: white" class="container">le nom du wilaya</h6>
                <input type="text" class="form-control" value="{{$wilaya->nom}}" name="nom" style="background-color: rgb(34, 34, 34)">
            </div>
            <div class="col-md-6">
                <h6 style="color: white" class="container">le numero de wilaya</h6>
                <input type="number" class="form-control" value="{{$wilaya->numero_du_wilaya}}" name="numero" style="background-color: rgb(34, 34, 34)">
            </div>
        </div>
        <br><br><br>
        <div class="d-grid gap-2 col-2 mx-auto">
            <button type="submit"  class="btn btn-primary  container ">modifier</button>
        </div>
        <br><br><br><br><br>
    </form>
</div>


@endsection
