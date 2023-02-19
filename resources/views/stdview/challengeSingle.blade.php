@extends('stdview.layout')
@section('content')
<div id="main-content" class="container allContent-section py-4">
    <h1 class="h3 mb-4 text-gray-800">Start challenge</h1>
    <div class="card">
        <div class="card-header">
            Title : {{ $challenge->topic }}
        </div>
        <div class="card-body">
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Hint</button>
            <div class="card-text"><span class="card-title">Description : </span> <span>{{ $challenge->description }}</span></div>
            <form action="{{ route('challenge.donechallenge',['challenge_id' => $challenge->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="description">Answer</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter Answer" name="answer">
                </div>
                <button type="submit" class="btn btn-primary">Done !</button>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Title : {{ $challenge->hint }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
@endsection