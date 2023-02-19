@extends('stdview.layout')
@section('content')
<div id="main-content" class="container allContent-section py-4">
    <h1 class="h3 mb-4 text-gray-800">Start Asm</h1>
    <div class="card">
        <div class="card-header">
            Title : {{ $asm->title }}
        </div>
        <div class="card-body">
            <div class="card-text"><span class="card-title">Description : </span> <span>{{ $asm->description }}</span></div>
            @if($asm->file_name)
            <p>File task : <a href="{{ route('asm.downloadFile',['asm_id' => $asm->id ]) }}"> {{ $asm->file_name }} </a> </p>
            @endif
            <form action="{{ route('asm.doneAsm',['asm_id' => $asm->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3">
                    <label for="description">Submit</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
                </div>
                <button type="submit" class="btn btn-primary">Done !</button>
            </form>
        </div>
    </div>
</div>
@endsection