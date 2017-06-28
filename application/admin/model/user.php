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
 *                                            Date: 2017/6/9
 *                                             Time: 19:54
 *                                              User: 清晨
 *
 */

namespace app\admin\model;


use think\Db;
use think\Model;

class user extends Model
{
    //protected $table='cs_user';
    public function getUserList(){
        $list=Db::table('cs_user')->where('id','gt',0)->select();
        return $list;
    }

    public function getUser($data){
        $user=Db::table('cs_user')->where($data)->find();
        if ($user){
            return $user;
        }else{
            return false;
        }
    }
}