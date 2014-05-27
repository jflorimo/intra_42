<?php
class Forum extends CI_Controller
{
	function index()
	{
		if (!($this->session->userdata("uid")))
			redirect("/");
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

	function ajax_this_thread()
	{
		$this->load->model("ThreadsModel");
		$this->load->model("AnswerthreadsModel");
		if ($this->input->post("idthread"))
		{
			$data["thread"] = $this->ThreadsModel->this_thread($this->input->post("idthread"));
			$data["answers"] = $this->AnswerthreadsModel->answers_by_thread($this->input->post("idthread"));
			$this->load->view("ajax/ajax-this-thread", $data);
		}
	}

	function ajax_add_answer_thread()
	{
		$this->load->model("AnswerthreadsModel");
		if ($this->input->post("answer"))
		{
			$data = array(
				"answer"=>$this->input->post("answer"),
				"uid"=>$this->session->userdata["uid"],
				"id_threads"=>$this->input->post("id_thread")
			);
			$this->AnswerthreadsModel->insert_answer($data);
			$data2["answers"] = $this->AnswerthreadsModel->answers_by_thread($this->input->post("id_thread"));
			$this->load->view("ajax/ajax-add-answer", $data2);
		}
	}

	function ajax_list_comments()
	{
		$this->load->model("AnswerthreadsModel");
		$this->load->model("CommentModel");
		if ($this->input->post("id_answer"))
		{
			$data["answer"] = $this->AnswerthreadsModel->this_answer($this->input->post("id_answer"));
			$data["comments"] = $this->CommentModel->comments_by_answer($this->input->post("id_answer"));
			$this->load->view("ajax/ajax-list-comments", $data);
		}
	}

	function ajax_add_comment_answer()
	{
		$this->load->model("CommentModel");
		if ($this->input->post("id_answer"))
		{
			$data = array (
				"comment" => $this->input->post("comment"),
				"uid" => $this->session->userdata["uid"],
				"id_answer_threads" => $this->input->post("id_answer")
			);
			$this->CommentModel->insert_comment($data);
			$data2["comments"] = $this->CommentModel->comments_by_answer($this->input->post("id_answer"));
			$this->load->view("ajax/ajax-add-comment-answer", $data2);
		}
	}
}
