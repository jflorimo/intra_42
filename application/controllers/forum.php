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
}
