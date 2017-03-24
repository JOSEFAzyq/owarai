OwaraiClub BBS Project
===

@Author J

Description:
---
>>	A simple website with samurai heart

>>	框架:Laravel5.4,php>=5.59

>>	组件:bootstrap,velocity,font-awesome,jquery,ckeditor

How to start:
---
*	复制.env文件,并根据自身环境修改参数,最好在本地创建owarai数据库
*	执行`composer install -vv`
*	执行`php artisan key:generate`
*	执行`php artisan serve`,通过127.0.0.1:8000或者通过本地环境/owarai/public进入项目
*	合作开发:驼峰命名,注释代码,业务逻辑写在model里.禁止在控制器中写业务逻辑
*	执行`php artisan migrate`可以创建数据结构.
*	执行`php artisan db:seed --class=OwaraiSeeder`可以填充测试数据

Schedule:
---
####	2017/03/09

Project start and working on front-end rebuild by a phper@J
	
####	2017/03/10

开始填充内容到网页中
截止到晚上12点细节弄的差不多了 大概还有1个小时的工作量.. 明天继续

####	2017/03/13

导航条动画+遮蔽罩.换了ckeditor的编辑器,后台模板用的sb-admin2


####	2017/03/14
环境搭建,自动创建数据库结构..自动填充数据..

####	2017/03/15
文章发布基本搞定.数据库结构还得变动

####	2017/03/19
架构思想稍微变了一点点,引入datatables中..
