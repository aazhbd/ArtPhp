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

/* creating the project object for tp and db variable access */
require_once('config/project.class.php');
$al = new Project();

/*
* variables initialization.
*/
$title = "";
$subtitle = "";
$body = "";

/*
* switching to the case according to the url parameter.
*/

$params = getParams();

switch($params[0])
{   
    case 'home':
        $al->tp->assign('title', "WELCOME TO ArticulatePHP");
        $al->tp->assign('subtitle', "- A Simple PHP web development framework");
        
        $body = "<br /><p>It is an open source web application framework to develop scalable web applications with elegant management of codes in the Model-View- Controller approach using PHP and MySQL. It is powered by Smarty Template engine, PDO and JQuery. Its organization is very simplified and robust. It is an easy to use framework for PHP software developers.</p> <p>In ArtculatePHP folder, there are four folders and boot-strapper file, index.php: </p><br /><ul><li> <h3>1. config</h3> It keeps a file called project.php. This php file initializes the template object, database connection object and other project configuration objects and references for the included files that are required to be loaded during project initialization. </li><br /><li><h3> 2. data</h3> This folder keeps the php class library files for database access and static content access and controller library files. </li><br /><li><h3>3. interface</h3> Interface folder keeps the template files required for the view layer and the CSS files and images.</li><br /><li><h3>4. scripts</h3> This folder keeps all kinds of third party javascript, css and php files and folders.</li></ul> <br /><p>The index.php file is at the root of the project folder that acts as bootstrapper. All requests to the various pages of a website are directed to this page and the relevant page is loaded. Moreover according to this framework all POST and GET requests are processed by individual controller pages kept in the parent directory and not redirected to the index.php file. This simplified design has been very helpful for any small or large scale website project development in PHP, MySql programming environment. Websites such as www.articulatelogic.com, www.conveylive.com are exclusively developed using this framework. We are very hopeful that this framework will prove to be very useful for all PHP MySQL developers. </p>";
        $al->tp->assign('body', $body);
        $al->tp->display('main.tpl');
    break;
        
    default:
        $al->tp->assign('title', 'Invalid request for page.');
        $al->tp->assign('subtitle', 'The page is still Underconstruction.');
        $errmsg[] = 'The page is still Underconstruction, cannot file the requested page.';
        $al->tp->assign('errmsg', $errmsg);        
        $al->tp->display('error.tpl');
}


?>
