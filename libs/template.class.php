<?php
/**
* An open source web application development framework for PHP 5 and above.
*
* @author        ArticulateLogic Labs
* @author        Abdullah Al Zakir Hossain, Email: aazhbd@yahoo.com 
* @author        Syeda Tasneem Rumy, Email: tasneemrumy@gmail.com
* @author        Abdullah Al Zakir Hossain, Email: aazhbd@yahoo.com
* @copyright     Copyright (c)2009-2010 ArticulateLogic Labs, creative software engineering
* @license       www.articulatelogic.com/a/privacy,  www.articulatelogic.com/a/terms
* @link          http://www.articulatelogic.com
* @since         Version 1.0
*  
*/

require_once(PATH . '/scripts/libs/Smarty.class.php');

class Template extends Smarty
{
    function Template()
    {
        $this->Smarty();
        $this->template_dir = PATH . '/interface/';
        $this->compile_dir = PATH . '/scripts/libs/compile/';
        $this->config_dir = PATH . '/scripts/libs/config/';
        $this->cache_dir = PATH . '/scripts/libs/cache/';
    }
}

?>
