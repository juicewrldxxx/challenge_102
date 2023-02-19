<?php

namespace App\Http\Controllers;

use App\Models\Asm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class asmController extends Controller
{
    public $asm;
    public function __construct(Asm $asm)
    {
        $this->asm = $asm;
    }
    public function index()
    {
        $asms = $this->asm->paginate(5);
        return view('stdview.asmView',compact('asms'));
    }
    public function create()
    {
        return view('stdview.asmCreate');
    }
    public function store(Request $request)
    {
        $arr_asm = array(
            'title' => $request->title,
            'description' => $request->description
        );

        if($request->hasFile('file')){
            $origin_name = $request->file('file')->getClientOriginalName();
            $name_file = Str::random(20).'.'.$request->file('file')->extension();
            $request->file('file')->storeAs('public/files/asm',$name_file);
            $arr_asm['file_name'] = $origin_name;
            $arr_asm['file_name_hash'] = $name_file;
        }

        $this->asm->create($arr_asm);
        return redirect()->route('asm.index')->with('message','Add success !');
    }
    public function show($id)
    {
        $asm = $this->asm->where('id',$id)->first();
        $checkUserDone = DB::table('user_asm')->where('asm_id',$asm->id)->where('user_id',Auth::user()->id)->first();
        if($checkUserDone){
            return redirect()->route('asm.index');
        }else{
            $asm->user()->attach(Auth::user()->id);
            return view('stdview.asmSingle',compact('asm'));
        }
    }

   
    public function edit(Request $request)
    {
        $asm_item = $this->asm->find($request->asm);
        return view('stdview.asmEdit',compact('asm_item'));
    }


    public function update(Request $request, $asm)
    {
        $arr = array(
            'title' => $request->title,
            'description' => $request->description
        );
        if($request->hasFile('file')){
            $origin_name = $request->file('file')->getClientOriginalName();
            $name_file = Str::random(20).'.'.$request->file('file')->extension();
            $request->file('file')->storeAs('public/files/asm',$name_file);
            $arr['file_name'] = $origin_name;
            $arr['file_name_hash'] = $name_file;
        }
        $this->asm->find($asm)->update($arr);
        $item_update = $this->asm->find($asm);
        return redirect()->route('asm.index')->with('message','Update success  "'.$item_update->name.'"');
    }

    public function downloadFile(Request $request)
    {
        $asm_item = $this->asm->where('id',$request->asm_id)->first();
        $destination = storage_path('app/public/files/asm/' . $asm_item->file_name_hash);
        return response()->download($destination);
    }
    
    public function destroy(Request $request)
    {
        $this->asm->find($request->asm)->delete();
        return redirect()->route('asm.index')->with('Delete success !');
    }

    public function doneAsm(Request $request)
    {
        $checkUserDone = DB::table('user_asm')->where('asm_id',$request->asm_id)->where('user_id',Auth::user()->id)->first();
        if($checkUserDone){
            $arr_asm = [];
            if($request->hasFile('file')){
                $origin_name = $request->file('file')->getClientOriginalName();
                $name_file = Str::random(20).'.'.$request->file('file')->extension();
                $request->file('file')->storeAs('public/files/asm',$name_file);
                $arr_asm['file_name'] = $origin_name;
                $arr_asm['file_name_hash'] = $name_file;
                DB::table('user_asm')->where('asm_id',$request->asm_id)->where('user_id',Auth::user()->id)->update($arr_asm);
            }
        }
        return redirect()->route('asm.index')->with('message','Update success');
    }
    public function userDone(Request $request)
    {
        $asm_item = $this->asm->where('id',$request->asm_id)->first();
        $users = $asm_item->user()->paginate(5);
        
        return view('stdview.asmUserDone',compact('asm_item','users'));;
    }
    public function handleMark(Request $request)
    {
        DB::table('user_asm')->where('asm_id',$request->asm_id)->where('user_id',$request->user_id)->update(['mark' => $request->mark]);
        return back();
    }
}
