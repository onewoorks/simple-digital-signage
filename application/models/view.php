<?php

class View_Model {

    private $data = array();
    private $render = FALSE;

    public function __construct($template) {
        $file = VIEW . strtolower($template) . '.php';
        if (file_exists($file)) {
            $this->render = $file;
        }
    }

    public function assign($variable, $value) {
        $this->data[$variable] = $value;
    }

    public function assignVariable($values) {
        foreach ($values as $k => $v) {
            ${$k} = $v;
        }
        return $k;
    }

    public function pageData($values) {
        foreach ($values as $k => $v) {
            $$k = $v;
        }
        return $k;
    }

    public function pageDatas($values) {
        foreach ($values as $k => $v) {
            ${$k} = $v;
        }
        return $k;
    }

    public function __destruct() {
//        if ($_SESSION):
////            $this->WithSession();
//        else :
            $this->NoSession();
//        endif;å
    }

    function showResponse() {
        $data = $this->data;
        include($this->render);
    }

    protected function NoSession() {
        $k = array();
        $data = $this->data;
        if(isset($data['content'])):
        foreach ($data['content'] as $k => $v) :
            $$k = $v;
        endforeach;
        endif;
        include($this->render);
        
        return $k;
    }

    protected function WithSession() {
        $data = $this->data;
        $k = array();
        if (isset($_SESSION['user_domain'])):
            if (isset($data['content'])):
                foreach ($data['content'] as $k => $v) {
                    $$k = $v;
                }
            endif;
        endif;
        include($this->render);
        if (isset($_SESSION['user_domain'])):
            return $k;
        endif;
    }

}
