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
 *                                            Date: 2017/5/16
 *                                             Time: 17:17
 *                                              User: 清晨
 *
 */

namespace app\admin\controller;

class User extends Base
{
    public function user_list(){
        $index = new \app\admin\model\user();
        $list=$index->getUserList();
        $this->assign('list', $list);
        return $this->fetch();
    }

}