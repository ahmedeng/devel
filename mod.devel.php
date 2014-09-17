<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Devel {

	var $return_data	= '';
	

	
	function __construct()
	{
		// Make a local reference to the ExpressionEngine super object
		$this->EE =& get_instance();

	}
}

/* End of file mod.download.php */
/* Location: ./system/expressionengine/third_party/download/mod.download.php */