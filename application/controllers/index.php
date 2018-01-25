<?php

class Index_Controller extends Common_Controller {
    
    public function __construct() {
//        $this->main($_SERVER);
    }
    
    function main(array $getVars, array $params = null) {
        if (isset($_REQUEST['method'])):
            $this->ajaxRoute($_REQUEST['method'], $_REQUEST['params'] = null);
        else:
            $this->pagingRoute($params);
        endif;
    }
    
    protected function PagingIndex(){
        
    }
}