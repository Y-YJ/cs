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

class auth extends Model
{
    //protected $table='cs_auth';
    public function getAuthList(){
        $list=Db::table('cs_auth')->where('id','gt',0)->select();
        return $list;
    }

    public function getAuth($id){
        $auth=Db::table('cs_auth')->where('id',$id)->find();
        return $auth;
    }

    public function uploadAuth($id,$data){
        if (Db::table('cs_auth')->where('id',$id)->update($data)){
            return true;
        }else{
            return false;
        }
    }
    public function delAuth($id){
        if (Db::table('cs_auth')->where('id',$id)->delete()){
            return true;
        }else{
            return false;
        }
    }



}