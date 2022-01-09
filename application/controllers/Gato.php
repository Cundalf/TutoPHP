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

	public function edit($id = "")
	{
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
			"page" => "edit"
		);

		// Cargamos el header
		$this->load->view('header', $headerContent);

		// Si no tengo ID
		if ($id == "" || !is_numeric($id)) {
			// Si no se recibio ID, cargo un error
			$pageContent = array(
				"content" => $this->load->view('gatos/error',
					array(
						"mensaje" => "No se encontro el gato solicitado."
					),
					TRUE
				)
			);

			// Cargamos la main page
			$this->load->view('main', $pageContent);
			
			return;
		}

		// Cargo el ID en el modelo
		$this->gato_model->gatoId = $id;
		
		// Cargo los datos (Realizo una query)
		$gatoLoaded = $this->gato_model->load();
		
		if ($gatoLoaded) {
			// Si se cargaron los datos, avanzo con la logica de edicion
			
			if($nombre == "")
				$nombre = $this->gato_model->gatoNombre;

			if ($color == "")
			$color = $this->gato_model->gatoColor;
				
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

				//$this->gato_model->gatoNombre = $nombre;
				//$this->gato_model->gatoColor = $color;
				//$this->gato_model->save();

				// Contenido para la Main Page. Cargo la vista de finalizacion de carga.
				$pageContent = array(
					"content" => $this->load->view('gatos/success', $formData, TRUE)
				);
			}
			
		} else {
			// Si no se recibio ID, cargo un error
			$pageContent = array(
				"content" => $this->load->view('gatos/error', array(
					"mensaje" => "No se encontro el gato solicitado."
				), TRUE)
			);
		} 

		// Cargamos la main page
		$this->load->view('main', $pageContent);
	}

}
