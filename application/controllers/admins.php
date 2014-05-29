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

	public function add_module()
	{
		$this->load->model("ModulesModel");
		if ($this->input->post("name"))
		{
			if ($this->input->post("semestres") != "nochoice")
			{
				$data = array(
					"name" => $this->input->post("name"),
					// "description" => $this->input->post("description"),
					// "nbplaces" => $this->input->post("nbplaces"),
					// "start" => $this->input->post("start"),
					// "end" => $this->input->post("end"),
					// "nbcredits" => $this->input->post("nbcredits"),
					"id_semestres" => $this->input->post("semestres")
				);
				$this->ModulesModel->insert_module($data);
				redirect("admins/board_modules");
			}
			else
				redirect("admins/board_modules");	
		}
		else
			redirect("admins/board_modules");
	}

}
?>