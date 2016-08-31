<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Road extends MY_Controller {

	public function index()
	{
		// Set smarty template.
		// applicatoin/views/templates/...

		$this->view('road/welcome_message');
	}


    public function roadlist($nId)
    {
        // Set smarty template.
        // applicatoin/views/templates/...
        $this->load->model('Roads_model', '', TRUE);
        $roads = $this->Roads_model->getRoadsByNodeId($nId);
        $this->smarty->assign('roads', $roads);
        $this->smarty->assign('node_id', $nId);
        $this->view('road/roadlist');
    }


    public function add($nodeId, $degree)
    {
        $this->smarty->assign('node_id', $nodeId);
        $this->smarty->assign('degree', $degree*90);



        // ノードリスト取得
        $this->load->model('Nodes_model', '', TRUE);
        $node = $this->Nodes_model->getNodeById($nodeId);
        $nodes = $this->Nodes_model->getNodesByCategoryId($node[0]['category_id']);
        $this->smarty->assign('nodes', $nodes);

        $this->view('road/add');
    }

    public function send()
    {
        $id = 1;
        if(!empty($_POST['id'])){
            $id = $_POST['id'];
        }elseif(!empty($_GET['id'])){
            $id = $_GET['id'];
        }

        $this->load->model('Roads_model', '', TRUE);
        $road = $this->Roads_model->getRoadById($id);
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

    public function update($id, $nodeId, $degree)
    {
        $this->load->model('Roads_model', '', TRUE);
        $road = $this->Roads_model->getRoadById($id);
        $this->smarty->assign('road', $road[0]);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('node_id', $nodeId);
        $this->smarty->assign('degree', $degree*90);



        // ノードリスト取得
        $this->load->model('Nodes_model', '', TRUE);
        $node = $this->Nodes_model->getNodeById($nodeId);
        $nodes = $this->Nodes_model->getNodesByCategoryId($node[0]['category_id']);
        $this->smarty->assign('nodes', $nodes);

        $this->view('road/update');
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
                    if ($_FILES["file"]['size'] > 500000000) {
                        throw new RuntimeException('アップロードファイルのサイズが上限を超えています');
                    }

                    // ファイルを保存する
                    $path = sprintf('/common/files/%s%s', $_FILES['file']['name'], '.MP4');
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
                        throw new RuntimeException('ファイルが選択されていません');
                    case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
                    case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過
                        throw new RuntimeException('ファイルサイズが大きすぎます');
                    default:
                        throw new RuntimeException('その他のエラーが発生しました');
                }

                // $_FILES['image']['mime']の値はブラウザ側で偽装可能なので、MIMEタイプを自前でチェックする
                $type = @exif_imagetype($_FILES['image']['tmp_name']);
                if (!in_array($type, array(IMAGETYPE_JPEG), true)) {
                    throw new RuntimeException('画像形式が未対応です');
                }

                // ファイルデータからSHA-1ハッシュを取ってファイル名を決定し、ファイルを保存する
                $path = sprintf('/common/files/%s%s', $_FILES['image']['name'], image_type_to_extension($type));
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
            $params['file'] = sprintf('%s%s', $_FILES['file']['name'], '.MP4');
        }
        if($imageFlg == true && $_FILES['image']['size'] > 0){
            echo 'hoge';
            $params['image'] = sprintf('%s%s', $_FILES['image']['name'], image_type_to_extension($type));
        }
        $this->load->model('Roads_model', '', TRUE);
        $this->Roads_model->updateRoad($id, $params);
        $this->view('road/updateaccept');
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
                if ($_FILES["file"]['size'] > 500000000) {
                    throw new RuntimeException('アップロードファイルのサイズが上限を超えています');
                }

                // ファイルデータからSHA-1ハッシュを取ってファイル名を決定し、ファイルを保存する
                $path = sprintf('/common/files/%s%s', $_FILES['files']['name'], '.MP4');
                //$path = sprintf('C:\xampp\htdocs\manavimk2\common\files\%s%s', $_FILES['file']['name'], image_type_to_extension($type));
                if (!move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                    throw new RuntimeException('ファイル保存時にエラーが発生しました');
                }

                //$msg = ['green', 'ファイルは正常にアップロードされました'];

            } catch (RuntimeException $e) {
                $fileFlg = false;
                //$msg = ['red', $e->getMessage()];
                throw new RuntimeException('失敗しました');
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

                // $_FILES['image']['mime']の値はブラウザ側で偽装可能なので、MIMEタイプを自前でチェックする
                $type = @exif_imagetype($_FILES['image']['tmp_name']);
                if (!in_array($type, array(array(IMAGETYPE_JPEG)), true)) {
                    throw new RuntimeException('画像形式が未対応です');
                }

                // ファイルデータからSHA-1ハッシュを取ってファイル名を決定し、ファイルを保存する
                $path = sprintf('/common/files/%s%s', $_FILES['image']['name'], image_type_to_extension($type));
                //$path = sprintf('C:\xampp\htdocs\manavimk2\common\files\%s%s', $_FILES['image']['name'], image_type_to_extension($type));
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
                    throw new RuntimeException('ファイル保存時にエラーが発生しました');
                }

                //$msg = ['green', 'ファイルは正常にアップロードされました'];

            } catch (RuntimeException $e) {
                $imageFlg = false;
                //$msg = ['red', $e->getMessage()];
                throw new RuntimeException('失敗しました');

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
            $params['file'] = sprintf('%s%s', $_FILES['file']['name'], '.MP4');
        }
        if($imageFlg == true && $_FILES['image']['size'] > 0){
            echo 'hoge';
            $params['image'] = sprintf('%s%s', $_FILES['image']['name'], image_type_to_extension($type));
        }
        $this->load->model('Roads_model', '', TRUE);
        $this->Roads_model->setRoad($params);
        $this->view('road/addaccept');
    }

}
