<?php
// +----------------------------------------------------------------------
// | Soft [ 简单 高效 卓越 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.soft150.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: jry <598821125@qq.com>
// +----------------------------------------------------------------------

/**
 * 数据库连接配置文件
 */

// 开启开发部署模式
if (@$_SERVER[ENV_PRE.'DEV_MODE'] === 'true') {
    // 数据库配置
    return array(
        'DB_TYPE'   => $_SERVER[ENV_PRE.'DB_TYPE'] ? : 'mysql',       // 数据库类型
        'DB_HOST'   => $_SERVER[ENV_PRE.'DB_HOST'] ? : '127.0.0.1',       // 服务器地址
        'DB_NAME'   => $_SERVER[ENV_PRE.'DB_NAME'] ? : 'cyadmin',       // 数据库名
        'DB_USER'   => $_SERVER[ENV_PRE.'DB_USER'] ? : 'root',       // 用户名
        'DB_PWD'    => $_SERVER[ENV_PRE.'DB_PWD']  ? : 'root',        // 密码
        'DB_PORT'   => $_SERVER[ENV_PRE.'DB_PORT'] ? : '[DB_PORT]',       // 端口
        'DB_PREFIX' => $_SERVER[ENV_PRE.'DB_PREFIX'] ? : 'cy_',   // 数据库表前缀
        'AUTH_KEY'  => 'FhRLG"QJ$vm{)[M[hW?mg~|_tOJHG{k>a<)tY#<jA=sKc(IuM^U)Ak]S+TB@&$H#', // 系统加密KEY，轻易不要修改此项，否则容易造成用户无法登录，如要修改，务必备份原key
    );
} else {
    // 数据库配置
    return array(
        'DB_TYPE'   => 'mysql',       // 数据库类型
        'DB_HOST'   => '127.0.0.1',       // 服务器地址
        'DB_NAME'   => 'cyadmin',       // 数据库名
        'DB_USER'   => 'root',       // 用户名
        'DB_PWD'    => 'root',        // 密码
        'DB_PORT'   => '[DB_PORT]',       // 端口
        'DB_PREFIX' => 'cy_',     // 数据库表前缀
        'AUTH_KEY'  => 'FhRLG"QJ$vm{)[M[hW?mg~|_tOJHG{k>a<)tY#<jA=sKc(IuM^U)Ak]S+TB@&$H#', // 系统加密KEY，轻易不要修改此项，否则容易造成用户无法登录，如要修改，务必备份原key
    );
}



