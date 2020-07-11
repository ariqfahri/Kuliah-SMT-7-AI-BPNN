<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jst_model extends CI_Model
{

	var $table = 'books';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

}
?>