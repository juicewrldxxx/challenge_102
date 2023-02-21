@extends('stdview.layout')
@section('content')
<div id="main-content" class="container allContent-section py-4">
    <h5>Task : {{ $challenge_item->topic }}</h5>
    <div class="w-100">
        <div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Answer</th>

                    </tr>
                </thead>
                <tbody>
                    @if (isset($users))
                    @foreach ($users as $key => $user)
                    @php
                        $user_challenge = DB::table('user_challenge')->where('user_id',$user->id)->where('challenge_id',$challenge_item->id)->first();
                    @endphp 
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->username }} </td>
                        <td>{{ $user_challenge->answer ? $user_challenge->answer : "not answer yet" }} </td>
                    </tr>
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