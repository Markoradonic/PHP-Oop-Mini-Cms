<?php
include_once '/../config/config.php';
/**
 * Ova klasa komunicirasa bazom podataka
 *
 * @author MR.Radonic
 */
class Page {
    public $id;
    public $title;
    public $content;
    public $error;
    public $error_msg;
    private $db;
    
    
    public function __construct()
            
    {
        global $config;
        $this->db = new PDO('mysql:host='. $config['db_host'] .';dbname='. $config['db_name'] .';charset=utf8mb4', ''. $config['db_username'] .'', '' . $config['db_password'] . '');
    }
    
    public function GetAll()
    {
        //pozivamo sve rzultate iz baze podataka
        try
        {
            $pagesArray = array();
            $stmt = $this->db->query('SELECT * FROM pages');
            $rows = $stmt->fetchAll();
            
            foreach ($rows as $red)
            {
                $page = new Page();
                $page->id = $red['id'];
                $page->title = $red['title'];
                $page->content = $red['content'];
                
                array_push($pagesArray, $page);
                
            }
           
            return $pagesArray;
            
            
            
        } catch (PDOException $ex)
        {
            
        }
    }// \.GetAll
    
    
    public function GetByID($id)
    {
           try
        {
      
            
            $stmt = $this->db->prepare('SELECT * FROM pages WHERE id =:id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Page');
            $stmt->execute();  
            
           $obj = $stmt->fetch();
            
            $this->id = $obj->id;
            $this->title = $obj->title;
            $this->content = $obj->content;
            
            
         
            
        //    return $stmt->fetch();
            
   
           
         
            
            
            
        } catch (PDOException $ex)
        {
            
        }
    }//..GetById
   
    public function Insert()
    {        try
        {
            $stmt = $this->db->prepare('INSERT INTO pages (title, content) VALUES (:title, :content)');
            $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
            $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);
            $stmt->execute(); 
            
            $this->error = false;
        } catch (Exception $ex)
        {
            $this->error_msg = $ex;
            $this->error = true;   
        }

    }
    
    
    //funkcija za brizanje strenice
    public function DeleteByid($id)
    {
        
        try
        {
         $stmt = $this->db->prepare('DELETE FROM  pages WHERE id=:id');
         $stmt->bindValue(':id', $id, PDO::PARAM_STR);
         $stmt->execute();
         
         header('Location: pages.php');
        } catch (Exception $ex)
        {
            echo'Doslo je do greske';
        }
  
    }// .. DeleteByid
    
    
    public function Update($title, $content)
    {
         try
        {
         $stmt = $this->db->prepare('UPDATE pages SET title=:title, content=:content WHERE id=' . $this->id .'');
         $stmt->bindValue(":title", $title, PDO::PARAM_STR);
         $stmt->bindValue(":content", $content, PDO::PARAM_STR);
         $stmt->execute();
         $this->title = $title;
         $this->content = $content;
      
        } catch (Exception $ex)
        {
            echo'Doslo je do greske';
        }
    }// Update 
    
}

/*
 * 
 * public function GetById($id) {
        try
	{
              
            $stmt = $this->db->prepare("SELECT * FROM pages WHERE id=:id");
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Page");
            $stmt->execute();
            
            $obj = $stmt->fetch();
            
            $this->id = $obj->id;
            $this->title = $obj->title;
            $this->content = $obj->content;
            
            //return $stmt->fetch();
	}
            
	catch (PDOException $ex) 
		{
		echo $ex->getMessage();
                }
    }
 */