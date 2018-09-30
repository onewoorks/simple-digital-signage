<?php

class Cawangan_Model {
    
    public function __construct() {
        $this->db = new Mysql_Driver();
    }
    
    public function GetCawanganId($akses_id){
        $query = "SELECT id "
                . "FROM cawangan "
                . "WHERE no_akses_id = '".$this->db->escape($akses_id)."'";
        return $this->db->executeQuery($query,'single');
    }

    public function GetSenaraiCawangan(){
        $query = "SELECT c.*, "
                . "(select timestamp from content where id_cawangan=c.id order by id desc limit 1) as tarikh_masa, "
                . "(select papar_harga from content where id_cawangan=c.id order by id desc limit 1) as papar_harga, "
                . "(select media from content where id_cawangan=c.id order by id desc limit 1) as media "
                . "FROM cawangan c ";
        return $this->db->executeQuery($query);
    }
    
    public function GetRekodPaparan($akses_id, $limit = 10){
        $query = "SELECT c.* "
                . "FROM content c "
                . "LEFT JOIN cawangan cw on cw.id=c.id_cawangan "
                . "WHERE cw.no_akses_id = '".$this->db->escape($akses_id)."' "
                . "ORDER BY c.id DESC "
                . "LIMIT $limit ";
        return $this->db->executeQuery($query);
    }
    
    public function GetCurrentContent($no_akses_id){
        $query = "SELECT c.*, cw.social as social, cw.menu_info AS menu_info "
                . "FROM content c "
                . "LEFT JOIN cawangan cw on cw.id=c.id_cawangan "
                . "WHERE cw.no_akses_id = '".$no_akses_id."' "
                . "ORDER BY c.id DESC";
        return $this->db->executeQuery($query,'single');
    }
    
    public function UpdatePlayerContent($no_akses_id,$new_player_code){
        $query = "UPDATE cawangan SET "
                . "code_player = '".$this->db->escape($new_player_code)."' "
                . "WHERE id='".(int)$no_akses_id."'";
        $this->db->executeQuery($query);
    }
    
    public function CheckPlayerCode($no_akses_id,$current_player){
        $query = "SELECT * "
                . "FROM cawangan "
                . "WHERE code_player='".$this->db->escape($current_player)."' "
                . "AND no_akses_id='".$this->db->escape($no_akses_id)."'";
        $result = $this->db->executeQuery($query);
        return ($result) ? $result : false ;
    }
    
    public function SyncPlayerCode($no_akses_id){
        $query = "UPDATE cawangan "
                . "SET current_player = code_player "
                . "WHERE no_akses_id='".$this->db->escape($no_akses_id)."'";
        $this->db->executeQuery($query);
    }
    
public function GetCurrentPlayer($no_akses_id){
    $query = "SELECT current_player "
            . "FROM cawangan "
            . "WHERE no_akses_id='".$this->db->escape($no_akses_id)."' ";
    $result = $this->db->executeQuery($query,'single');
    return ($result) ? $result['current_player'] : false;
}
    
}