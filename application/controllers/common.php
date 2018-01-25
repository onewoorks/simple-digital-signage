<?php

class Common_Controller {

    protected function RouteClass($route) {
        $cleanText = ucwords(str_replace('-', ' ', $route));
        $cleanText = ucwords(str_replace('_', ' ', $cleanText));
        return str_replace(' ', '', $cleanText);
    }

    protected function pagingRoute($params) {
        $method = (isset($params[URL_ARRAY])) ? $params[URL_ARRAY] : '';
        $methodCaller = 'Paging' . $this->RouteClass($method);
        $result = $this->$methodCaller($params);
        print_r($result);
        $view = new View_Model('index');
        $view->assign('page_meta', $metapage);
        $view->assign('content', $result);
    }

    protected function ajaxRoute($method, $params = null) {
        $methodCaller = 'Ajax' . $this->RouteClass($method);
        echo json_encode($this->$methodCaller($params));
    }

    protected function randomName($length = 30) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));
        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }

    protected function UploadMedia($sourcePath) {
        $media_model = new Media_Model();
        $imageSize = getimagesize($sourcePath);
        $imageExtension = image_type_to_extension($imageSize[2]);
        $newName = $this->randomName() . $imageExtension;
        $uploadPath = BASE_DIR . 'buckets/' . $newName;
        if (move_uploaded_file($sourcePath, $uploadPath)):
            $data = array(
                'filename' => $newName,
                'id_cawangan' => 6,
                'type' => 'image'
            );
            $media_model->InsertNewMedia($data);
        endif;
    }

    protected function jsonPaparHarga($data) {
        $papar_harga = array(
            "harga_jual" => array(
                "999" => number_format($data['jual_999'],2,'.',','),
                "916" => number_format($data['jual_916'],2,'.',',')
            )
        );
        return json_encode($papar_harga);
    }

    function FormArray($array) {
        $fields = array();
        $arrayName = array();
        foreach ($array as $v):
            if (!in_array($v['name'], $arrayName)):
                $arrayName[] = $v['name'];
                $fields[$v['name']] = $v['value'];
            else :
                if (is_array($fields[$v['name']])):
                    $inArray = $fields[$v['name']];
                    array_push($inArray, $v['value']);
                    $fields[$v['name']] = $inArray;
                else:
                    $firstValue = $fields[$v['name']];
                    $inArray = array($firstValue, $v['value']);
                    $fields[$v['name']] = $inArray;
                endif;
            endif;
        endforeach;
        return $fields;
    }

}
