<?php
/**
 *                                                 )
 *                                               (  (
 *                                              ) ) )
 *                  ......,.....................)  )
 *                 |.....|..................... ))
 *                                 [[[_________________________________]]]
 *                                         Blog: www.qingchen.red
 *                                          Created by PhpStorm.
 *                                            Date: 2017/6/11
 *                                             Time: 16:46
 *                                              User: 清晨
 *
 */

namespace app\admin\model;


use think\Db;
use think\Model;

class role extends Model
{

    //protected $table='cs_role';

    public function getRoleList(){
        $list=Db::table('cs_role')->where('id','gt',0)->select();
        return $list;
    }
}