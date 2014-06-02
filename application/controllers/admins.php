<?php
class Admins extends CI_Controller
{
	public function board_admins()
	{
		$this->load->model("AdminsModel");
		$this->load->view("main/header");
		$this->load->view("admins/board-menu");
		$data["admins"] = $this->AdminsModel->get_all_admin();
		$this->load->view("admins/board-admins",$data);
		$this->load->view("main/footer");
	}

	public function ajax_delete_admin()
	{
		if ($this->input->post("id"))
		{
			$this->load->model("AdminsModel");
			$this->AdminsModel->delete_admin($this->input->post("id"));
		}
	}

	public function board_categories()
	{
		$this->load->model("CategoriesModel");
		$this->load->view("main/header");
		$this->load->view("admins/board-menu");
		$data["categories"] = $this->CategoriesModel->get_all_category();
		$this->load->view("admins/board-categories",$data);
		$this->load->view("main/footer");
	}

	public function ajax_delete_category()
	{
		if ($this->input->post("id"))
		{
			$this->load->model("CategoriesModel");
			$this->CategoriesModel->delete_category($this->input->post("id"));
		}
	}

	public function add_category()
	{
		$this->load->model("CategoriesModel");
		if ($this->input->post("name"))
		{
			$data = array(
				"name" => $this->input->post("name"),
				"type" => 1
			);
			$this->CategoriesModel->insert_category($data);
			redirect("admins/board_categories");
		}
	}

	public function board_souscategories()
	{
		$this->load->model("SouscategoriesModel");
		$this->load->model("CategoriesModel");
		$this->load->view("main/header");
		$this->load->view("admins/board-menu");
		$data["categories"] = $this->CategoriesModel->get_all_category();
		$data["souscategories"] = $this->SouscategoriesModel->get_all_souscategory();
		$this->load->view("admins/board-souscategories",$data);
		$this->load->view("main/footer");
	}

	public function ajax_delete_souscategory()
	{
		if ($this->input->post("id"))
		{
			$this->load->model("SouscategoriesModel");
			$this->SouscategoriesModel->delete_souscategory($this->input->post("id"));
		}
	}

	public function add_souscategory()
	{
		$this->load->model("SouscategoriesModel");
		if ($this->input->post("name"))
		{
			if ($this->input->post("categories") != "nochoice")
			{
				$data = array(
					"name" => $this->input->post("name"),
					"id_categories" => $this->input->post("categories")
				);
				$this->SouscategoriesModel->insert_souscategory($data);
				redirect("admins/board_souscategories");
			}
			else
				redirect("admins/board_souscategories");
		}
		else
			redirect("admins/board_souscategories");
	}

	public function board_semestres()
	{
		$this->load->model("SemestresModel");
		$this->load->view("main/header");
		$this->load->view("admins/board-menu");
		$data["semestres"] = $this->SemestresModel->get_all_semestre();
		$this->load->view("admins/board-semestres",$data);
		$this->load->view("main/footer");
	}

	public function ajax_delete_semestre()
	{
		if ($this->input->post("id"))
		{
			$this->load->model("SemestresModel");
			$this->SemestresModel->delete_semestre($this->input->post("id"));
		}
	}

	public function add_semestre()
	{
		$this->load->model("SemestresModel");
		if ($this->input->post("name"))
		{
			$data = array(
				"titre" => $this->input->post("name")
			);
			$this->SemestresModel->insert_semestre($data);
			redirect("admins/board_semestres");
		}
	}

	public function board_modules()
	{
		$this->load->model("ModulesModel");
		$this->load->model("SemestresModel");
		$this->load->view("main/header");
		$this->load->view("admins/board-menu");
		$data["semestres"] = $this->SemestresModel->get_all_semestre();
		$data["modules"] = $this->ModulesModel->get_all_module();
		$this->load->view("admins/board-modules",$data);
		$this->load->view("main/footer");
	}

	public function ajax_delete_module()
	{
		if ($this->input->post("id"))
		{
			$this->load->model("ModulesModel");
			$this->ModulesModel->delete_module($this->input->post("id"));
		}
	}

	public function change_date($old_date)
	{
		$split =  split('/', $old_date);
		$temp = $split[0];
		$temp2 = $split[1];
		$split[0] = $split[2];
		$split[1] = $temp;
		$split[2] = $temp2;
		$new_date = join('-', $split);
		return $new_date;
	}

