<?php

namespace App\Http\Controllers;

use App\Models\challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public $challenge;
     public function __construct(challenge $challenge)
    {
        $this->challenge = $challenge;
    }

    public function index()
    {
        
        $Challenge = $this->challenge->paginate(5);
        return view('stdview.challengeView',compact('Challenge'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stdview.challengeCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr_challenge = array(
            'topic' => $request->title,
            'description' => $request->description,
            'hint' => $request->hint
        );
        $this->challenge->create($arr_challenge);
        return redirect()->route('challenge.index')->with('message','Add success !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $challenge = $this->challenge->where('id',$id)->first();
        $checkUserDone = DB::table('user_challenge')->where('challenge_id',$challenge->id)->where('user_id',Auth::user()->id)->first();
        if($checkUserDone){
            return redirect()->route('challenge.index');
        }else{
            $challenge->user()->attach(Auth::user()->id);
            return view('stdview.challengeSingle',compact('challenge'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function edit($challenge)
    {
        $challenge_item = $this->challenge->find($challenge);
        return view('stdview.challengeEdit',compact('challenge_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $challenge)
    {
        $arr = array(
            'title' => $request->title,
            'description' => $request->description
        );
        $this->challenge->find($challenge)->update($arr);
        $item_update = $this->challenge->find($challenge);
        return redirect()->route('challenge.index')->with('message','Update success  "'.$item_update->name.'"');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function destroy($challenge)
    {
        $this->challenge->find($challenge)->delete();
        return redirect()->route('challenge.index')->with('Delete success !');
    }

    public function userDone(Request $request)
    {
        $challenge_item = $this->challenge->where('id',$request->challenge_id)->first();
        $users = $challenge_item->user()->paginate(5);
        
        return view('stdview.challengeUserDone',compact('challenge_item','users'));;
    }

    public function donechallenge(Request $request)
    {
        $checkUserDone = DB::table('user_challenge')->where('challenge_id',$request->challenge_id)->where('user_id',Auth::user()->id)->first();
        if($checkUserDone){
            DB::table('user_challenge')->where('challenge_id',$request->challenge_id)->where('user_id',Auth::user()->id)->update(['answer' => $request->answer]);
        }
        return redirect()->route('challenge.index')->with('message','Update success');
    }

}
