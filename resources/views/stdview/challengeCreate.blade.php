@extends('stdview.layout')
@section('content')
<div id="main-content" class="container allContent-section py-4">
  <h1 class="h3 mb-4 text-gray-800">Create Challenge</h1>
  <form action="{{ route('challenge.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="InputName">Name </label>
      <input type="text" class="form-control" id="InputName" placeholder="Enter Name" name="title">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" id="description" placeholder="Enter description" name="description">
    </div>
    <div class="form-group">
      <label for="description">Hint</label>
      <input type="text" class="form-control" id="hint" placeholder="Enter hint" name="hint">
    </div>

    <!-- <form method="post" action="{{ route('challenge.createChallenge') }}" enctype="multipart/form-data" name = "create challenge">
    @csrf -->
    <label for="txt_file">Upload txt file:</label>
    <input type="file" name="file" id="txt_file"><br>
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection