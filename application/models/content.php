<?php

class Content_Model {

    public function __construct() {
        $this->db = new Mysql_Driver();
    }
    
    

    public function UpdateHargaHariIni($data) {
        $query = "INSERT INTO content SET "
                . "id_cawangan = '" . (int) $data['id_cawangan'] . "',"
                . "papar_harga = '" . $this->db->escape($data['papar_harga']) . "',"
                . "media = '".$this->db->escape($data['media'])."' ";
        $this->db->executeQuery($query);
    }

}
