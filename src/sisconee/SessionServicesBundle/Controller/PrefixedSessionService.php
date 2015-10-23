<?php
namespace sisconee\SessionServicesBundle\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class PrefixedSessionService {
    protected $session = null;
    protected $prefix = "";
	
    public function __construct(\Symfony\Component\HttpFoundation\Session\Session $session) {
        $this->session = $session;
        $this->prefix = $this->session->get('session_prefix');
    }
	
	public function setPrefix($prefix) {
        $this->prefix = $prefix;
        $this->session->set('session_prefix', $prefix);
	}
	
    public function set($name, $value) {
        $this->session->set($this->prefix . "_" . $name, $value);
    }

    public function get($name, $default="") {
        return $this->session->get($this->prefix . "_" . $name, $default);
    }
}