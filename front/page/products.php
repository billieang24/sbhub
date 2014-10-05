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
	protected $_template = '/products.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		if (!isset($_SESSION['admin'])) {
			header('Location: login');
		}
		if (isset($_GET['logout'])) {
			session_destroy();
			header('Location: login');
		}
		if (isset($_POST['description'])) {
			if (isset($_FILES['image'])) {
				$item = front()->products()->getDetail($_POST['id']);
				unlink(dirname(__FILE__).'/../../web'.$item['product_image']);
				front()->products()->update($_POST['id'],$_POST['description'], $_POST['price'], $_POST['stocks'], '/images/'.$_FILES['image']['name']."-".str_replace('/tmp/',"",($_FILES['image']['tmp_name'])));
				if (move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__).'/../../web/images/'.$_FILES['image']['name']."-".str_replace('/tmp/',"",($_FILES['image']['tmp_name'])))) {
					return 'true';
				}
			}
			else {
				front()->products()->update($_POST['id'],$_POST['description'], $_POST['price'], $_POST['stocks']);
			}
		}
		else if (isset($_POST['id'])) {
			$item = front()->products()->getDetail($_POST['id']);
			unlink(dirname(__FILE__).'/../../web'.$item['product_image']);
			front()->products()->remove($_POST['id']);
			return $_POST;
		}
		$items = front()->products()->getListByCategory();
		$this->_body = array(
			'items' 	=> 	$items);
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
