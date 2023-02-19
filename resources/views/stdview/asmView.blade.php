@extends('stdview.layout')
@section('content')

<div id="main-content" class="container allContent-section py-4">
    <div class="w-100">
        <div>
        @if(Auth::user()->role)
        <a href="{{ route('asm.create') }}">
            <button type="button" class="btn btn-danger mb-1">Add +</button>
        </a>
        @endif
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($asms))
                    @foreach ($asms as $key => $asm_item)
                    <tr>
                        <th scope="row">{{ $asm_item->id }}</th>
                        <td>{{ $asm_item->title }} </td>
                        <td>{{ $asm_item->description }}</td>
                        <td>
                            <a href="{{ route('asm.show',['id' => $asm_item->id]) }}">
                                <button type="button" class="btn btn-success" data-toggle="modal">Start</button>
                            </a>
                            @if(Auth::user()->role)
                            <a href="{{ route('asm.userDone',['asm_id' => $asm_item->id]) }}">
                                <button type="button" class="btn btn-info">List user done</button>
                            </a>
                            <a href="{{ route('asm.edit',['asm' => $asm_item->id]) }}">
                                <button type="button" class="btn btn-primary">Update</button>
                            </a>
                            <a href="{{ route('asm.destroy',['asm' => $asm_item->id]) }}">
                                <button type="button" class="btn btn-danger">Delete</button>
                            </a>
                            @endif
                        </td>
                    </tr>
                    <div class="modal fade " id="exampleModal{{ $asm_item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Room chat with </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                                </div>
                                <form class="form-inline" style="display:flex;" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" class="form-control" id="InputName" placeholder="Enter message" name="text">

                                    <button type="submit" class="btn btn-primary">Send</button>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
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
            {{ $asms->links('pagination::bootstrap-4') }}

        </div>

    </div>
</div>
@endsection