	public function add_module()
	{
		$this->form_validation->set_rules('nbplaces', 'Places', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('nbcredits', 'Credits', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('start', 'Start', 'trim|required');
		$this->form_validation->set_rules('end', 'End', 'trim|required');

		if ($this->form_validation->run())
		{
			$this->load->model("ModulesModel");	
			$this->load->model("CategoriesModel");
			if ($this->input->post("name"))
			{
				if ($this->input->post("semestres") != "nochoice")
				{
					$start = $this->change_date($this->input->post("start"));
					$end = $this->change_date($this->input->post("end"));
					// echo $this->input->post("end");
					// echo $end;
					$data = array(
						"name" => $this->input->post("name"),
						"description" => $this->input->post("description"),
						"nbplaces" => $this->input->post("nbplaces"),
						"start" => $start,
						"end" => $end,
						"nbcredits" => $this->input->post("nbcredits"),
						"id_semestres" => $this->input->post("semestres")
					);
					$this->ModulesModel->insert_module($data);
					$data = array(
						"name" => $this->input->post("name"),
						"type" => 1
						);
					$this->CategoriesModel->insert_category($data);
				}
			}
		}
		redirect("admins/board_modules");
	}

	public function board_activities()
	{
		$this->load->model("ActivitiesModel");
		$this->load->model("ModulesModel");
		$this->load->view("main/header");
		$this->load->view("admins/board-menu");
		$data["modules"] = $this->ModulesModel->get_all_module();
		$data["activities"] = $this->ActivitiesModel->get_all_activite();
		$this->load->view("admins/board-activities",$data);
		$this->load->view("main/footer");
	}

	public function ajax_delete_activite()
	{
		if ($this->input->post("id"))
		{
			$this->load->model("ActivitiesModel");
			$this->CategoriesModel->delete_activite($this->input->post("id"));
		}
	}

	public function add_activite()
	{
		$this->form_validation->set_rules('sizegroup', 'Size', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('nbcorrections', 'Corrections', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('start', 'Start', 'trim|required');
		$this->form_validation->set_rules('end', 'End', 'trim|required');

		if ($this->form_validation->run())
		{
			$this->load->model("ActivitiesModel");
			if ($this->input->post("name"))
			{
				if ($this->input->post("activities") != "nochoice")
				{
					$start = $this->change_date($this->input->post("start"));
					$end = $this->change_date($this->input->post("end"));
					$data = array(
						"name" => $this->input->post("name"),
						"description" => $this->input->post("description"),
						"sizegroup" => $this->input->post("sizegroup"),
						"start" => $start,
						"end" => $end,
						"nbcorrections" => $this->input->post("nbcorrections"),
						"id_modules" => $this->input->post("modules")
					);
					$this->ActivitiesModel->insert_activite($data);
				}
			}
		}
		redirect("admins/board_activities");
	}

	public function board_tickets()
	{
		$this->load->model('TicketsModel');
		$this->load->view("main/header");
		$this->load->view("admins/board-menu");
		$data["tickets"] = $this->TicketsModel->get_all_ticket();
		$this->load->view('admins/board-tickets', $data);
		$this->load->view("main/footer");
	}

	public function assign_tickets()
	{
		$this->load->model('TicketsModel');
		$this->load->model("AdminsModel");
		$this->load->view("main/header");
		$this->load->view("admins/board-menu");
		if ($this->input->post("uid_admins"))
		{
			$data = array(
				"uid_admins" => $this->input->post("uid_admins")
			);
			$this->TicketsModel->edit_assign($data, $this->input->post("id"));
			redirect("admins/board_tickets");
		}
		else
		{
			$data["admins"] = $this->AdminsModel->get_all_admin();
			$data["id"] = $_GET["id"];
			$this->load->view('admins/board-assign-tickets', $data);
		}
		$this->load->view("main/footer");
	}

	public function close_tickets()
	{
		$this->load->model('TicketsModel');
		if ($_GET["id"])
		{
			$data = array(
				"etat" => 1
			);
			$this->TicketsModel->open_or_close($data, $_GET["id"]);
		}
		redirect("admins/board_tickets");
	}

	public function open_tickets()
	{
		$this->load->model('TicketsModel');
		if ($_GET["id"])
		{
			$data = array(
				"etat" => 0
			);
			$this->TicketsModel->open_or_close($data, $_GET["id"]);
		}
		redirect("admins/board_tickets");
	}
}
?>