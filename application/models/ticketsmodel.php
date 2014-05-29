<?php 
class TicketsModel extends CI_Model
{
    public function get_all_ticket()
    {
    	$query = $this->db->select("*")->from("tickets")->get();
    	return $query->result();
    }

    public function insert_ticket($data)
    {
        $this->db->insert('tickets',$data);
    }

    public function open_or_close($data, $id)
    {
        $this->db->where("id", $id);
        $this->db->update("tickets",$data);
    }
}
?>