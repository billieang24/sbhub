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
	protected $_class = 'home';
	protected $_template = '/order.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		if (!empty($_POST)) {
			front()->orders()->create($_POST['lname'], $_POST['fname'], $_POST['mi'],
			 $_POST['address'], $_POST['ig'], $_POST['fb'], $_POST['cno'], $_POST['mop'], $_POST['dop']);
			header("Location:\\");
		}
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
