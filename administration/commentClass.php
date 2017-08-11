<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of comment
 *
 * @author MR.Radonic
 * 
 * 
 */
include_once '/../config/config.php';
include_once '/../data-cls/Page.php';
class comment {
    public $id;
    public $person_name;
    public $content;
    public $id_page;
    public $page;
    private $db;


    public function __construct()
            
    {
        global $config;
        $this->db = new PDO('mysql:host='. $config['db_host'] .';dbname='. $config['db_name'] .';charset=utf8mb4', ''. $config['db_username'] .'', '' . $config['db_password'] . '');
    }
    
    public function GetAllBiIdPage($id)
    {
         try
        {
          
            $stmt = $this->db->prepare('SELECT * FROM comments WHERE id_page = :id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'comment');
            $stmt->execute();
  
            
            return $stmt->fetchAll();
           
          
            
            
            
        } catch (PDOException $ex)
        {
            // catch blok koda
        }
    }
    
    public function Insert()
    {
       try
        {
          
            $stmt = $this->db->prepare('INSERT INTO comments (person_name, content, id_page) VALUES (:person_name, :content , :id_page )');
            $stmt->bindValue(':person_name', $this->person_name, PDO::PARAM_STR);
            $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);
            $stmt->bindValue(':id_page', $this->id_page, PDO::PARAM_INT);
            $stmt->execute();
     
            
        } catch (PDOException $ex)
        {
            // catch blok koda
        } 
    }//..insert
    
    public function GetAll()
    {
         try
        {
            $arrayComments = array();
            $stmt = $this->db->query('SELECT * FROM comments');
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row)
            {
                $comment = new comment();
                $comment->id = $row['id'];
                $comment->person_name = $row['person_name'];
                $comment->content = $row['content'];
                //$comment->page = $row['id_page'];
                
                $comment->page = new Page();
                $comment->page->DeleteByid($row['id_page']);
                array_push($arrayComments, $comment);
            }
            return $arrayComments;
            
        } catch (PDOException $ex)
        {
            // catch blok koda
        } 
    }
}
