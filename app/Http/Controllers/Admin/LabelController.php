<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Label;

class LabelController extends Controller
{

    //
    public function index(){
        $label = Label::orderBy('id','desc')->paginate(10);
        return view('admin.label.index',compact('label'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        return view('admin.label.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $result = Label::create($request->all());
        if(!$result){
            return response()->json(array('accessGranted'=>0));
        }else{
            return response()->json(array('accessGranted'=>1));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if($id){
            $label = Label::find($id);
        }
        return view('admin.label.show',compact('label'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if($id){
            $label = Label::find($id);
        }
        return view('admin.label.edit',compact('label'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


    }

    public function editLabel(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $result = Label::where('id',$id)->update($data);
        if(!$result){
            return response()->json(array('accessGranted'=>0));
        }else{
            return response()->json(array('accessGranted'=>1));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
    public function delLabel(Request $request){
        $result = Label::where('id',$request->input('id',0))->delete();
        if(!$result){
            return response()->json(array('accessGranted'=>0,'msg'=>'删除失败'));
        }else{
            return response()->json(array('accessGranted'=>1));
        }
    }
}
