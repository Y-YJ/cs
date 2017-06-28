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
 *                                             Time: 21:49
 *                                              User: 清晨
 *
 */

namespace app\admin\controller;



use think\Request;

class Role extends Base
{
    public function role_list()
    {
        $index = new \app\admin\model\role();
        $list=$index->getRoleList();
        $this->assign('list', $list);
        return $this->fetch();
    }
    public function role_add(){
        if (Request::instance()->isPost()){
            $role_name=input('post.role_name');
            $description=input('post.description');
            $role=new \app\admin\model\role();
            $role->data(['name'=>$role_name,'description'=>$description]);
            $role->save();
        }
        return $this->fetch();
    }
    public function role_upload($id=0){

        return $this->fetch();
    }

}