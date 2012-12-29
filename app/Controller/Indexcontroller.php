<?php

class IndexController extends AppController {
    
    public $helpers = array('Html', 'Form');

    
   
   
    public function index() {
        if (isset($_COOKIE["T3con"]) || isset($_POST['skip'])){
            // $cookie_value=array('intro'=>"skipt", 'session_id'=>"xy");
             
           if (isset($_COOKIE["T3con"])){
               $skip=$_COOKIE["T3con"];
           }
            elseif(isset($_POST['skip'])){
                 setcookie("T3con", "skip", time()+3600);
                 $skip="skip";
            }
            else{
                setcookie("T3con", "watched", time()+3600); 
                $skip="watched";
            }
          //  setcookie("T3con", "watched", time()-3600); 

             $this->loadModel("Conference");
             $conference=$this->Conference->findById(1);

             $url_para=$this->params['url'];
             if (isset($url_para['day'])){
                 $day=$url_para['day'];
             }
             else{
                 $day="Friday";
             }
             if (isset($url_para['conference_id'])){          
                 $conference_id=$url_para['conference_id'];
             }
             else{
                 $conference_id=1;
             }


             $this->loadModel("Programpoint");
             $programpoints=$this->Programpoint->query("Select * from programpoints left join Referents as referent1 on Programpoints.referent_id=referent1.id left join Referents as referent2 on Programpoints.referent2_id=referent2.id left join topics on programpoints.topic_id=topics.id  WHERE `conference_id`='$conference_id' and `day`='$day' order by programpoints.start_time ASC");
            // print_r($programpoints);
           /*  $options['conditions']=array('programpoints.conference_id'=>$id);
             //$options['fields']=array();
             $options['joins']=array(
                 array(
                     'table' => 'referents',
                //     'alias'=>'r',
                     'type'=>'LEFT',
                     'conditions'=>array('Programpoint.referent_id=referents.id'),
                     'fields'=>array('lastname AS lastname1','firstname AS firstname1'),
                 )/*,
                 array(
                     'table' => 'referents',
                    // 'alias'=>'r',
                     'type'=>'LEFT',
                     'conditions'=>array('Programpoint.referent2_id=referents.id')
                 )*///);
            // $rows=$this->Programpoint->find('all',$options); 
          //   print_r($rows);



             $this->set('con', $conference);
             $this->set('points', $programpoints);
             $this->set('day', $day);
             $this->set('skip', $skip);
             $this->render('home');
          

        }
        
        else{
            $this->render('intro');
        }
    }
    
}
?>
