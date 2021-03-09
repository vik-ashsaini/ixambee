<?php
class comman
{
    private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
  
  public function checkuser($email)
  {
    $chk = $this->db->prepare("SELECT email FROM user WHERE email =  :email");
    $chk->bindParam(':email', $email);
    $chk->execute();

    if($chk->rowCount() > 0){
      return true;
    }
    else
    {
     return false;
    }

  }
  public function registeruser($name,$email,$password)       
	{
    try
		{
      
      $stmt = $this->db->prepare("INSERT INTO user (name,email,password) VALUES(:name,:email,:password)");
        $stmt->bindparam(":name",$name);
        
        $stmt->bindparam(":email",$email);
        $stmt->bindparam(":password",$password);
        
        return $stmt->execute();
    
			
		}
		catch(PDOException $e)  
		{					   
			echo $e->getMessage();	
			return false;
		}	
	}
    
    public function loginuser($email,$password)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM user WHERE email=:email LIMIT 1");
          $stmt->execute(array(':email'=>$email));

          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          
          if($stmt->rowCount() > 0)
          {
             if($password === $userRow['password'])
             {
                  $_SESSION['user_session'] = $userRow['id'];
                  return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   
    public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }

   public function user_fetch($id){
        $sql="select * FROM `user` WHERE id='".$id."'";
        $res=$this->db->query($sql);
        return $res;
    }

 }?>
