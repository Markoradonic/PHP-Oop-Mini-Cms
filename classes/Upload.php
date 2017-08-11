<?php
class Upload 
{
   private $uploadedFile;//u njemu se nalazi fajl koji smo uplodovali
   private $folderPath;//naredjujemo gde ce fajl da se uploduje
   private $supportedTypes = null;
   private $maximumSize = 500000;
   
   private $uploaded = false;
   public $errorMSG;
   
   function __construct ($file) 
   {
       $this->uploadedFile = $file;//Konstruktor ocekuje neki parametar, UPLOAD klasa ima fajl koji zeli da uploaduje
   }
   
   public function SetPath($path) 
   {
       $this->folderPath = $path;//ocekuje parametar-putanju
   }
   
   public function SupportedTypes($types = array())//ocekuje niz. Postavljamo defaultnu vrednost = array() da ne bi doslo do pucanja koda
   {
       $this->supportedTypes= $types;
   }
   
   public function SetMaximumSize($size) 
   {
       $this->maximumSize = $size;
   }
   
   public function Upload()//srce klase-uzima sva svojstva i proverava validnost
   {
       if($this->IsFileValid())//pre nego sto je fajl uplodovan proveravamo da li je fajl validan
       {
           $this->uploadedFile["name"] = str_replace(" ", "_", $this->uploadedFile["name"]);//prazne redove zamenjujemo sa _
           if(move_uploaded_file($this->uploadedFile["tmp_name"], $this->folderPath . "/" .$this->uploadedFile["name"]))//prebacuje fajl sa fizicke lokacije na nase odrediste
                   //move_uploaded_file ako fajl nije prebacen na server izbaci ce FALSE a ako je ste izbaci ce TRUE
           {
               $this->uploaded = TRUE;
           }
           else
           {
               $this->uploaded = FALSE;
           }
       }
   }
   
   public function GetFileName()
   {
       if($this->uploaded)
       {
           return $this->uploadedFile["name"];
       }
   }
   
   public function Is_uploaded()//vraca vrednoste TACNO ili NETACNO
   {
       return $this->uploaded;
   }
   
   
   private function IsFileValid() //funkcija je privatna zato sto pripada samo toj klasi i nema potrebe da se poziva van te klase////proverava da li se nalazi u nizu
   {
       if(in_array($this->uploadedFile["type"], $this->supportedTypes))//da li se u nizu pronalazi vrednost $this->uploadedFile["type"]?? tj proverava da li  je  [type]=>image/jpeg
       {
           if($this->uploadedFile["size"] < $this->maximumSize)
           {
               return TRUE;
           }
           else
           {
               $this->uploaded = FALSE;
               $this->errorMSG = "Uploaded file is too big";
               return FALSE;
           }
       }
       else
       {
           $this->error = TRUE;
           $this->errorMSG = "Uploaded file is not valid type";
           return false;
       }
   }
   
}
