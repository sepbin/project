<?php
namespace SepApp\Application\Index;

use Sepbin\System\Frame\Model;
use Sepbin\System\Frame\Mvc\AbsMvcController;

class IndexController extends AbsMvcController
{
	
	//$my_param 是我们在路由规则中设置的变量
	//POST和GET变量同样可以通过参数传递，只要设置同名参数，还可以设置默认值，如 $my_param='1'
	public function indexAction( string $my_param ){
		
		$model = new Model();
		$model->my_param = $my_param;
		return $model;
		
	}
	
}
