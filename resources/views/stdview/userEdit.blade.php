@extends('stdview.layout')
@section('content')
<div id="main-content" class="container allContent-section py-4">
  <h1 class="h3 mb-4 text-gray-800">Edit User</h1>
  <form action="{{ route('user.update',[ 'user' => $user_item->id ]) }}" method="PUT" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="InputName">User Name </label>
      <input type="text" class="form-control" id="InputName" placeholder="Enter Name" name="username" value="{{ $user_item->username }}">
    </div>
    <div class="form-group">
      <label for="phoneNumber">Phone Number</label>
      <input type="text" class="form-control" id="phoneNumber" placeholder="Enter phoneNumber" name="phoneNumber" value="{{ $user_item->phoneNumber }}">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Role</label>
      <select class="form-control" id="exampleFormControlSelect1" name="role">
        <option value="0" {{ $user_item->role === 0 ? "selected" : "" }}>user</option>
        <option value="1" {{ $user_item->role === 1 ? "selected" : "" }}>admin</option>
      </select>
    </div>

   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    </div>
@endsection