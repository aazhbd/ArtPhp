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

/*
*   System variables definition.
*/
define('PATH', str_replace(DIRECTORY_SEPARATOR, '/', realpath(dirname(__FILE__).'/..')));
define('ROOT', str_replace(' ', '%20', preg_replace('/'.preg_quote(str_replace(DIRECTORY_SEPARATOR, '/', $_SERVER['DOCUMENT_ROOT']), '/').'\/?/', '', str_replace(DIRECTORY_SEPARATOR, '/', realpath(dirname(__FILE__) . '/..')))));
define('URL', (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . (strlen(ROOT) ? ("/" . ROOT) : ''));
error_reporting(E_ALL ^ E_NOTICE);

/*
*   Database variables definition.
*/
define('HOST', 'localhost');
define('DBNAME', 'Your Database Name');
define('DBUSER', 'Your User Name');
define('DBPASS', 'Your Passoword');

/*
*   Project class definition;
*   establishes database connection, creates tempate object and load library classes.
*/
class Project
{
    var $db;
    var $tp;

    function Project()
    {
        $this->loadlib();

        $this->db = new DBlib(HOST, DBNAME, DBUSER, DBPASS);
        
        /*Error checking for database connectivity.*/
        if($this->db->err != ""){
            //Errors::report($this->db->err);
            //exit;
        }
        
        $this->tp = new Template();
    }
    
    function loadlib()
    {
        require_once(PATH . '/libs/functions.php');
        
        require_once(PATH . '/libs/template.class.php');
        require_once(PATH . '/libs/users.class.php');
        require_once(PATH . '/libs/errors.class.php');
        require_once(PATH . '/libs/dblib.class.php');
        require_once(PATH . '/scripts/fckeditor/fckeditor_php5.php');
    }
}

?>