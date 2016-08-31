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

    public function nodeslist($id)
    {
        // Set smarty template.
        // applicatoin/views/templates/...
        $this->load->model('Nodes_model', '', TRUE);
        $nodes = $this->Nodes_model->getNodesByCategoryId($id);
        $this->smarty->assign('nodes', $nodes);

        $this->view('node/nodelist');
    }

    public function send()
    {
        $id = 1;
        if(!empty($_POST['id'])){
            $id = $_POST['id'];
        }elseif(!empty($_GET['id'])){
            $id = $_GET['id'];
        }


        $this->load->model('Nodes_model', '', TRUE);
        $node = $this->Nodes_model->getNodeWithRoadIdById($id);
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

    public function addstart(){
        $this->view('node/addstart');
    }

    public function addstartdata(){

        // まずはカテゴリ登録
        $params = array(
            'title' => $_POST['title']
        );
        $this->load->model('Categories_model', '', TRUE);
        $cId = $this->Categories_model->setCategory($params);


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
                

                // ファイルデータからSHA-1ハッシュを取ってファイル名を決定し、ファイルを保存する
                $path = "/upload/".$_FILES['file']['name'];
                //$path = sprintf('C:\xampp\htdocs\manavimk2\common\files\%s%s', $_FILES['file']['name'], image_type_to_extension($type));
                if (!move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                    throw new RuntimeException('ファイル保存時にエラーが発生しました');
                }

                //$msg = ['green', 'ファイルは正常にアップロードされました'];

            } catch (RuntimeException $e) {

                //$msg = ['red', $e->getMessage()];

            }

        }

        $params = array(
            'category_id' => $cId,
            'title' => $_POST['title'],
            'start_flg' => 1,
            'type' => 'node',
            'file' => sprintf('%s%s', $_FILES['file']['name'], image_type_to_extension($type)),
            //'image' => $_POST['image'],
        );
        $this->load->model('Nodes_model', '', TRUE);
        $this->Nodes_model->setStartNode($params);
        $this->view('node/addstartaccept');
    }


    public function add()
    {
        $this->view('node/add');
    }


    public function adddata($cId){

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
                if (!in_array($type, array('IMAGETYPE_JPEG'), true)) {
                    throw new RuntimeException('画像形式が未対応です');
                }

                // ファイルデータからSHA-1ハッシュを取ってファイル名を決定し、ファイルを保存する
                $path = '/upload/'.$_FILES['file']['name'];
                //$path = sprintf('C:\xampp\htdocs\manavimk2\common\files\%s', $_FILES['file']['name']);
                if (!move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                    throw new RuntimeException('ファイル保存時にエラーが発生しました');
                }

                //$msg = ['green', 'ファイルは正常にアップロードされました'];

            } catch (RuntimeException $e) {

                //$msg = ['red', $e->getMessage()];

            }

        }

        $params = array(
            'category_id' => $cId,
            'title' => $_POST['title'],
            'start_flg' => 0,
            'type' => 'node',
            'file' => sprintf('%s%s', $_FILES['file']['name'], image_type_to_extension($type)),
            //'image' => $_POST['image'],
        );
        $this->load->model('Nodes_model', '', TRUE);
        $this->Nodes_model->setStartNode($params);
        $this->smarty->assign('category_id', $cId);
        $this->view('node/addstartaccept');
    }

    public function update($id){
        // Set smarty template.
        // applicatoin/views/templates/...
        $this->load->model('Nodes_model', '', TRUE);
        $node = $this->Nodes_model->getNodeById($id);
        $this->smarty->assign('node', $node[0]);
        $this->smarty->assign('id', $id);

        $this->view('node/update');
    }

    public function updatedata($id){
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
                if (!in_array($type, array('IMAGETYPE_JPEG'), true)) {
                    throw new RuntimeException('画像形式が未対応です');
                }

                // ファイルデータからSHA-1ハッシュを取ってファイル名を決定し、ファイルを保存する
                $path = sprintf('./upload/%s', $_FILES['file']['name']);
                //$path = sprintf('C:\xampp\htdocs\manavimk2\common\files\%s', $_FILES['file']['name']);
                if (!move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                    throw new RuntimeException('ファイル保存時にエラーが発生しました');
                }

                //$msg = ['green', 'ファイルは正常にアップロードされました'];

            } catch (RuntimeException $e) {
                $fileFlg = false;
                //$msg = ['red', $e->getMessage()];

            }

        }

        $params = array(
            'title' => $_POST['title'],
            'start_flg' => 0,
            'type' => 'node',
        );
        if($fileFlg == true && $_FILES['file']['size'] > 0){
            $params['file'] = sprintf('%s%s', $_FILES['file']['name'], '.MP4');
        }

        $this->load->model('Nodes_model', '', TRUE);
        $this->Nodes_model->updateNode($id, $params);
        $node = $this->Nodes_model->getNodeById($id);
        $this->smarty->assign('category_id', $node[0]['category_id']);
        $this->view('node/updateaccept');
    }
}
