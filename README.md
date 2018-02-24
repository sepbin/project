# 说明

这是一个sepbin框架的空项目，如果您要开始使用sepbin，那么请下载此资源的zip包

# 安装

##1,解压到您的网站根目录

解压后，在您的网站目录中看起来是这样
```
-my_web_root(您的根目录名称)
----|-----application
----|-----config
----|-----data
----|-----lib
----|-----public
----|-----tests
----|-----vendor
```

##2,安装sepbin框架

打开控制台，进入到您的网站根目录

```
cd /var/www/您的目录
composer install
```


##3,指定根目录为 public

因为 index.php 入口文件在public目录


# nginx 们请注意

```
location ~ \.php$ {
		include snippets/fastcgi-php.conf;
	
		# With php-fpm (or other unix sockets):
		fastcgi_pass unix:/run/php/php7.1-fpm.sock;
		#fastcgi_index index.php;
		# With php-cgi (or other tcp sockets):
		# fastcgi_pass 127.0.0.1:9000;
}
```

默认配置的 .php后面有个钱币符号，一定要删除那个钱币符号，只要删除钱币符号sepbin就可以用PHPINFO的方式成功路由了。
因为sepbin并没有使用PHP_INFO变量，因此不必让您的nginx支持PHP_INFO；
  
