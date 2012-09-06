#zf1-Chat
========

#1. Network Setup
```
vhost
zf1-chat.local

<VirtualHost *:80>
    ServerName zf1-chat.local
    DocumentRoot "C:\xampp\htdocs\zf1-chat\public"

    SetEnv APPLICATION_ENV development

    <Directory "C:\xampp\htdocs\zf1-chat\public">
        Options Indexes FollowSymLinks
        AllowOverride All
        Order deny,allow
        Allow from all
    </Directory> 

    ErrorLog "logs/zf1-chat.local.log"
</VirtualHost>
```
-------------

#2. Composer
In this project i have writed a json file, you use this for download zf1, if you use not composer rewrite autoloader.

-------------

#Chat
This isn't a conventional chat, the refresh isn't automatic, this is a skeleton, for entry in chat is necessary to have a nick name, different
respect and another usernames insert into table.
Next the login you view a page with a input message and you can read the messages from all another user, you can choose numbers of this messages.

#This is a example of Noob Application! :)
-------------
#SQL


CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idu` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;


CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

