<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;

class CategoryController extends Controller
{

    //
    public function index(){
        $category = Category::orderBy('id','desc')->paginate(10);
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        return view('admin.category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $result = Category::create($request->all());
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
            $category = Category::find($id);
        }
        return view('admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($id){
            $category = Category::find($id);
        }
        return view('admin.category.edit',compact('category'));
    }

    public function editClass(Request $request){
        $data = $request->all();
        $result = Category::where('id',$data['id'])->update($data);
        if(!$result){
            return response()->json(array('accessGranted'=>0));
        }else{
            return response()->json(array('accessGranted'=>1));
        }
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
        dd(1);

    }

    public function delClass(Request $request){
         $result = Category::where('id',$request->input('id',0))->delete();
         if(!$result){
             return response()->json(array('accessGranted'=>0,'msg'=>'删除失败'));
         }else{
             return response()->json(array('accessGranted'=>1));
         }
    }

    public function topCategorySelect($fid = 0)
    {
        if(empty($_GET['pid'])){
            $_GET['pid'] = 0;
        }
        $tops = Category::orderBy('sort', 'asc')->orderBy('id', 'asc')->get();
        $admin_menu_level_list = $this->array2level($tops);
        $select = '<select class="form-control input-sm" name="pid" id="sboxit-1">';
        $select .= '<option value="0" selected="selected" >--顶级--</option>';
        if($admin_menu_level_list) {
            foreach ($admin_menu_level_list as $top) {
                if($top->pid == $fid) {
                    $select .= '<option  value="' . $top->id . '"';
                    if($_GET['pid'] == $top->id){
                        $select .= 'selected="selected"';
                    }
                    $select .= ' >' . '|--' .$top->name . '</option>';
                } elseif($top->pid != $fid) {
                    $select .= '<option  value="' . $top->id . '"';
                    if($_GET['pid'] == $top->id){
                        $select .= 'selected="selected"';
                    }
                    $select .= '>' . '|';
                    for($i=1;$i<$top->level;$i++){ $select .= "----";}
                    $select .= $top->name . '</option>';
                }
            }
        }
        $select .= '</select>';
        return $select;
    }

    /**
     * 数组层级缩进转换
     * @param array $array 源数组
     * @param int   $pid
     * @param int   $level
     * @return array
     */
    public function array2level($array, $pid = 0, $level = 1)
    {
        static $list = [];
        foreach ($array as $v) {
            if ($v['pid'] == $pid) {
                $v['level'] = $level;
                $list[]     = $v;
                $this->array2level($array, $v['id'], $level + 1);
            }
        }
        return $list;
    }

}
