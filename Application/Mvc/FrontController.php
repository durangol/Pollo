<?php

namespace Pollo\Application\Mvc;
use \Pollo\Application\Bootstrap\BootstrapInterface as Bootstrap;
use \Pollo\Application\Mvc\Dispatcher\DispatcherInterface as Dispatcher;

class FrontController
{
	protected static $_instance;
	protected $_bootstrap;
	protected $_dispatcher;

	protected function __construct()
	{
	}

	public static function getInstance()
	{
		if (self::$_instance === null) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function setBootstrap(Bootstrap $bootstrap)
	{
		$this->_bootstrap = $bootstrap;
		return $this;
	}

	public function setDispatcher(Dispatcher $dispatch)
	{
		$this->_dispatcher = $dispatch;
		return $this;
	}

	public function dispatch()
	{
		$request = $this->_dispatcher->getRequest();

	}
}