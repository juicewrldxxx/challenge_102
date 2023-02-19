@extends('stdview.layout')
@section('content')
<div id="main-content" class="container allContent-section py-4">
    <h5>Task : {{ $asm_item->title }}</h5>
    <div class="w-100">
        <div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">PhoneNumber</th>
                        <th scope="col">File</th>
                        <th scope="col">Mark</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($users))
                    @foreach ($users as $key => $user)
                    @php
                        $user_asm = DB::table('user_asm')->where('user_id',$user->id)->where('asm_id',$asm_item->id)->first();
                    @endphp
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->username }} </td>
                        <td>{{ $user->phoneNumber }}</td>
                        <td>@if($asm_item->file_name)
                            <a href="{{ route('asm.downloadFile',['asm_id' => $asm_item->id ]) }}"> {{ $asm_item->file_name }} </a> 
                            @endif
                        </td>
                        <td>{{ $user_asm->mark == null ? 'not mark' : $user_asm->mark }}</td>
                        <td>
                        
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal{{ $user->id }}">Mark</button>
                           
                        </td>
                    </tr>


                    <div class="modal fade " id="exampleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Mark of  {{ $user->username }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                                </div>
                                <form class="form-inline" style="display:flex;" action="{{ route('asm.handleMark') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" class="form-control mb-3" id="InputName" placeholder="Enter mark" name="mark" >
                                        <input type="text" style="display:none;" name="user_id" value="{{ $user_asm->user_id }}">
                                        <input type="text" style="display:none;" name="asm_id" value="{{ $user_asm->asm_id }}">
                                      
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                    @endforeach
                    @endif
        </div>
        <!-- Button trigger modal -->
        <!-- Modal -->
        </tbody>

        </table>
        <div class="d-block">
            {{ $users->links('pagination::bootstrap-4') }}

        </div>

    </div>
</div>
@endsection