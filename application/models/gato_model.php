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

	public function load(): bool
	{
		$query = $this->db->get_where('gatos', array('gatoId' => $this->gatoId));
		$result = $query->result();

		if(count($result) > 0) {
			$this->gatoNombre = $result[0]->gatoNombre;
			$this->gatoColor = $result[0]->gatoColor;
			return true;
		}
		else {
			return false;
		}
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

	public function update()
	{
		$this->db->update('gatos', $this, array('gatoId' => $this->gatoId));
	}
}
