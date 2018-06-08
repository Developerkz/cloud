<?php
class AdminOrderController{
	public function methodList(){

		if(!isset($_SESSION["admin"])){
			header('Location:/admin');
		}


		$get = array();
		$get = Order::getOrders();
		include_once(D.'backend/OrderList.php');
		return true;
	}
	public function methodPay($id){

		if(!isset($_SESSION["admin"])){
			header('Location:/admin');
		}

		
		$get = Order::updateOrder($id);
		header("Location:/admin/order-list");
		return true;
	}
}
?>