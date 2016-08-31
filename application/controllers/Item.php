<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends MY_Controller {

	public function index()
	{
		// Set smarty template.
		// applicatoin/views/templates/...

		$this->view('item/welcome_message');
	}


    public function itemlist($rId)
    {
        // Set smarty template.
        // applicatoin/views/templates/...
        $this->load->model('Items_model', '', TRUE);
        $items = $this->Items_model->getItemsByRoadId($rId);
        $this->smarty->assign('item', $items);
        $this->smarty->assign('road_id', $rId);
        $this->view('item/itemlist');
    }


    public function add()
    {
        //$this->smarty->assign('node_id', $nodeId);
        //$this->smarty->assign('degree', $degree*90);



        // ノードリスト取得
        //$this->load->model('Nodes_model', '', TRUE);
        //$node = $this->Nodes_model->getNodeById($nodeId);
        //$nodes = $this->Nodes_model->getNodesByCategoryId($node[0]['category_id']);
        //$this->smarty->assign('nodes', $nodes);

        $this->view('item/add');
    }

    public function send()
    {
        $id = 1;
        if(!empty($_POST['id'])){
            $id = $_POST['id'];
        }elseif(!empty($_GET['id'])){
            $id = $_GET['id'];
        }

        $this->load->model('Items_model', '', TRUE);
        $item = $this->Items_model->getItemById($id);
        $this->smarty->assign('item', $item[0]);


        $this->load->model('Items_model', '', TRUE);
        $itemitmes = $this->Items_model->getItemsByItemId($item[0]['item_id']);
        $itemFlg = FALSE;

        if(!empty($itemitmes)){
            $itemFlg = TRUE;

        }else{
            $itemitmes = array();
        }

        log_message('error',print_r($_POST, true));

        $this->smarty->assign('itemitems', $itemitmes);
        $this->smarty->assign('item_flg', $itemFlg);
        header("Content-Type: application/json; charset=utf-8");
        $this->view('item/send');
    }

    public function update($id, $nodeId, $degree)
    {
        $this->load->model('Items_model', '', TRUE);
        $item = $this->Items_model->getItemById($id);
        $this->smarty->assign('item', $item[0]);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('node_id', $nodeId);
        $this->smarty->assign('degree', $degree*90);



        // ノードリスト取得
        $this->load->model('Nodes_model', '', TRUE);
        $node = $this->Nodes_model->getNodeById($nodeId);
        $nodes = $this->Nodes_model->getNodesByCategoryId($node[0]['category_id']);
        $this->smarty->assign('nodes', $nodes);

        $this->view('item/update');
    }

    public function updatedata($id, $nodeId, $degree){


        $fileFlg = true;
            if (isset($_FILES['file']['error']) && is_int($_FILES['file']['error'])) {

                try {

                    // $_FILES['file']['error'] の値を確認
                    switch ($_FILES['file']['error']) {
                        case UPLOAD_ERR_OK: // OK
                            break;
                        case UPLOAD_ERR_NO_FILE:   // ファイル未選択
                            throw new RuntimeException('ファイルが選択されていません');
                        case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
                        case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過
                            throw new RuntimeException('ファイルサイズが大きすぎます');
                        default:
                            throw new RuntimeException('その他のエラーが発生しました');
                    }

                    // $_FILES['file']['mime']の値はブラウザ側で偽装可能なので、MIMEタイプを自前でチェックする
                    $type = @exif_imagetype($_FILES['file']['tmp_name']);
                    if ($_FILES["file"]['size'] > 10000000000) {
                        throw new RuntimeException('アップロードファイルのサイズが上限を超えています');
                    }

                    // ファイルを保存する
                    $path = $path = sprintf('./upload/%s', $_FILES['file']['name']);
                    //$path = sprintf('C:\xampp\htdocs\manavimk2\common\files\%s%s', $_FILES['file']['name'], image_type_to_extension($type));
                    if (!move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                        throw new RuntimeException('ファイル保存時にエラーが発生しました');
                    }

                    //$msg = ['green', 'ファイルは正常にアップロードされました'];

                } catch (RuntimeException $e) {
                    $fileFlg = false;
                    //$msg = ['red', $e->getMessage()];

                }
            }

        $imageFlg = true;
        if (isset($_FILES['image']['error']) && is_int($_FILES['image']['error'])) {

            try {

                // $_FILES['image']['error'] の値を確認
                switch ($_FILES['image']['error']) {
                    case UPLOAD_ERR_OK: // OK
                        break;
                    case UPLOAD_ERR_NO_FILE:   // ファイル未選択
                        throOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
                    case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過
                        throw new RuntimeException('ファイルサイズが大きすぎます');
                    default:
                        throw new RuntimeException('その他のエラーが発生しました');
                }


                // ファイルデータからSHA-1ハッシュを取ってファイル名を決定し、ファイルを保存する
                $path = $path = sprintf('./upload/%s', $_FILES['image']['name']);
                //$path = sprintf('C:\xampp\htdocs\manavimk2\common\files\%s%s', $_FILES['image']['name'], image_type_to_extension($type));
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
                    throw new RuntimeException('ファイル保存時にエラーが発生しました');
                }

                //$msg = ['green', 'ファイルは正常にアップロードされました'];

            } catch (RuntimeException $e) {
                $imageFlg = false;
                //$msg = ['red', $e->getMessage()];

            }
        }

        $params = array(
            'title' => $_POST['title'],
            'detail' => $_POST['detail'],
            'start_node_id' => $nodeId,
            'end_node_id' => $_POST['end_node_id'],
            'degree' => $degree,
            'type' => 'node'
        );
        if($fileFlg == true && $_FILES['file']['size'] > 0){
            $params['file'] = $_FILES['file']['name'];
        }
        if($imageFlg == true && $_FILES['image']['size'] > 0){
            $params['image'] = $_FILES['image']['name'];
        }
        $this->load->model('Items_model', '', TRUE);
        $this->Items_model->updateItem($id, $params);
        $this->view('item/updateaccept');
    }

    public function adddata($nodeId, $degree){


        $fileFlg = true;
        if (isset($_FILES['file']['error']) && is_int($_FILES['file']['error'])) {

            try {

                // $_FILES['file']['error'] の値を確認
                switch ($_FILES['file']['error']) {
                    case UPLOAD_ERR_OK: // OK
                        break;
                    case UPLOAD_ERR_NO_FILE:   // ファイル未選択
                        throw new RuntimeException('ファイルが選択されていません');
                    case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
                    case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過
                        throw new RuntimeException('ファイルサイズが大きすぎます');
                    default:
                        throw new RuntimeException('その他のエラーが発生しました');
                }

                // $_FILES['file']['mime']の値はブラウザ側で偽装可能なので、MIMEタイプを自前でチェックする
                $type = @exif_imagetype($_FILES['file']['tmp_name']);
                if ($_FILES["file"]['size'] >10000000000) {
                    throw new RuntimeException('アップロードファイルのサイズが上限を超えています');
                }

                // ファイルデータからSHA-1ハッシュを取ってファイル名を決定し、ファイルを保存する
                $path = sprintf('./upload/%s', $_FILES['file']['name']);
                //$path = sprintf('C:\xampp\htdocs\manavimk2\common\files\%s%s', $_FILES['file']['name'], image_type_to_extension($type));
                if (!move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                    throw new RuntimeException('ファイル保存時にエラーが発生しました');
                }

                //$msg = ['green', 'ファイルは正常にアップロードされました'];

            } catch (RuntimeException $e) {
                $fileFlg = false;
                //$msg = ['red', $e->getMessage()];
                throw new RuntimeException($e->getMessage());
            }
        }

        $imageFlg = true;
        if (isset($_FILES['image']['error']) && is_int($_FILES['image']['error'])) {

            try {

                // $_FILES['image']['error'] の値を確認
                switch ($_FILES['image']['error']) {
                    case UPLOAD_ERR_OK: // OK
                        break;
                    case UPLOAD_ERR_NO_FILE:   // ファイル未選択
                        throw new RuntimeException('ファイルが選択されていません');
                    case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
                    case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過
                        throw new RuntimeException('ファイルサイズが大きすぎます');
                    default:
                        throw new RuntimeException('その他のエラーが発生しました');
                }

                // ファイルデータからSHA-1ハッシュを取ってファイル名を決定し、ファイルを保存する
                $path = sprintf('./upload/%s', $_FILES['image']['name']);
                //$path = sprintf('C:\xampp\htdocs\manavimk2\common\files\%s%s', $_FILES['image']['name'], image_type_to_extension($type));
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
                    throw new RuntimeException('ファイル保存時にエラーが発生しました');
                }

                //$msg = ['green', 'ファイルは正常にアップロードされました'];

            } catch (RuntimeException $e) {
                $imageFlg = false;
                //$msg = ['red', $e->getMessage()];
                throw new RuntimeException($e->getMessage());

            }
        }

        $params = array(
            'title' => $_POST['title'],
            'detail' => $_POST['detail'],
            'start_node_id' => $nodeId,
            'end_node_id' => $_POST['end_node_id'],
            'degree' => $degree,
            'type' => 'node'
        );
        if($fileFlg == true && $_FILES['file']['size'] > 0){
            $params['file'] =  $_FILES['file']['name'];
        }
        if($imageFlg == true && $_FILES['image']['size'] > 0){
            $params['image'] = $_FILES['image']['name'];
        }
        $this->load->model('Items_model', '', TRUE);
        $this->Items_model->setItem($params);
        $this->view('item/addaccept');
    }

}
