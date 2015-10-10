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

class Dblib
{
    var $err;
    var $dbh;

	function Dblib($host, $dbname, $user, $pass)
	{
        $this->err = "";

        try {
            $this->dbh = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $pass);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            $this->err = "Error occured: " . $e->getMessage();
        }
	}
    
    function executeQuery($query)
    {
        $result = array();
        
        try{
            $st = $this->dbh->prepare($query);
            
            $st->execute();
            
            $r = $st->fetchAll();
            
            foreach ($r as $line)
            {
                $result[] = $line;
            }
        }
        catch(PDOException $e)
        {
            $this->err = "Error occured: " . $e->getMessage();
            return false;
        }
        
        return $result;
    }
    
    function executeNonQuery($query)
    {
        try{
            $st = $this->dbh->prepare($query);
            $st->execute();
        }
        catch(PDOException $e)
        {
            $this->err = "Error occured: " . $e->getMessage();
            return false;
        }
        
        return true;
    }
    
    function selectData($query)
    {
        $result = array();
        /*
        $q = trim($query);
        $p = stripos($q, "select");
        if($p === false)
        {
            $this->err = "invalid request";
            return false;
        }
        */
        try{
            $st = $this->dbh->prepare($query);
            $st->execute();
            $r = $st->fetchAll();
            foreach ($r as $line)
            {
                $result[] = $line;
            }
        }
        catch(PDOException $e)
        {
            $this->err = "error occured : " . $e->errorInfo[2];
            return false;
        }
        
        return $result;
    }
    
    function insertData($query)
    {
        $q = trim($query);
        $p = stripos($q, "insert");
        if($p === false)
        {
            $this->err = "invalid request";
            return false;
        }
        
        try{
            $st = $this->dbh->prepare($query);
            $st->execute();
        }
        catch(PDOException $e)
        {
            $this->err = "error occured : " . $e->errorInfo[2];
            return false;
        }
        
        return true;
    }
    
    function updateData($query)
    {
        $q = trim($query);
        $p = stripos($q, "update");
        if($p === false)
        {
            $this->err = "invalid request";
            return false;
        }
        
        try{
            $st = $this->dbh->prepare($query);
            $st->execute();
        }
        catch(PDOException $e)
        {
            $this->err = "error occured : " . $e->errorInfo[2];
            return false;
        }
        
        return true;
    }
    
    function deleteData($query)
    {
        $q = trim($query);
        $p = stripos($q, "delete");
        if($p === false)
        {
            $this->err = "invalid request";
            return false;
        }
        
        try{
            $st = $this->dbh->prepare($query);
            $st->execute();
        }
        catch(PDOException $e)
        {
            $this->err = "error occured : " . $e->errorInfo[2];
            return false;
        }
        
        return true;
    }
    
    function insertImage($query, $image, $strparams)
    {
        try
        {
            $stmt = $this->dbh->prepare($query);
            for($i=0; $i < (count($strparams)); $i++ )
            {
                $stmt->bindParam($i + 1, $strparams[$i]);
                $hi = $i;
            }
            $stmt->bindParam($i+1, $image, PDO::PARAM_LOB);

            $this->dbh->beginTransaction();
            $stmt->execute();
            $this->dbh->commit();
        }
        catch(PDOException $e)
        {
            $this->err = "error occured : " . $e->errorInfo[2];
            return false;
        }
        
        return true;
    }
    
    function closeDB()
    {
        $this->dbh = null;
    }
}

?> 
