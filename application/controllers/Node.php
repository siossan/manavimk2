<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Node extends MY_Controller
{

    public function index()
    {
        // Set smarty template.
        // applicatoin/views/templates/...
        $this->load->model('Nodes_model', '', TRUE);
        $nodes = $this->Nodes_model->getStartNode();
        $this->smarty->assign('nodes', $nodes);

        $this->view('node/index');
    }

    public function add()
    {
        $this->view('node/add');
    }

    public function send()
    {
        $this->load->model('Nodes_model', '', TRUE);
        $node = $this->Nodes_model->getNodeWithRoadIdById(1);
        $roads = array();
        $roadFlg = FALSE;
        foreach ($node as $k => $v) {
            if ($k == 0) {
                if (!empty($v['road_id'])) {
                    $roadFlg = TRUE;
                } else {
                    break;
                }
            }
            $roads[] = array('road_id' => $v['road_id'], 'degree' => $v['degree'], 'image' => $v['image']);
        }

        $this->smarty->assign('node', $node[0]);
        $this->smarty->assign('roads', $roads);

        $this->smarty->assign('road_flg', $roadFlg);

        $this->view('node/send');
    }

}
