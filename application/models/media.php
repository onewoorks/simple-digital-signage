<?php

class Media_Model {
    
    public function __construct() {
        $this->db = new Mysql_Driver();
    }
    
    public function GetSenaraiUpload($id_cawangan){
        $query = "SELECT * "
                . "FROM upload_media "
                . "WHERE id_cawangan = '".(int) $id_cawangan ."' "
                . "ORDER BY id DESC";
        return $this->db->executeQuery($query);
    }
    
    public function InsertNewMedia($data){
        $query = "INSERT INTO upload_media SET "
                . "filename = '". $this->db->escape($data['filename'])."', "
                . "id_cawangan = '". (int) $data['id_cawangan']."', "
                . "type = '". $this->db->escape($data['type'])."'";
        return $this->db->executeQuery($query);
    }
    
}
