<?php

namespace App\Presenters;

use App\Repositories\PermissionRepositoryEloquent;
use App\Transformers\PermissionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;
use Route,Auth;

/**
 * Class PermissionPresenter
 *
 * @package namespace App\Presenters;
 */
class PermissionPresenter extends FractalPresenter
{
    protected $permission;

    public function __construct(PermissionRepositoryEloquent $permission)
    {
        $this->permission = $permission;
    }


    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PermissionTransformer();
    }

    /**
     * top permission select
     * @param int $fid
     * @return string
     */
    public function topPermissionSelect($fid = 0)
    {
        $tops = $this->permission->topPermissions();
        //dd($this->array2level($tops));
        $admin_menu_level_list = $this->array2level($tops);
        $select = '<select class="form-control input-sm" name="fid" id="sboxit-1">';
        $select .= '<option value="0" selected="selected" >--顶级权限--</option>';
        if($admin_menu_level_list) {
            foreach ($admin_menu_level_list as $top) {
                if($top->fid == $fid) {
                    $select .= '<option  value="' . $top->id . '" >' . '|-' .$top->display_name . '[' . $top->name . ']</option>';
                } elseif($top->fid != $fid) {
                    $select .= '<option  value="' . $top->id . '">' . '|';
                    for($i=1;$i<$top->level;$i++){ $select .= "---";}
                    $select .= $top->display_name.'[' . $top->name . ']</option>';
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
            if ($v['fid'] == $pid) {
                $v['level'] = $level;
                $list[]     = $v;
                $this->array2level($array, $v['id'], $level + 1);
            }
        }

        return $list;
    }


    /**
     * 用户根据权限可见的菜单
     * @return string
     */
    public function menus()
    {
        return $menus = $this->permission->menus();
        $html = '';
        if($menus) {
            foreach ($menus as $menu) {
                /*if(($menu['name'] !== '#') && !Route::has($menu['name'])) {
                    continue;
                }*/

                $class = '';
                if(isset($menu['sub'])) {
                    $class .= ' nav-parent';
                }

                if($menu['name'] == Route::currentRouteName()) {
                    $class .= ' active';
                }

                if(!Auth::guard('admin')->user()->is_super && !Auth::guard('admin')->user()->can($menu['name'])){
                    $class .= ' hide';
                }

                $html .= '<li class="' . $class . '">';
                $href = ($menu['name'] == '#') ? '' : route($menu['name']);
                $html .= sprintf('<a class="menu-a" href="%s">%s <span>%s</span></a>', $href, $menu['icon_html'], $menu['display_name']);

                if(!isset($menu['sub'])) {
                    $html .= '</li>';
                    continue;
                }

                $html .= '<ul class="children">';
                foreach ($menu['sub'] as $sub) {

                    if(($sub['name'] !== '#') && !Route::has($sub['name'])) {
                        continue;
                    }
                    $href = ($sub['name'] == '#') ? '#' : route($sub['name']);
                    $icon = $sub['icon_html'] ? $sub['icon_html'] : '<i class="fa fa-caret-right"></i>';

                    if(!Auth::guard('admin')->user()->is_super && !Auth::guard('admin')->user()->can($sub['name'])){
                        $html .= sprintf('<li class="sub-menus hide"><a class="sub-menu-a" href="%s">%s %s</a></li>', $href, $icon, $sub['display_name']);
                    }else{
                        $html .= sprintf('<li class="sub-menus"><a class="sub-menu-a" href="%s">%s %s</a></li>', $href, $icon, $sub['display_name']);
                    }
                }
                $html .= '</ul>';
                $html .= '</li>';


            }
        }

        return $html;
    }
}
