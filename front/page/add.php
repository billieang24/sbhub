<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Index extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Style and Beauty Hub';
	protected $_class = 'index';
	protected $_template = '/add.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		if (!isset($_SESSION['admin'])){
			// header('Location:/login');
		}
		if (isset($_FILES['file'])){
			move_uploaded_file($_FILES['file']['tmp_name'], dirname(__FILE__).'/../../web/images/'.$_FILES['file']['name']);
		}
		if (isset($_POST['name'])){
			front()->products()->create($_POST['name'],$_POST['price'],'/images/'.$_FILES['file']['name'],$_POST['category']);
		}
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}