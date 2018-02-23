<?php

use Sepbin\System\Frame\FrameManager;


//------------------------------------------------------
//在用composer安装完框架后可删除
if( !is_dir(__DIR__.'/../vendor') ){

	echo '您还没有使用composer安装框架文件 <br/>';
	echo '请在您的项目根目录('.__DIR__.'/../'.')依次运行命令composer init和composer install';
	return ;	
	
}
//------------------------------------------------------


require '../vendor/sepbin/framework/init.php';

$app = getApp();


/**
*----------------------------------------------------------------------------------
*请注意：
*项目默认开启了调试跟踪信息，在config/application.php 有debug_info = true
*因此页面底部总是有一个信息条出现，如果不需要，设置debug_info为false
*----------------------------------------------------------------------------------
*/




//一个回调函数例子
$app->addRoute('host://',function(){

	dump( '
	<html>
	<body style="margin:0; background:#f2f2f2;">
		<div style="text-align:center; margin-top:100px;">
			<div style="font-size:80px; color:#636b6f">
				Hello,Sepbin
			</div>
			<div style="margin-top:20px;">
				<a href="index.php/use_controller/my_param_set_1">跳转到控制器例子</a>
			</div>
		</div>
	</body>
	</html>
	' );

});


//使用路由委托给FrameManager类，它会调用我们的第一个控制器
//sepbin默认架构是使用FrameManager，当然你可以自定义委托类实现自己的架构
$app->addRoute('host://use_controller/{my_param}', FrameManager::class, ['module'=>'Index','controller'=>'Index','action'=>'index'] );


$app->run();
