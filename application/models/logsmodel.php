<?php 
class LogsModel extends CI_MODEL
{
    function __construct()
    {
        parent::__construct();
    }
    
    function log($type, $urlpage, $comment, $uid)
    {
        $data = array(
            'uid' => $uid,
            'urlpage' => $urlpage,
            'type' => $type,
            'comment' => $comment                
        );
        $this->db->insert('logs', $data);
    }

    function get_logs_uid($uid)
    {
        $query = $this->db->select("*")->from("logs")->where("uid", $uid)->order_by("id","DESC")->limit("25")->get();
        return $query->result();
    }
}
?>