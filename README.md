# iPreview ![](https://img.shields.io/badge/version-v0.1.1-orange.svg) ![](https://img.shields.io/badge/language-php-brightgreen.svg) ![](https://img.shields.io/badge/database-MySQL-yellow.svg) 


>iPreview是一个可以集中部署以供其他人上传自己的代码包并生成URL供其在其他地方访问的开源平台
## Install
- 下载代码包
- 设置自己的数据库信息，在`./dbHelper.class.php`中
- 在数据库中创建下面的表
```
CREATE TABLE `ip_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(99) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) CHARACTER SET = utf8 COLLATE = utf8_general_ci;
```

## Use
- 进入站点
- 创建账号
- 登录账号
- 上传zip代码包

## Notice
- 目前仅支持zip格式的代码包
- 目前不支持目录浏览
- 目前不支持找回密码和修改密码


## Change Log
#### v0.1.1
- 发布的第一个可用版本
- 支持用户登录、注册功能
- 用户可以上传zip格式代码包

