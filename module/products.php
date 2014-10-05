<?php //-->

class Products extends Eden_Class {
	protected $_database = NULL;
	
	public function __construct(Eden_Sql_Database $database) {
		$this->_database = $database;
	}
	
	public function create($description, $price, $image, $category, $stocks) {
		$this->_database
			->model()
			->setProductDescription($description)
			->setProductImage($image)
			->setPrice($price)
			->setStocks($stocks)
			->setCategory($category)
			->save('products');
		
		return $this;
	}
	
	public function getListByCategory($category = null) {
		if ($category == null) {
			return $this->_database
				->search('products')
				->getRows();
		}
		else {
			return $this->_database
				->search('products')
				->addFilter('category = "'.$category.'"')
				->getRows();
		}
	}

	public function getDetail($id) {
		return $this->_database->getRow('products', 'product_id', $id);
	}
	
	public function update($id, $description, $price, $stocks, $image = null) {
		if ($image == null) {
			$this->_database
				->model()
				->setProductId($id)
				->setProductDescription($description)
				->setPrice($price)
				->setStocks($stocks)
				->save('products');
		}
		else {
			$this->_database
				->model()
				->setProductId($id)
				->setProductDescription($description)
				->setStock($stocks)
				->setPrice($price)
				->setProductImage($image)
				->save('products');
		}
		
		return $this;
	}
	
	public function remove($id) {
		$this->_database
			->model()
			->setProductId($id)
			->remove('products');
	}
}