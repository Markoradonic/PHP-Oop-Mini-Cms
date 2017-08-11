<?php



/**
 * Description of Slide
 *
 * @author MR.Radonic
 */

include_once '/../config/config.php';
class Slide {
    public $id;
    public $path;
    public $alt_text;
    
    
        private $db;
    
    
    public function __construct()
            
    {
        global $config;
        $this->db = new PDO('mysql:host='. $config['db_host'] .';dbname='. $config['db_name'] .';charset=utf8mb4', ''. $config['db_username'] .'', '' . $config['db_password'] . '');
    }
    
    
    public function GetAll()
    {
         try
        {

            $stmt = $this->db->query('SELECT * FROM slides');
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Slide');
           
            return $stmt->fetchAll();
            
            
            
        } catch (PDOException $ex)
        {
            
        }

    }
    
    public function Insert($imageName, $altText)
    {
        try
        {

            $stmt = $this->db->prepare('INSERT INTO slides (path, alt_text) VALUES (:path, :alt_text)');
            $stmt->bindValue(":path", $imageName, 2);
            $stmt->bindValue(":alt_text", $altText, 2);
            $stmt->execute();
            
            
        } catch (PDOException $ex)
        {
            
        }
    }// Insert
    
    
    public function Delete($id)
    {
         try
        {

            $stmt = $this->db->prepare('DELETE FROM slides WHERE id = :id');
            $stmt->bindValue(":id", $id, 1);
            if ($stmt->execute() == 0)
            {
                return FALSE;
            } else
            {
                return TRUE;
            }
            
            
        } catch (PDOException $ex)
        {
            echo $ex->getMessage();
            return FALSE;
        }
    }
    
    
    
    public function GetById($id)
    {
          try
        {

            $stmt = $this->db->prepare('SELECT * FROM slides WHERE id = :id');
            $stmt->bindValue(":id", $id, 1);
            $stmt->execute();
            $row = $stmt->fetch();
            $this->id = $row['id'];
            $this->path = $row['path'];
            $this->alt_text = $row['alt_text'];
            
            
           
            
            
        }
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
          
        }
    }
    
    
    public function Update()
    {
       try
        {

            $stmt = $this->db->prepare('UPDATE slides SET alt_text = :alt_text WHERE id = :id');
            $stmt->bindValue(":id", $this->id, 1);
            $stmt->bindValue(":alt_text", $this->alt_text,2);
            $stmt->execute();
            $row = $stmt->fetch();

            
           
            
            
        }
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
          
        }  
    }
    
}
