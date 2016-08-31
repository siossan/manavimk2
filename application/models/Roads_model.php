<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Roads_model extends CI_Model {

    public function __construct() {
        parent::__construct();

        // 独自処理
    }


    public function getRoadById($id) {
        $sql = 'SELECT * FROM roads WHERE road_id = '.$id;
        $query = $this->db->query($sql);
        if ($this->db->query($sql)) {
            // 成功処理
            $result = $query->result('array');
            return $result;
        } else {
            // 失敗処理
            return false;
        }
    }

    public function getRoadsByNodeId($nId) {
        $sql = 'SELECT * FROM roads WHERE start_node_id = '.$nId;
        $query = $this->db->query($sql);
        if ($this->db->query($sql)) {
            // 成功処理
            $result = $query->result('array');
            return $result;
        } else {
            // 失敗処理
            return false;
        }
    }

    public function updateRoad($id, $params){
        $sql = $this->db->where('road_id', $id);
        if ($this->db->update('roads', $params)) {
            // 成功処理
            return true;
        } else {
            // 失敗処理
            return false;
        }
    }

    public function setRoad($params){
        $sql = $this->db->insert_string('roads', $params);
        if ($this->db->query($sql)) {
            // 成功処理
            return true;
        } else {
            // 失敗処理
            return false;
        }
    }

}

?>
