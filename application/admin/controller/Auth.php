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
 *                                            Date: 2017/6/12
 *                                             Time: 14:33
 *                                              User: 清晨
 *
 */

namespace app\admin\controller;


use think\Request;

class Auth extends Base
{

    public function auth_list()
    {
        $index = new \app\admin\model\auth();
        $list = $index->getAuthList();
        $this->assign('list', $list);
        return $this->fetch();
    }

    /**
     * @return mixed
     */
    public function auth_add()
    {
        if (Request::instance()->isPost()) {
            $name = input('post.auth_name');
            $controller = input('post.controller');
            $action = input('post.action');
            $father_id = input('post.father_id');
            $auth = new \app\admin\model\auth();
            $auth->data([
                'name' => $name,
                'father_id' => $father_id,
                'c' => $controller,
                'a' => $action
            ]);
            $auth->save();
        }
        return $this->fetch();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function auth_upload($id = 0)
    {
        $auth = new \app\admin\model\auth();
        $my_auth = $auth->getAuth($id);
        $this->assign('id', $id);
        $this->assign('auth', $my_auth);
        if (Request::instance()->isPost()) {
            $name = input('post.auth_name');
            $controller = input('post.controller');
            $action = input('post.action');
            $father_id = input('post.father_id');
            $data = [
                'name' => $name,
                'father_id' => $father_id,
                'c' => $controller,
                'a' => $action
            ];
            $auth->uploadAuth($id, $data);
        }
        return $this->fetch();
    }

    public function auth_del()
    {
        if (Request::instance()->isPost()) {
            $id = input('post.id');
            $auth = new \app\admin\model\auth();
            if ($auth->delAuth($id)) {
                $ret['status'] = 1;
                return json($ret);
            } else {
                $ret['status'] = 2;
                return json($ret);
            }
        }
    }
}