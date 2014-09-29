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
	protected $_class = 'admin';
	protected $_template = '/admin.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		if (!isset($_SESSION['admin'])){
			header('Location: login');
		}
		if (isset($_GET['logout'])){
			session_destroy();
			header('Location: login');
		}
		return $this->_page();
	}	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}