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
 *                                            Date: 2017/6/16
 *                                             Time: 18:51
 *                                              User: 清晨
 *
 */

namespace app\admin\model;


use function PHPSTORM_META\elementType;
use think\Db;
use think\Model;

class product extends Model
{
    public function get_product_list(){
        $list=Db::table('cs_product')->where('id','gt',0)->paginate(10);
        return $list;
    }

    public function add_product($data){
        if (Db::table('cs_product')->insert($data)){
            return true;
        }else{
            return false;
        }
    }

    public function sale_product($tiao){
        if ($this->check_sale_state($tiao)){
            Db::table('cs_product')->where('tiao',$tiao)->setDec('num');
            $user_id=session('user_id');
            $product_id=Db::table('cs_product')->where('tiao',$tiao)->value('id');
            $data=[
                'user_id'=>$user_id,
                'product_id'=>$product_id
            ];
            Db::table('cs_sale_log')->insert($data);
            return true;
        }else{
            return false;
        }
    }

    public function check_sale_state($tiao){
        $product=Db::table('cs_product')->where('tiao',$tiao)->find();
        if ($product['num']!=0){
            return true;
        }else{
            return false;
        }
    }
}