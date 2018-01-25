<?php

class UserPlayer_Controller extends Common_Controller {
    
    private $params;
    
    function main(array $getVars, array $params = null) {
        if (isset($_REQUEST['method'])):
            $this->ajaxRoute($_REQUEST['method'], $_REQUEST['params'] = null);
        else:
            $this->params = $params;
            $page = (count($params) == (URL_ARRAY)) ? 'index' : $params[URL_ARRAY] ;
            $output = $this->PagingUsercontent($page);
            $view = new View_Model('userplayer/index');
            $view->assign('content',$output);
        endif;
    }
    
    protected function PagingUsercontent($params){
        $cleanMethod = $this->RouteClass($params);
        return $this->$cleanMethod();
    }
    
    private function Index(){
        $output = array();
        return $output;
    }
    
    protected function UserPlayer(){
        $no_akses_id = $this->params[URL_ARRAY+1];
        $output['no_akses_id'] = $no_akses_id;
        $output['user_content'] = $this->UserContent($no_akses_id);
        $output['current_player'] = $this->GetCurrentPlayer($no_akses_id);
        return $output;
    }
    
    private function UserContent($no_akses_id){
        $customer_model = new Cawangan_Model();
        $content = $customer_model->GetCurrentContent($no_akses_id);
        return $content;
    }
    
    private function GetCurrentPlayer($no_akses_id){
        $customer_model = new Cawangan_Model();
        $current_player = $customer_model->GetCurrentPlayer($no_akses_id);
        return $current_player;
    }
    
    protected function AjaxCodePlayer(){
        $no_akses_id = $_REQUEST['no_akses_id'];
        $code_player = $_REQUEST['code_player'];
        $cawangan_model = new Cawangan_Model();
        $checkResult = $cawangan_model->CheckPlayerCode($no_akses_id, $code_player);
//        ($checkResult) ? 'equal' : $cawangan_model->SyncPlayerCode($no_akses_id);
        return ($checkResult) ? 'equal' : $cawangan_model->SyncPlayerCode($no_akses_id);;
        
    }
}