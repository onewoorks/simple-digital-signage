<?php

class Manager_Controller extends Common_Controller {

    private $params;

    function main(array $getVars, array $params = null) {
        if (isset($_REQUEST['method'])):
            $this->ajaxRoute($_REQUEST['method'], $_REQUEST['params'] = null);
        else:
            $this->params = $params;
            $header = new View_Model('manager/common/header');
            $page = (count($params) == (URL_ARRAY + 1)) ? 'index' : $params[URL_ARRAY + 1];
            $output = $this->PagingUsercontent($page);
            $view = new View_Model('manager/' . $output['page']);
            $view->assign('content', $output);
            $leftMenu = new View_Model('manager/common/left-menu');
            $footer = new View_Model('manager/common/footer');
        endif;
    }

    protected function PagingUserContent($params) {
        $cleanMethod = $this->RouteClass($params);
        return $this->$cleanMethod();
    }

    protected function Index() {
        $output = array();
        $output['page'] = 'index';
        $output['cawangan'] = $this->GetSenaraiCawangan();
        return $output;
    }

    protected function CawanganUbahMaklumat() {
        $akses_id = $this->params[URL_ARRAY + 2];
        $output = array();
        $output['page'] = 'cawangan/ubah-maklumat';
        $output['akses_id'] = $this->GetCawanganId($akses_id);
        $output['rekod_content'] = $this->GetSenaraiRekodContent($akses_id);
        $output['imej_database'] = $this->GetImageDatabase($akses_id);
        return $output;
    }

    private function GetSenaraiCawangan() {
        $cawangan_model = new Cawangan_Model();
        $cawangan = $cawangan_model->GetSenaraiCawangan();
        $result = array();
        foreach ($cawangan as $caw):
            $result[] = array(
                'nama_kedai' => $caw['nama_cawangan'],
                'lokasi' => $caw['lokasi'],
                'akses_id' => $caw['no_akses_id'],
                'tarikh_masa' => $caw['tarikh_masa'],
                'harga_emas' => json_decode($caw['papar_harga'], true),
                'media' => json_decode($caw['media'], true)
            );
        endforeach;
        return $result;
    }

    private function GetSenaraiRekodContent($akses_id) {
        $cawangan_model = new Cawangan_Model();
        $content = $cawangan_model->GetRekodPaparan($akses_id);
        foreach ($content as $c):
            $result['rekod'][] = array(
                'tarikh_masa' => $c['timestamp'],
                'harga_emas' => json_decode($c['papar_harga'], true),
                'media' => json_decode($c['media'],true)
            );
        endforeach;
        $result['media'] = json_decode($content[0]['media'],true);
        return $result;
    }
    
    private function GetImageDatabase($akses_id){
        $media_model = new Upload_Media_Model();
        return $media_model->GetAllImages($akses_id);
    }

    protected function MediaKategori() {
        $output['page'] = 'media/list-kategori';
        return $output;
    }

    protected function MediaFile() {
        $output['page'] = 'media/list-file';
        $output['media_files'] = $this->GetSenaraiMedia(6);
        return $output;
    }

    protected function MediaUpload() {
        $output['page'] = 'media/media-upload';
        $output['lib_path'] = ROOT_URL . 'application/libraries/jquery_upload/';
        $output['menu_active'] = array(
          'parent' => 'media',
          'child' => 'media-upload'
        );
        return $output;
    }

    private function GetSenaraiMedia($id_cawangan) {
        $media_model = new Media_Model();
        $medias = $media_model->GetSenaraiUpload($id_cawangan);
        $result = array();
        foreach ($medias as $media):
            $result[] = array(
                'filename' => ROOT_URL . 'buckets/' . $media['filename']
            );
        endforeach;
        return $result;
    }

    protected function AjaxMediaUpload() {
        if (is_array($_FILES)):
            $totalimages = count($_FILES['upload_file']['tmp_name']);
            for($i=0;$i<$totalimages;$i++):
                $sourcePath = $_FILES['upload_file']['tmp_name'][$i];
                $this->UploadMedia($sourcePath);
            endfor;
        endif;
    }
    
    protected function AjaxUpdateHarga(){
        $content_model = new Content_Model();
        $input = $this->FormArray($_REQUEST['data']);
        $data = array(
            'id_cawangan' => $input['no_akses_id'],
            'papar_harga' => $this->jsonPaparHarga($input),
            'media'=> $input['media']
        );
        $content_model->UpdateHargaHariIni($data);
        $cawangan_model = new Cawangan_Model();
        $cawangan_model->UpdatePlayerContent($input['no_akses_id'], $this->randomName());
        return true;
    }
    
    private function GetCawanganId($akses_id){
        $cawangan_model = new Cawangan_Model();
        $result = $cawangan_model->GetCawanganId($akses_id);
        return $result['id'];
    }
}
