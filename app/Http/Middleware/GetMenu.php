<?php

namespace App\Http\Middleware;

use Closure;
use Auth,Cache;
class GetMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        view()->share('menuData',$this->getMenu());
        return $next($request);
    }

    protected function getMenu(){
        //查找出所有的地址
        $permissions = Cache::remember('permission:',60,function(){
            $permissions = \App\Model\Permission::orderBy('sort', 'asc')->orderBy('id', 'asc')->get();
            return $permissions = self::recursion_children($permissions);
        });
        //dd($permissions);
        return $permissions;
    }

    public static function recursion_children($arr,$id=0){
        $data=array();
        foreach($arr as $k=>$v){
            if($v['fid']==$id){
                $v['child']=self::recursion_children($arr,$v['id']);
                $data[]=$v;
            }
        }
        return $data;
    }

}
