<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Road extends MY_Controller {

	public function index()
	{
		// Set smarty template.
		// applicatoin/views/templates/...

		$this->view('road/welcome_message');
	}

	public function add()
    {

        $this->view('road/add');
    }
    public function send()
    {
        $this->load->model('Roads_model', '', TRUE);
        $road = $this->Roads_model->getRoadById(1);
        $this->smarty->assign('road', $road[0]);
        $this->view('road/send');
    }

}
