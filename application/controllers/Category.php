<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

	public function index()
	{
		// Set smarty template.
		// applicatoin/views/templates/...

        $this->load->model('Categories_model', '', TRUE);
        $Categories = $this->Categories_model->getCategories();
        $this->smarty->assign('categories', $Categories);

		$this->view('category/index');
	}

	public function add()
    {

        $this->view('category/add');
    }

}
