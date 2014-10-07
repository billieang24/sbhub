<?php //-->

class Feedbacks extends Eden_Class {
	protected $_database = NULL;
	
	public function __construct(Eden_Sql_Database $database) {
		$this->_database = $database;
	}
	
	public function create($image) {
		$this->_database
			->model()
			->setFeedbacksImage($image)
			->save('feedbacks');
		
		return $this;
	}
	
	public function getList() {
			return $this->_database
				->search('feedbacks')
				->getRows();
	}

	// public function getDetail($id) {
	// 	return $this->_database->getRow('bogusbuyers', 'bogusbuyer_id', $id);
	// }
	
	// public function update($id, $description, $price, $stocks, $image = null) {
	// 	if ($image == null) {
	// 		$this->_database
	// 			->model()
	// 			->setProductId($id)
	// 			->setProductDescription($description)
	// 			->setPrice($price)
	// 			->setStocks($stocks)
	// 			->save('products');
	// 	}
	// 	else {
	// 		$this->_database
	// 			->model()
	// 			->setProductId($id)
	// 			->setProductDescription($description)
	// 			->setStock($stocks)
	// 			->setPrice($price)
	// 			->setProductImage($image)
	// 			->save('products');
	// 	}
		
	// 	return $this;
	// }
	
// 	public function remove($id) {
// 		$this->_database
// 			->model()
// 			->setProductId($id)
// 			->remove('products');
// 	}
}