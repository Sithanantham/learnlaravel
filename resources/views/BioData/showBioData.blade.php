@extends('layouts.layout')

@section('content')

<h3 align="center">Bio-Data <small>(Learning Laravel)</small><a href="{{ route('addBioData') }}"><button class="btn btn-warning pull-right">Add Bio-Data</button></a></h3><hr>

<table class="table table-bordered table-striped">
    <thead lass="thead-light">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <!-- <th scope="col">Photo</th> -->
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    @php $i = 1; @endphp
    @foreach($data as $datas)
        <tr>
        <th scope="row">{{ $i++ }}</th>
        <td>{{ ucfirst($datas->name) }}</td>
        <td>{{ $datas->email }}</td>
       <!--  <td><img src="{{ $datas->photo }}" alt=""style = "height:100px; width:100px;" /></td> -->
        <td><a href="{{route('editBioData',$datas->id)}}"><button class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i>Edit</button></a>
            <a href="{{route('deleteBioData',$datas->id)}}"><button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</button></a></td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
