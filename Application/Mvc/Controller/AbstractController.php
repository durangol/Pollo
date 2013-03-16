<?php

namespace Pollo\Application\Mvc\Controller;

use \Pollo\Request\Http;
use \Pollo\Response\Http;

abstract class AbstractController
{
	protected $_request;
	protected $_response;

	public __construct(Http $request, Http $response)
	{
		$this->_request = $request;
		$this->_response = $response;
	}
}