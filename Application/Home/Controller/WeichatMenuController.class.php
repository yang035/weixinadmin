<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/5/28
 * Time: 8:18
 */

namespace Home\Controller;

use Think\Controller;

class WeichatMenuController extends Controller
{
    public function __construct()
    {
        getAccessToken();
    }

    public function index()
    {
//        echo S('WEICHAT_TOKEN');
        $this->display();
    }

    /**
     * 自定义菜单最多包括3个一级菜单，每个一级菜单最多包含5个二级菜单。
     *一级菜单最多4个汉字，二级菜单最多7个汉字，多出来的部分将会以“...”代替
     */
    public function createMenuList()
    {
        $access_token = S('WEICHAT_TOKEN');
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$access_token}";
        $list = $this->getMenuList();
        foreach ($list as $key => $value) {
            unset($list[$key]['id']);
            unset($list[$key]['pid']);
            unset($list[$key]['add_time']);
            unset($list[$key]['update_time']);
            foreach ($value['child'] as $key1 => $val) {
                unset($list[$key]['child'][$key1]['id']);
                unset($list[$key]['child'][$key1]['pid']);
                unset($list[$key]['child'][$key1]['add_time']);
                unset($list[$key]['child'][$key1]['update_time']);
            }
            $list[$key]['sub_button'] = $list[$key]['child'];
            unset($list[$key]['child']);
        }
        $menu['button'] = $list;
        unset($list);
        $list_json = json_encode($menu, JSON_UNESCAPED_UNICODE);
        $result = curlRequest($url, $list_json);
        echo $result;
        exit();
        if (0 == $result['errcode']) {
            $this->success('更新菜单成功');
        } else {
            $this->error('更新菜单失败' . $result['errcode'] . ':' . $result['errmsg']);
        }
        $this->display('menu_list');
    }

    /**
     * @return mixed
     * 获取微信菜单列表
     */
    public function getMenuList()
    {
        $result = D('weixin_menu')->where(array('pid' => 0))->limit(3)->select();
        if ($result) {
            foreach ($result as $key => $val) {
                $result[$key]['child'] = D('weixin_menu')->where(array('pid' => $val['id']))->limit(5)->select();
            }

        } else {
            $this->error('请添加菜单');
        }
        return $result;
    }
}