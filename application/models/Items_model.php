<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Items_model extends CI_Model {

    public function __construct() {
        parent::__construct();

        // 独自処理
    }

    public function getItemById($id) {
        $sql = 'SELECT * FROM items WHERE item_id = '.$id;
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

    public function getItemsByRoadId($roadId) {
        $sql = 'SELECT * FROM items i 
                WHERE i.road_id = '.$roadId;
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
        $sql = $this->db->where('item_id', $id);
        if ($this->db->update('items', $params)) {
            // 成功処理
            return true;
        } else {
            // 失敗処理
            return false;
        }
    }

}

?>
