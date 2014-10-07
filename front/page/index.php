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
	protected $_template = '/index.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		if (!empty($_POST)){
			if (isset($_POST['id'])){
				if (isset($_SESSION['items'][$_POST['id']])) {
					$_SESSION['items'][$_POST['id']] += $_POST['quantity'];
				}				
				else {
					$_SESSION['items'][$_POST['id']] = $_POST['quantity'];
				}	
			}
			else{
				unset($_SESSION['items'][$_POST['remove']]);
			}
		}
		$bogus = front()->bogusbuyers()->getLimit();
		$this->_body = array(
			'bogus' => 	$bogus);
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}