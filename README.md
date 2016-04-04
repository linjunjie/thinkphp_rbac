# thinkphp_rbac

##ThinkPHP官方RBAC示例的完善版本，基本上是一个傻瓜版本

##支持两个版本系的ThinkPHP:

1. verison[tag] 1.0.0 支持 3.1.x
2. version[tag] 2.0.0 支持 3.2.x

##如果没有.App/Runtime目录，请创建此目录，并确保./App/Runtime目录可读写，我本地的方法为:

sudo chown -R _www:_www Runtime

##安装步骤:

1. 登陆进入本地mysql库(假定用户名密码为默认的root和空):
	mysql -uroot -hlocalhost

2. 执行source {$your_thinkphp_rbac_dir}/rbac.sql

3. 如果没有配置域名的话，可以先直接访问本地http://localhost/thinkphp_rbac

4. 请确保thinkphp_rbac目录的用户和组为_www:_www(请与你所在的安装服务器的webserver用户组保持一致), 否则可能会有对App/runtime目录的读写权限问题