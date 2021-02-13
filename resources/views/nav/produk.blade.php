@extends('layouts.admin')

@section('content')

<div class="container">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
<button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#staticBackdrop">
  Tambah Produk
</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Harga</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Category</th>
      <th scope="col">image</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data_produk as $produk)
  <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$produk->name}}</td>
      <td>Rp. {{number_format($produk->harga)}},-</td>
      <td>{{$produk->deskripsi}}</td>
      <td>{{$produk->category_id}}</td>
      <td>{{$produk->image}}</td>
      <td>
        <a class="btn btn-warning">Update</a>
        <a class="btn btn-danger">Delete</a>
      </td>
  </tr>
  @endforeach
  </tbody>
</table>
</div>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="post" action="{{route('produk')}}" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" class="form-control" name="name" required placeholder="Nama Produk">
                  </div>
                  <div class="row">
                  <div class="form-group col-md-6">
                    <label >Harga</label>
                    <input type="text" class="form-control" name="harga" required placeholder="Harga">
                  </div>
                  <div class="form-group col-md-6">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                          <option value="1">category 1</option>
                          <option value="2">category 2</option>
                          <option value="3">category 3</option>
                          <option value="4">category 4</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" rows="3" placeholder="Deskripsi ..." name="deskripsi"></textarea>
                      </div>
                  <div class="form-group">
                    <label >File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input"  name="image">
                        <label class="custom-file-label" >Choose file</label>
                      </div>
                    </div>
                  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">submit</button>
      </div>
              </form>
    </div>
  </div>
</div>
@endsection