<?php

/**
 * /application/core/MY_Loader.php
 *
 */
class MY_Loader extends CI_Loader {
	
	
    public function template($template_name, $vars = array(), $return = FALSE){
        $content  = $this->view('common/header', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('common/footer', $vars, $return);
		
        if($return) {
            return $content;
        }
    }

    public function loginTemplate($template_name, $vars = array(), $return = FALSE){
        $content  = $this->view('common/login-header', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('common/login-footer', $vars, $return);
        
        if($return) {
            return $content;
        }
    }
	
	
}