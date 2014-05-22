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
        for($i=0;$i<count($registeredArray);$i++){
          $aux = $this->get_data->get_student_name($registeredArray[$i]['picS']);
          $registered[$i]['name'] = $aux['name'];
          $registered[$i]['surname'] = $aux['surname'];
          $registered[$i]['topic'] = $registeredArray[$i]['topic'];
        }
        $dataToPass['messagesData'] = $messagesData;
        $dataToPass['names'] = $names;
        $dataToPass['registered'] = $registered;
 
			 $this->load->view('view_prof_students',$dataToPass);
		}
		

		public function load_subjects($picT){
			$this->load->model('get_data');
            
            $newData = $this->get_data->get_topic_data($picT);
            $dataToPass = array('data' => $newData);
            $reqArray = null;
            for($i=0;$i<count($dataToPass['data']);$i++){
            	if($dataToPass['data'][$i]['requirement1']!=null){
            		$var = $this->get_data->get_req($dataToPass['data'][$i]['requirement1']);
            		$reqArray[$i]['requirement1_subj']= $this->get_data->get_subj_name($var[0]['subjectId']);
            		$reqArray[$i]['requirement1_grade'] = $var[0]['grade'];  
            	}
            	if($dataToPass['data'][$i]['requirement2']!=null){
            		$var = $this->get_data->get_req($dataToPass['data'][$i]['requirement2']);
            		$reqArray[$i]['requirement2_subj']= $this->get_data->get_subj_name($var[0]['subjectId']);
            		$reqArray[$i]['requirement2_grade'] = $var[0]['grade'];  
            	}
            	if($dataToPass['data'][$i]['requirement3']!=null){
            		$var = $this->get_data->get_req($dataToPass['data'][$i]['requirement3']);
            		$reqArray[$i]['requirement3_subj'] = $this->get_data->get_subj_name($var[0]['subjectId']);
            		$reqArray[$i]['requirement3_grade'] = $var[0]['grade'];  
            	}
            }

           $dataToPass['reqArray'] = $reqArray;
           $dataToPass['allSubjects'] = $this->get_data->get_subjects();
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
      $this->load->model('insert_data');
      $this->insert_data->insert_registration($picS,$picT,$topic);
    
  
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
           $req1_number = $this->input->post('req1_number');
           $req1_subject = $this->input->post('req1_subject');
           $req2_number = $this->input->post('req2_number');
           $req2_subject = $this->input->post('req2_subject');
           $req3_number = $this->input->post('req3_number');
           $req3_subject = $this->input->post('req3_subject');
           $other = $this->input->post('other');
           $picT = $this->input->post('picT');

          $this->load->model('insert_data');
          $this->insert_data->insert_topic($picT,$title,$description,$type,$req1_number,$req1_subject,$req2_number,
          $req2_subject,$req3_number,$req3_subject,$other);


          $this->load->model('get_data');
      
          $newData = $this->get_data->get_topic_data($picT);
          $dataToPass = array('data' => $newData);
          $reqArray = null;
          for($i=0;$i<count($dataToPass['data']);$i++){
                if($dataToPass['data'][$i]['requirement1']!=null){
                      $var = $this->get_data->get_req($dataToPass['data'][$i]['requirement1']);
                      $reqArray[$i]['requirement1_subj']= $this->get_data->get_subj_name($var[0]['subjectId']);
                      $reqArray[$i]['requirement1_grade'] = $var[0]['grade'];  
                }
                if($dataToPass['data'][$i]['requirement2']!=null){
                      $var = $this->get_data->get_req($dataToPass['data'][$i]['requirement2']);
                      $reqArray[$i]['requirement2_subj']= $this->get_data->get_subj_name($var[0]['subjectId']);
                      $reqArray[$i]['requirement2_grade'] = $var[0]['grade'];  
                }
                if($dataToPass['data'][$i]['requirement3']!=null){
                      $var = $this->get_data->get_req($dataToPass['data'][$i]['requirement3']);
                      $reqArray[$i]['requirement3_subj'] = $this->get_data->get_subj_name($var[0]['subjectId']);
                      $reqArray[$i]['requirement3_grade'] = $var[0]['grade'];  
                }
          }

           $dataToPass['reqArray'] = $reqArray;
           $dataToPass['allSubjects'] = $this->get_data->get_subjects();
           $this->load->view('view_prof_subjects',$dataToPass);
            
            
    }

	}



?>
