@extends('stdview.layout')
@section('content')
<div id="main-content" class="container allContent-section py-4">
  <h1 class="h3 mb-4 text-gray-800">Edit Challenge</h1>
  <form action="{{ route('challenge.update',[ 'challenge' => $challenge_item->id ]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="InputName">Name </label>
      <input type="text" class="form-control" id="InputName" placeholder="Enter Name" name="title" value="{{ $challenge_item->title }}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" value="{{ $challenge_item->description }}">
    </div> 
    @if($challenge_item->file_name)
      <p>File choosed : <a href="{{ route('asm.downloadFile',['asm_id' => $challenge_item->id ]) }}"> {{ $challenge_item->file_name }} </a> </p>
    @endif
    <div class="form-group">
      <label for="description">Hint</label>
      <input type="text" class="form-control" id="hint" placeholder="Enter hint" name="hint" value="{{ $challenge_item->hint }}">
    </div>
    <div class="form-group">
    <form method="post" action="{{ route('challenge.create') }}" enctype="multipart/form-data">
    <label for="txt_file">Upload txt file:</label>
    <input type="file" name="txt_file" id="txt_file"><br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    </div>
@endsection