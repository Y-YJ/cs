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
 *                                             Time: 16:13
 *                                              User: 清晨
 *
 */

namespace app\admin\controller;


use think\Request;

class Product extends Base
{
    public function product_list()
    {
        $product=new \app\admin\model\product();
        $list=$product->get_product_list();
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function product_add()
    {
        if (Request::instance()->isPost()){
            $name=input('post.name');
            $tiao=input('post.tiao');
            $num=input('post.num');
            $price=input('post.price');
            $product=new \app\admin\model\product();
            $data=[
                'name'=>$name,
                'tiao'=>$tiao,
                'num'=>$num,
                'price'=>$price
            ];
            $product->add_product($data);
        }
        return $this->fetch();
    }

    public function product_sale(){
        if (Request::instance()->isPost()){
            $tiao=input('post.tiao');
            $product=new \app\admin\model\product();
            //echo $tiao;
            if ($product->sale_product($tiao)){
                $ret['status']=1;
                return json($ret);
            }else{
                $ret['status']=2;
                return json($ret);
            }
        }
        return $this->fetch();
    }



}