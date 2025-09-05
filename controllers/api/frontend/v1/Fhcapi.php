<?php
/**
 * Copyright (C) 2024 fhcomplete.org
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

if (! defined('BASEPATH')) exit('No direct script access allowed');

use \Exception as Exception;

/**
 * This controller operates between (interface) the JS (GUI) and the back-end
 * Provides example data to various ajax calls
 * This controller works with JSON calls on the HTTP GET or POST and the output is always JSON
 */
class Fhcapi extends FHCAPI_Controller
{
	private $querylist = [
		"SELECT * FROM extension.tbl_exampledata",
		"SELECT * FROM extension.tbl_that_doesnt_exist",
		"SELECT fieldthatdoesntexist FROM extension.tbl_exampledata",
		"STATEMENTTHATDOESNTEXIST * FROM extension.tbl_exampledata"
	];
	
	public function __construct()
	{
		parent::__construct([
			'getList' => self::PERM_ANONYMOUS,
			'getError' => self::PERM_ANONYMOUS,
			'getException' => self::PERM_ANONYMOUS,
			'postValidationError' => self::PERM_ANONYMOUS,
			'getAuth' => "somepermissionnobodyhas:rw",
			'postDb' => self::PERM_ANONYMOUS
		]);
	}

	//------------------------------------------------------------------------------------------------------------------
	// Public methods

	/**
	 * @return void
	 */
	public function getList()
	{
		$this->terminateWithSuccess($this->querylist);
	}

	/**
	 * @return void
	 */
	public function getError()
	{
		$this->terminateWithError("Custom Error Message");
	}

	/**
	 * @return void
	 */
	public function getException()
	{
		throw new Exception("Error Processing Request", 1);
	}

	/**
	 * @return void
	 */
	public function postValidationError()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("value", "POST value", "required|numeric");

		if (!$this->form_validation->run())
			$this->terminateWithValidationErrors($this->form_validation->error_array());
		
		$this->terminateWithSuccess("POST value is numeric");
	}

	/**
	 * @return void
	 */
	public function getAuth()
	{
		$this->terminateWithSuccess("User has permission");
	}

	/**
	 * @return void
	 */
	public function postDb()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("query", "Query", "required|integer|less_than[4]|greater_than_equal_to[0]");

		if (!$this->form_validation->run())
			$this->terminateWithValidationErrors($this->form_validation->error_array());

		$this->load->model('extensions/FHC-Core-Developer/Exampledata_model', 'exampledataModel');

		$result = $this->exampledataModel->execReadOnlyQuery($this->querylist[$this->input->post('query')]);
		$data = $this->getDataOrTerminateWithError($result, self::ERROR_TYPE_DB);
		
		$this->terminateWithSuccess($data);
	}
}
