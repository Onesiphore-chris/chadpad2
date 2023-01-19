  <?php

if(isset($_SESSION['user']))
{
    include "config.php";

    $req = $dbb->prepare("SELECT * FROM messages ORDER BY id_m DESC" );
    $req->execute();
    $row = $req->rowCount();
    $messages = $req->fetchAll(PDO::FETCH_ASSOC);
   
    if($row == 0)
    {

        echo 'Messagerie  vide';

    }else
    {
        

        foreach($messages as $message){
                if($message['email'] == $_SESSION['user']){

               
                ?>
                      <div class="message  your_message ">
                            <span><?= $message['email'];?></span>
                            <p><?= $message['mgs'];?></p>
                            <p class="date"><?=$message['date'];?></p>
                        </div>
                <?php
                     }
                     else{

                ?>

                <div class="message others_message">
                <span><?= $message['email'];?></span>
                <p><?= $message['mgs'];?></p>
                <p class="date"><?=$message['date'];?></p>
                </div> 

            <?php
               }
            }
        }
    }
   




?>
  
  
  
  
  





 
                
              