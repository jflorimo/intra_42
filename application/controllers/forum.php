<?php
class Forum extends CI_Controller
{
	function index()
	{
		$this->load->model("CategoriesModel");
		$this->load->model("SouscategoriesModel");
		$this->load->view("main/header");
		$data["categories"] = $this->CategoriesModel->get_all_category_orderby_type();
		$data["souscategories"] = $this->SouscategoriesModel->get_all_souscategory();
		$this->load->view("forum/board-forum", $data);
		$this->load->view("main/footer");
	}

	function ajax_threads_category()
	{
		$this->load->model("CategoriesModel");
		$this->load->model("ThreadsModel");
		if ($this->input->post("idcategory"))
		{
			$data["category"] = $this->CategoriesModel->this_category($this->input->post("idcategory"));
			$data["threads"] = $this->ThreadsModel->threads_by_category($this->input->post("idcategory"));
			$this->load->view("ajax/ajax-threads-category", $data);
		}
	}

	function ajax_add_thread()
	{
		$this->load->model("ThreadsModel");
		if ($this->input->post("subject") && $this->input->post("description"))
		{
			if ($this->input->post("idcategory"))
			{
				$data = array(
					"subject"=>$this->input->post("subject"),
					"description"=>$this->input->post("description"),
					"uid"=>$this->session->userdata("uid"),
					"id_categories"=>$this->input->post("idcategory")
				);
				$this->ThreadsModel->insert_thread($data);
				$data2["threads"] = $this->ThreadsModel->threads_by_category($this->input->post("idcategory"));
				$this->load->view("ajax/ajax-add-thread", $data2);
			}
			elseif ($this->input->post("idsouscategory"))
			{
				$data = array(
					"subject"=>$this->input->post("subject"),
					"description"=>$this->input->post("description"),
					"uid"=>$this->session->userdata("uid"),
					"id_souscategories"=>$this->input->post("idsouscategory")
				);
				$this->ThreadsModel->insert_thread($data);
				$data2["threads"] = $this->ThreadsModel->threads_by_souscategory($this->input->post("idsouscategory"));
				$this->load->view("ajax/ajax-add-thread", $data2);
			}
		}
	}

	function ajax_threads_souscategory()
	{
		$this->load->model("SouscategoriesModel");
		$this->load->model("ThreadsModel");
		if ($this->input->post("idsouscategory"))
		{
			$data["souscategory"] = $this->SouscategoriesModel->this_souscategory($this->input->post("idsouscategory"));
			$data["threads"] = $this->ThreadsModel->threads_by_souscategory($this->input->post("idsouscategory"));
			$this->load->view("ajax/ajax-threads-souscategory", $data);
		}
	}
}
