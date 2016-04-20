<?php
namespace App;

class Request
{
    static $instance;

    protected $server;
    protected $scheme;
    protected $method;
    protected $domain;
    protected $path;
    protected $port = 80;
    protected $segments = [];

    /**
     * Capture the request.
     * @return Request
     */
    public static function capture()
    {
        return static::$instance = new Request( $_SERVER );
    }

    /**
     * Request constructor.
     * @param $server
     */
    public function __construct($server)
    {
        $this->server   = $server;
        $this->scheme   = $server['REQUEST_SCHEME'];
        $this->port     = $server['SERVER_PORT'];
        $this->method   = $server['REQUEST_METHOD'];
        $this->domain   = $server['SERVER_NAME'];
        $this->path     = $server['REQUEST_URI'];
        $this->segments = explode("/",trim($this->path,"/"));
    }

    /**
     * Return the url string.
     * @return string
     */
    public function url()
    {
        return trim(sprintf("%s://%s%s", $this->scheme, $this->domain, $this->path), '/');
    }

    /**
     * Get a segment from the request.
     * @param int $n
     * @return null
     */
    public function segment($n=0)
    {
        if (! isset($this->segments[$n]) || empty($this->segments[$n])) {
            return null;
        }
        return $this->segments[$n];
    }

    public function path()
    {
        return $this->path;
    }
}