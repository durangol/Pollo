<?php

namespace Pollo\Response;

/**
 * The HTTP implementation of a response
 */
class Http implements ResponseInterface
{
    /**
     * The response body
     * @var string
     */
    protected $_body;

    /**
     * array of HTTP headers
     * @var array
     */
    protected $_headers = array();

    /**
     * HTTP response code
     * @var int
     */
    protected $_responseCode = 200;

    /**
     * Returns the response body
     * @return string
     */
    public function getBody()
    {
        return $this->_body;
    }


    /**
     * Sets the response body
     * @param string $body
     */
    public function setBody($body)
    {
        $this->_body = $body;
    }

    /**
     * Returns the array of headers
     * @return array
     */
    public function getHeaders()
    {
        return $this->_headers;
    }

    /**
     * Sets header which will be sent once send() is called
     * @param string $id
     * @param string $value
     */
    public function setHeader($id, $value)
    {
        $this->_headers[$id] = $value;
    }

    /**
     * Wrapper for setHeader
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        foreach ($headers as $key => $value) {
            $this->setHeader($key, $value);
        }
    }

    /**
     * Returns HTTP response code
     * @return $code
     */
    public function getResponseCode()
    {
        return $this->_responseCode;
    }

    /**
     * Sets the HTTP response code
     * @param int $code
     */
    public function setResponseCode($code)
    {
        if ((int)$code < 100 || (int)$code > 599) {
            throw new \InvalidArgumentException('The response code must be between 100 and 599');
        }
        $this->_responseCode = (int)$code;
    }

    /**
     * Appends content after body
     * @param string $content
     */
    public function appendToBody($content)
    {
        $this->_body .= $content;
    }

    /**
     * Adds content before the body
     * @param string $content
     */
    public function prependToBody($content)
    {
        $this->_body = $content . $this->_body;
    }

    /**
     * Sets the headers and outputs the response
     */
    public function send()
    {
        foreach ($this->_headers as $key => $value) {
            header($key . ': ' . $value);
        }
        echo $this->_body;
    }
}