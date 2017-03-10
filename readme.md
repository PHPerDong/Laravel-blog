# Larval 5.2 Rbac 后台实例

## 说明

基于laravel 5.2 与 zizaco/entrust 权限管理
开箱即用的后台模板.面包线,菜单栏都是基于权限来生成
###### 本项目建议只用来做参考

## 截图
![image](http://github.com/PHPerDong/Laravel-blog/raw/master/public/img/1489129776(1).jpg)




## 安装

- git clone 到本地
- 执行 `composer install` (如果出现数据库方面的错误提示,请将 database/seeds/rbac.sql 先导入你创建的数据库)
- 配置 **.env** 中数据库连接信息,没有.env请复制.env.example命名为.env
- 执行 `php artisan key:generate`
- 默认后台账号:root 密码:123456




