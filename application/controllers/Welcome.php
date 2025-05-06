<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_welcome', 'model');
		$this->load->helper(['url', 'form']);
		$this->load->library(['session', 'form_validation', 'upload']);
	}

	public function index($id = FALSE)
	{
		if ($id === FALSE) {
			$data['posts'] = $this->model->read();
			$this->load->view('header');
			$this->load->view('home', $data);
			$this->load->view('footer');
		} else {
			$data['post'] = $this->model->read($id);
			$this->load->view('header');
			$this->load->view('post', $data);
			$this->load->view('footer');
		}
	}

	public function create() 
	{
		$this->form_validation->set_rules('name', 'Name', 'required|max_length[30]');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('header');
			$this->load->view('create');
			$this->load->view('footer');
		} else {
			$id = uniqid('item_', TRUE);

			$config['upload_path'] = './upload/post';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 1000000;
			$config['file_ext_tolower'] = TRUE;
			$config['file_name'] = str_replace('.', '_', $id);

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('image1')) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('welcome');
			} else {
				$fileData = $this->upload->data();
				$filename = $fileData['file_name'];

				$this->model->create($id, $filename);
				redirect('welcome');
			}
		}
	}

	public function update($id) 
	{
		$this->form_validation->set_rules('name', 'Name', 'required|max_length[30]');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() === FALSE) {
			$data['post'] = $this->model->read($id);
			$this->load->view('header');
			$this->load->view('update', $data);
			$this->load->view('footer');
		} else {
			// Cek apakah file gambar diupload
			if (!empty($_FILES['image1']['name'])) {
				$post = $this->model->read($id);

				$config['upload_path'] = './upload/post';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = 1000000;
				$config['file_ext_tolower'] = TRUE;
				$config['overwrite'] = TRUE;
				$config['file_name'] = $post->filename;

				$this->upload->initialize($config);

				if (!$this->upload->do_upload('image1')) {
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('welcome/update/' . $id);
				} else {
					$fileData = $this->upload->data();
					$filename = $fileData['file_name'];

					$this->model->update($id, $filename);
					redirect('welcome');
				}
			} else {
				$this->model->update($id); // tidak update gambar
				redirect('welcome');
			}
		}
	}

	public function delete($id) 
	{
		$this->model->delete($id);
		redirect('welcome');
	}
}
