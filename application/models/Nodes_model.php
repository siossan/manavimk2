<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nodes_model extends CI_Model {

    public function __construct() {
        parent::__construct();

        // 独自処理
    }

    public function getNodeById($id) {
        $sql = 'SELECT * FROM nodes n 
                WHERE n.node_id = '. $id;
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


    public function getNodeWithRoadIdById($nodeId) {
        $sql = 'SELECT * FROM nodes n 
                LEFT JOIN roads r ON r.start_node_id = n.node_id
                WHERE n.node_id = '.$nodeId;
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

    public function getStartNode() {
        $sql = 'SELECT * FROM nodes n 
                WHERE n.start_flg = 1';
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


    public function getNodesByCategoryId($cId) {
        $sql = 'SELECT * FROM nodes n 
                WHERE n.category_id = '. $cId;
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

    public function setStartNode($params){
        $sql = $this->db->insert_string('nodes', $params);
        if ($this->db->query($sql)) {
            // 成功処理
            return true;
        } else {
            // 失敗処理
            return false;
        }
    }


    public function updateNode($id, $params){
        $sql = $this->db->where('node_id', $id);
        if ($this->db->update('nodes', $params)) {
            // 成功処理
            return true;
        } else {
            // 失敗処理
            return false;
        }
    }

}

?>
