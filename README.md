bbs_test
========

a simple messageboard

##Update:
####13-06-10:
1. 实现评论功能。usage：在bbs数据库下新建名为comments的表，具体见comments.sql文件
2. 评论显示页面美化，css更新
3. 撤除login页
4. 通过第三方js表单验证插件 jquery.validate.js，实现首页和评论页的表单验证，主要是内容不能为空，其他无限制

Usage：

1. 在数据库中建立名为bbs的数据库，可利用phpmyadmin
2. 在bbs中建立名为message的表，可利用如下SQL代码：
      
        CREATE TABLE `message` (
        `id` tinyint(1) NOT NULL auto_increment,
        `user` varchar(25) NOT NULL,
        `title` varchar(50) NOT NULL,
        `content` tinytext NOT NULL,
        `lastdate` datetime NOT NULL,
        PRIMARY KEY  (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

3. login页面用户名为admin， 密码为php
