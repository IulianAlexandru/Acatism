<?php

class Profmain extends CI_Controller{

		public function index(){

		$this->load->view('view_prof');
			
		}
		public function load_students($picT){
        $this->load->model('get_data');
        $messagesData = $this->get_data->get_messages_apply($picT);
        $names = null;
       
        for($i=0;$i<count($messagesData);$i++){
          $aux = $this->get_data->get_student_name($messagesData[$i]['from']);
          $names[$i]['name'] = $aux['name'];
          $names[$i]['surname'] = $aux['surname'];
        }
        $registeredArray = $this->get_data->get_registered($picT);
        if($registeredArray == null){
          $registered = null;
        }
        else{
                for($i=0;$i<count($registeredArray);$i++){
                  $aux = $this->get_data->get_student_name($registeredArray[$i]['picS']);
                  $registered[$i]['name'] = $aux['name'];
                  $registered[$i]['surname'] = $aux['surname'];
                  $registered[$i]['topic'] = $this->get_data->get_topic_name($registeredArray[$i]['topicId']);
                }
           }
        $dataToPass['messagesData'] = $messagesData;
        $dataToPass['names'] = $names;
        $dataToPass['registered'] = $registered;
        $this->load->view('view_prof_students',$dataToPass);
		}
		

		public function load_subjects($picT){
			$this->load->model('get_data');          
            $newData = $this->get_data->get_topic_data($picT);          
            $requirements = null;         
            for($i=0;$i<count($newData);$i++){
            	$requirements = $this->get_data->get_req_topic($newData[$i]['topicId']);
             
                for($j=0;$j<count($requirements);$j++){
                    $reqId = $requirements[$j]['reqId'];
                    $auxArray = $this->get_data->get_req($reqId);
                    
                    $requirements[$j]['subjName'] = $this->get_data->get_subj_name($auxArray['subjectId']);
                    $requirements[$j]['grade'] = $auxArray['grade'];
                }
                $newData[$i]['requirements'] = $requirements;
            }
            $dataToPass['data'] = $newData;
           $dataToPass['allSubjects'] = $this->get_data->get_subjects();
            $dataToPass['auxArray'] = $auxArray;
			$this->load->view('view_prof_subjects',$dataToPass);
		}
		public function load_deadlines(){
                  $this->load->model('get_data');
                  $array['ceva'] = $this->get_data->get_subject_id('Logica');
			$this->load->view('view_prof_deadlines',$array);
		}
		public function load_suggestion(){
			$this->load->view('view_prof_suggestion');
		}
    public function add_student(){
      $picS = $this->input->post('picS');
      $picT = $this->input->post('picT');
      $topic = $this->input->post('topic');
      $this->load->model('get_data');
      $topicId = $this->get_data->get_topic_id($topic);
      $this->load->model('insert_data');    
      $this->insert_data->insert_registration($picS,$picT,$topicId);
    
  
      $message = "You have been accepted!";
      $type = 'notif';
      $this->insert_data->send_message($picT,$picS,$message,$type);
      $this->load->model('delete_data');
      $this->delete_data->delete_notif($picS,$picT,$topic);

      $this->load->model('get_data');
        $messagesData = $this->get_data->get_messages_apply($picT);
        $names = null;
        for($i=0;$i<count($messagesData);$i++){
          $aux = $this->get_data->get_student_name($messagesData[$i]['from']);
          $names[$i]['name'] = $aux['name'];
          $names[$i]['surname'] = $aux['surname'];
        }
        $dataToPass['messagesData'] = $messagesData;
        $dataToPass['names'] = $names;
 
       $this->load->view('view_prof_students',$dataToPass);
     
    }
    public function decline_student(){
      $picS = $this->input->post('picS');
      $picT = $this->input->post('picT');
      $topic = $this->input->post('topic');
      $message = "You have been rejected!";
      $type = 'notif';
      $this->load->model('insert_data');  
      $this->insert_data->send_message($picT,$picS,$message,$type);
      $this->load->model('delete_data');
      $this->delete_data->delete_notif($picS,$picT,$topic);

      $this->load->model('get_data');
        $messagesData = $this->get_data->get_messages_apply($picT);
        $names = null;
        for($i=0;$i<count($messagesData);$i++){
          $aux = $this->get_data->get_student_name($messagesData[$i]['from']);
          $names[$i]['name'] = $aux['name'];
          $names[$i]['surname'] = $aux['surname'];
        }
        $dataToPass['messagesData'] = $messagesData;
        $dataToPass['names'] = $names;
 
       $this->load->view('view_prof_students',$dataToPass);
    }
    public function process_form(){
           $title = $this->input->post('title');
           $description = $this->input->post('description');
           $type = $this->input->post('type');
           $requirements1 = $this->input->post('requirements');
           $domain = $this->input->post('domain');
           $picT = $this->input->post('picT');
         $this->load->model('insert_data');
          $this->insert_data->insert_topic($picT,$title,$description,$type,$domain,$requirements1);
            

          $this->load->model('get_data');          
            $newData = $this->get_data->get_topic_data($picT);          
            $requirements = null;         
            for($i=0;$i<count($newData);$i++){
            	$requirements = $this->get_data->get_req_topic($newData[$i]['topicId']);
             
                for($j=0;$j<count($requirements);$j++){
                    $reqId = $requirements[$j]['reqId'];
                    $auxArray = $this->get_data->get_req($reqId);
                    
                    $requirements[$j]['subjName'] = $this->get_data->get_subj_name($auxArray['subjectId']);
                    $requirements[$j]['grade'] = $auxArray['grade'];
                }
                $newData[$i]['requirements'] = $requirements;
            }
            $dataToPass['data'] = $newData;
           $dataToPass['allSubjects'] = $this->get_data->get_subjects();
            $dataToPass['auxArray'] = $auxArray;
			$this->load->view('view_prof_subjects',$dataToPass);
            
            
    }
    public function edit_form(){
            $title = $this->input->post('title');
           $description = $this->input->post('description');
           $type = $this->input->post('type');
           $requirements1 = $this->input->post('requirements');
           $domain = $this->input->post('domain');
           $picT = $this->input->post('picT');
           $topicId = $this->input->post('topicId');
           $this->load->model('update_data');
           $this->update_data->update_topic($picT,$title,$description,$type,$domain,$requirements1,$topicId);
            

          $this->load->model('get_data');          
            $newData = $this->get_data->get_topic_data($picT);          
            $requirements = null;         
            for($i=0;$i<count($newData);$i++){
            	$requirements = $this->get_data->get_req_topic($newData[$i]['topicId']);
             
                for($j=0;$j<count($requirements);$j++){
                    $reqId = $requirements[$j]['reqId'];
                    $auxArray = $this->get_data->get_req($reqId);
                    
                    $requirements[$j]['subjName'] = $this->get_data->get_subj_name($auxArray['subjectId']);
                    $requirements[$j]['grade'] = $auxArray['grade'];
                }
                $newData[$i]['requirements'] = $requirements;
            }
            $dataToPass['data'] = $newData;
           $dataToPass['allSubjects'] = $this->get_data->get_subjects();
            $dataToPass['auxArray'] = $auxArray;
			$this->load->view('view_prof_subjects',$dataToPass);
    }
    public function delete_topic(){
        $topicId = $this->input->post('topicId');
        $picT = $this->input->post('picT');
        $this->load->model('delete_data');
        $this->delete_data->delete_topic($topicId);
         $this->load->model('get_data');          
            $newData = $this->get_data->get_topic_data($picT);          
            $requirements = null;         
            for($i=0;$i<count($newData);$i++){
            	$requirements = $this->get_data->get_req_topic($newData[$i]['topicId']);
             
                for($j=0;$j<count($requirements);$j++){
                    $reqId = $requirements[$j]['reqId'];
                    $auxArray = $this->get_data->get_req($reqId);
                    
                    $requirements[$j]['subjName'] = $this->get_data->get_subj_name($auxArray['subjectId']);
                    $requirements[$j]['grade'] = $auxArray['grade'];
                }
                $newData[$i]['requirements'] = $requirements;
            }
            $dataToPass['data'] = $newData;
           $dataToPass['allSubjects'] = $this->get_data->get_subjects();
            $dataToPass['auxArray'] = $auxArray;
			$this->load->view('view_prof_subjects',$dataToPass);
    }
    
}



?>
