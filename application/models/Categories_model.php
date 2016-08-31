<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories_model extends CI_Model {

    public function __construct() {
        parent::__construct();

        // 独自処理
    }


    public function getCategories() {
        $sql = 'SELECT * FROM categories';
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

    public function setCategory($params){
        $sql = $this->db->insert_string('categories', $params);
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
