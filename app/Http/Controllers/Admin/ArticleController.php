<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Label,App\Model\Article;

class ArticleController extends BaseController
{
    //
    public function index(){
        $article = Article::orderBy('id','desc')->with('labels')->get();
        return view('admin.article.article',compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $label = Label::orderBy('id','desc')->get();
        return view('admin.article.create',compact('label'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $label = $data['label_id'];
        unset($data['label_id']);
        $article = Article::create($data);
        foreach($label as $v){
            $article->labels()->attach($v,[
                'name'=> '测试'
            ]);
        }
        return response()->json(array('accessGranted'=>1));
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





}
