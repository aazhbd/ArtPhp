{*
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
*}

{if $islogin === true}
    <a href="{$smarty.const.URL}/logout">Logout</a>
    |
    <a href="{$smarty.const.URL}/uhome">Member Home</a>
{else}
    <a href="{$smarty.const.URL}/login">Login</a>
    |
    <a href="{$smarty.const.URL}/signup">Signup</a>
{/if}