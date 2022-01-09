<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gato_model extends CI_Model
{
	public $gatoId;
	public $gatoNombre;
	public $gatoColor;
	
	function __construct()
	{
		$this->load->database();
	}

	public function getAllCats()
	{
		$query = $this->db->get('gatos');
		return $query->result();
	}
	
	public function save()
	{
		$this->gatoId = null;
		$this->db->insert('gatos', $this);
	}

	public function delete()
	{
		$this->db->delete('gatos', array('gatoId' => $this->gatoId));
	}
}
