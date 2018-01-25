<?php

class Upload_Media_Model {
    
     public function __construct() {
        $this->db = new Mysql_Driver();
    }
    
    public function GetAllImages($akses_id){
        $query = "SELECT um.* "
                . "FROM upload_media um "
                . "LEFT JOIN cawangan c ON c.id = um.id_cawangan ";
//                . "WHERE c.no_akses_id = '".$this->db->escape($akses_id)."'";
        return $this->db->executeQuery($query);
    }
}