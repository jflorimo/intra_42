<?php 
class TicketsModel extends CI_Model
{
    public function get_all_ticket()
    {
    	$query = $this->db->select("*")->from("tickets")->get();
    	return $query->result();
    }

    public function get_ticket_by_user($uid_users)
    {
        $query = $this->db->select("*")->from("tickets")->where("uid_users", $uid_users)->get();
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

    public function edit_assign($data, $id)
    {
        $this->db->where("id", $id);
        $this->db->update("tickets",$data);
    }

    public function get_thisticket($id)
    {
        $query = $this->db->select("*")->from("tickets")->where("id", $id)->get();
        return $query->result();
    }

    public function get_answertickets($id)
    {
        $query = $this->db->select("*")->from("answer_tickets")->where("id_tickets", $id)->get();
        return $query->result();
    }

    public function add_answertickets($data)
    {
        $this->db->insert("answer_tickets",$data);
    }
}
?>