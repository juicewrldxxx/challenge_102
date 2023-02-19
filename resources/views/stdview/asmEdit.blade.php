@extends('stdview.layout')
@section('content')
<div id="main-content" class="container allContent-section py-4">
  <h1 class="h3 mb-4 text-gray-800">Edit Asm</h1>
  <form action="{{ route('asm.update',[ 'asm' => $asm_item->id ]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="InputName">Name </label>
      <input type="text" class="form-control" id="InputName" placeholder="Enter Name" name="title" value="{{ $asm_item->title }}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" value="{{ $asm_item->description }}">
    </div> 
    @if($asm_item->file_name)
      <p>File choosed : <a href="{{ route('asm.downloadFile',['asm_id' => $asm_item->id ]) }}"> {{ $asm_item->file_name }} </a> </p>
    @endif
    <div class="form-group">
      <label for="description">File</label>
      <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    </div>
@endsection