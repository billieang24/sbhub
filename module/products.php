<?php //-->

class Products extends Eden_Class {
	protected $_database = NULL;
	
	public function __construct(Eden_Sql_Database $database) {
		$this->_database = $database;
	}
	
	public function create($name, $price, $image, $category) {
		$this->_database
			->model()
			->setProductName($name)
			->setProductImage($image)
			->setPrice($price)
			->setCategory($category)
			->save('products');
		
		return $this;
	}
	
	public function getListByCategory($category) {
		return $this->_database
			->search('products')
			->addFilter('category = "'.$category.'"')
			->getRows();
	}

	public function getDetail($id) {
		return $this->_database->getRow('products', 'product_id', $id);
	}

	// public function getDetailByUid($uid) {
	// 	return $this->_database->getRow('user', 'uid', $uid);
	// }
	
	// public function update($id, $name, $email) {
	// 	$this->_database
	// 		->model()
	// 		->setUserId($id)
	// 		->setUserName($name)
	// 		->setUserEmail($email)
	// 		->save('user');
		
	// 	return $this;
	// }
	
	// public function remove($id) {
	// 	$this->_database
	// 		->model()
	// 		->setUserId($id)
	// 		->remove('user');
		
	// 	return $this;
	// }
}