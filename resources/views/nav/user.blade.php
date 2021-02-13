@extends('layouts.admin')

@section('content')
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data_user as $user)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$user->id}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      </tr>
    @endforeach  
  </tbody>
</table>
</div>
@endsection