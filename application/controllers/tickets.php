<?php 
class Tickets extends CI_Controller
{
	public function my_tickets()
	{
		$this->load->model("TicketsModel");
		$this->load->view("main/header");
		$data["tickets"] = $this->TicketsModel->get_ticket_by_user($this->session->userdata("uid"));
		$this->load->view("tickets/my-tickets", $data);
		$this->load->view("main/footer");
	}

	public function add_tickets()
	{
		$this->load->model('TicketsModel');
		$this->load->view("main/header");
		if ($this->input->post("subject") && $this->input->post("description"))
		{
			$data = array (
				"subject" => $this->input->post("subject"),
				"description" => $this->input->post("description"),
				"uid_users" => $this->session->userdata("uid")
			);
			$this->TicketsModel->insert_ticket($data);
			redirect("tickets/my_tickets");
		}
		else
		{
			$this->load->view("tickets/add-tickets");
		}
		$this->load->view("main/footer");
	}

	public function this_tickets()
	{
		$this->load->model('TicketsModel');
		$this->load->view("main/header");
		$data["ticket"] = $this->TicketsModel->get_thisticket($_GET["id"]);
		$data["answer"] = $this->TicketsModel->get_answertickets($_GET["id"]);
		$this->load->view("tickets/this-tickets", $data);
		$this->load->view("main/footer");
	}

	public function add_answertickets()
	{
		$this->load->model('TicketsModel');
		if ($this->input->post("answer"))
		{
			$idticket = $this->input->post("id");
			$data = array(
				"answer" => $this->input->post('answer'),
				"id_tickets" => $idticket,
				"uid_users" => $this->session->userdata("uid")
			);
			$this->TicketsModel->add_answertickets($data);
			redirect('tickets/this_tickets?id='.$idticket);
		}
	}

	public function close()
	{
		$this->load->model('TicketsModel');
		if ($_GET["id"])
		{
			$data = array(
				"etat" => 1
			);
			$this->TicketsModel->open_or_close($data, $_GET["id"]);
		}
		redirect("tickets/my_tickets");
	}

	public function open()
	{
		$this->load->model('TicketsModel');
		if ($_GET["id"])
		{
			$data = array(
				"etat" => 0
			);
			$this->TicketsModel->open_or_close($data, $_GET["id"]);
		}
		redirect("tickets/my_tickets");
	}
}
?>