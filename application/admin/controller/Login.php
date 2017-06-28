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
 *                                             Time: 19:51
 *                                              User: 清晨
 *
 */

namespace app\admin\controller;


use app\admin\model\user;
use think\Controller;
use think\Request;

class Login extends Controller
{
    /**
     *
     * @return mixed
     */
    public function login()
    {
        if (session('user_name') != null) {
            return $this->fetch('index/index');
        } else if (Request::instance()->isPost()) {
            $name = input('post.name');
            $password =md5(input('post.password'));
            $user = new user();
            $my_user = $user->getUser(['name' => $name]);
            if (!$my_user) {
                $this->error('用户不存在！', '');
            }
            if ($my_user['password'] == $password) {
                session('user_name', $my_user['name']);
                session('user_id', $my_user['id']);
                return $this->fetch('index/index');
            } else {
                $this->error('登录失败', '');
            }
        }
        return $this->fetch();
    }

    public function login_out()
    {
        session('user_name', null);
        session('user_id', null);
        if (session('user_name') != null) {
            return $this->fetch('index/index');
        } else if (Request::instance()->isPost()) {
            $name = input('post.name');
            $password = input('post.password');
            $user = new user();
            $my_user = $user->getUser(['name' => $name]);
            if ($my_user['password'] == $password) {
                session('user_name', $my_user['name']);
                session('user_id', $my_user['id']);
                return $this->fetch('index/index');
            } else {
                $this->error('登录失败', '');
            }
        }
        return $this->fetch('login');
    }

}