bbs_test
========

a simple messageboard

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
        ) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

3. login页面用户名为admin， 密码为php
