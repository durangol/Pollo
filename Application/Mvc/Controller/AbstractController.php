<?php

namespace Pollo\Application\Mvc\Controller;

use \Pollo\Request\Http;
use \Pollo\Response\Http;
use \Pollo\Application\Mvc;

abstract class AbstractController
{
    protected $_request;
    protected $_response;
    protected $_view;

    public function __construct(Http $request, Http $response)
    {
        $this->_request = $request;
        $this->_response = $response;
        $this->_view = new View();
    }
}