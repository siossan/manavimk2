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
        $road = $this->Roads_model->getRoadById($_POST['id']);
        $this->smarty->assign('road', $road[0]);


        $this->load->model('Items_model', '', TRUE);
        $roaditmes = $this->Items_model->getItemsByRoadId($road[0]['road_id']);
        $itemFlg = FALSE;

        if(!empty($roaditmes)){
            $itemFlg = TRUE;

        }else{
            $roaditmes = array();
        }

        log_message('error',print_r($_POST, true));

        $this->smarty->assign('roaditems', $roaditmes);
        $this->smarty->assign('item_flg', $itemFlg);
        header("Content-Type: application/json; charset=utf-8");
        $this->view('road/send');
    }

}
