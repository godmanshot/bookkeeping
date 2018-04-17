<?php

namespace App;

class SiteSetting {

	public $xml_file;
	public $file;

	function __construct($file_name) {
		$this->file = $file_name;
		$this->xml_file = simplexml_load_file($file_name);
	}

	public function getInstance() {
		return $this->xml_file;
	}

    public function __set($name, $value) 
    {
        $this->xml_file->$name = $value;
    }

    public function __get($name) 
    {
    	if(isset($this->xml_file->$name))
    		return $this->xml_file->$name;
    }

    public function __call($name, $value) 
    {
        $this->xml_file->$name = $value;
    }

    public function save() {
    	return file_put_contents($this->file, $this->xml_file->asXML());
    }

}