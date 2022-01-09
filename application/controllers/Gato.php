<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gato extends CI_Controller
{
	public function index()
	{
	
		$headerContent = array(
			"page" => "home"
		);

		$pageContent = array(
			"content" => $this->load->view('home', array(), TRUE)
		);
		
		$this->load->view('header', $headerContent);
		$this->load->view('main', $pageContent);
	}
	
	public function list() {

		// Cargamos el modelo para listar gatos
		$this->load->model("gato_model");

		// Contenido para el header
		$headerContent = array(
			"page" => "list"
		);

		// Datos para la lista de gatos
		$listData = array(
			"cats" => $this->gato_model->getAllCats()
		);
		
		// Contenido para la Main Page
		$pageContent = array(
			"content" => $this->load->view('gatos/lista', $listData, TRUE)
		);

		// Cargamos las vistas :D
		$this->load->view('header', $headerContent);
		$this->load->view('main', $pageContent);
	}
	
	public function new() {

		// Importamos la libreria para validar forms
		$this->load->library('form_validation');

		// Cargamos el modelo para listar gatos
		$this->load->model("gato_model");

		// Vamos a configurar nuestras reglas de validacion
		$this->form_validation->set_rules('nombre', 'Nombre del gato', 'required|min_length[3]');
		$this->form_validation->set_rules('color', 'Color del gato', 'required|min_length[3]');

		// Recibo los datos de la vista
		$nombre = $this->input->post("nombre");
		$color = $this->input->post("color");
		
		// Datos para el contenido del header
		$headerContent = array(
			"page" => "new"
		);

		// Cargamos el header
		$this->load->view('header', $headerContent);

		// preparo los datos para los formularios
		$formData = new stdClass();
		$formData->nombre = $nombre;
		$formData->color = $color;
		
		if ($this->form_validation->run() == FALSE) {
			// Si no se esta corriendo la validacion (nunca se realizo un submit)
			
			// Contenido para la Main Page. Cargo la vista de carga de gatos.
			$pageContent = array(
				"content" => $this->load->view('gatos/nuevo', $formData, TRUE)
			);
		} else {
			
			$this->gato_model->gatoNombre = $nombre;
			$this->gato_model->gatoColor = $color;
			$this->gato_model->save();
			
			// Contenido para la Main Page. Cargo la vista de finalizacion de carga.
			$pageContent = array(
				"content" => $this->load->view('gatos/success', $formData, TRUE)
			);
		}

		// Cargamos la main page
		$this->load->view('main', $pageContent);
	}

	public function prueba()
	{
		$this->load->model("gato_model");
		
		var_dump($this->gato_model->getAllCats());
	}
	
	public function delete() {
		// Recibimos ID del front
		$id = $this->input->post('id');
		
		// Variable de retorno
		$ret = new stdClass();
		
		// Validar ID
		if($id == "") {
			$ret->error = 1;
			echo json_encode($ret);
			return;
		}

		// Cargamos nuestro modelo
		$this->load->model("gato_model");
		
		$this->gato_model->gatoId = $id;
		$this->gato_model->delete();

		$ret->error = 0;
		echo json_encode($ret);
		return;
	}
}
