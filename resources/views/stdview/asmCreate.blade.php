@extends('stdview.layout')
@section('content')
<div id="main-content" class="container allContent-section py-4">
  <h1 class="h3 mb-4 text-gray-800">Add Asm</h1>
  <form action="{{ route('asm.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="InputName">Name </label>
      <input type="text" class="form-control" id="InputName" placeholder="Enter Name" name="title" >
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" id="description" placeholder="Enter description" name="description">
    </div>
    <div class="form-group">
      <label for="description">File</label>
      <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    </div>
@endsection