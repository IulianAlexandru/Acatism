<html>
	<head>
		<base href="<?php echo base_url(); ?>" />
      <link href="css/add_topic.css" rel="stylesheet" type="text/css">
      <link href="css/m-styles.min.css" rel="stylesheet" type="text/css">
      <link href="css/main_style.css" rel="stylesheet" type="text/css">
        
        <script src="js/jquery-1.11.0.js"></script>
        <script src="js/main.js"></script>
        <script src="js/jquery.modal.js"></script>
        <script src="js/jquery.modal.min.js"></script>
	</head>
	<body>
		<!--modal profile code -->   
        
    <div id="viewProfile-modal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <h4 class="modal-firstContent"></h4>
              <h4 class="modal-secondContent"></h4>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default buton" data-dismiss="modal" ><a href="#close" rel="modal:close">Close window</a></button>
          </div>
        </div>
      </div>
    </div>
        
    <!--end modal profile code -->  
        <!--modal deadlines code -->   
        
    <div id="viewDeadlines-modal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <h4 class="modal-maincontent"></h4>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default buton" data-dismiss="modal" ><a href="#close" rel="modal:close">Close window</a></button>
          </div>
        </div>
      </div>
    </div>
        
    <!--end modal deadlines code -->  
         <!--modal message code -->   
        
    <div id="sendMessage-modal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <h4 class="modal-maincontent"></h4>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default buton" data-dismiss="modal" ><a href="#close" rel="modal:close">Close window</a></button>
          </div>
        </div>
      </div>
    </div>
        
    <!--end modal message code -->  
	<div id="main_content">
		<h2>Notifications</h2>
		<?php
			echo "<ul>";
			if(count($messagesData) == 0){
				echo "<h3>No notifications</h3>";
			}
			else{
				for($i = 0;$i < count($messagesData);$i++){
				
					echo "<li class='messageList'>From: ".$names[$i]['name']." ".$names[$i]['surname']." => Project: <span class='project'>".$names[$i]['topic']."
					</span><span class='hiddenPic' style='display:none;'>".$messagesData[$i]['from']."</span><span class='hiddenTopic' style='display:none;'>".$names[$i]['topicId']."</span><button class='accept buton'>Accept</button><button class='decline buton'>Decline</button></li>";
				}
			}
				

			echo "</ul>";
		?>
        <h2>Registered Students</h2>
          <?php 
            echo "<ul>";
            if(count($registered)==0){
            	echo "No registered students";
            }
            else{
            	for($i=0;$i<count($registered);$i++){
            		echo "<li class='registerList cl-effect-1' >Name: ".$registered[$i]['name']." ".$registered[$i]['surname']." -> Topic: ".$registered[$i]['topic']."<a href='' class='deleteStudent m-btn red ' data-studentNo=".$i."><span data-hover='Delete student'>Delete student</span><i class='icon-trash'></i></a><a href='' class='viewDeadlines m-btn blue' data-studentNo=".$i."><span data-hover='View deadlines'>View deadlines</span><i class='icon-plus'></i></a><a href='' class='viewProfile m-btn red' data-studentNo=".$i."><span data-hover='View profile'>View profile</span><i class='icon-trash'></i></a><a href='' class='sendMessage m-btn blue' data-studentNo=".$i."><span data-hover='Send message'>Send message</span><i class='icon-trash'></i></a>";
            	}
            }
            	
            echo "</ul>";
            ?>
		<!--<button id="studentsBtn" class="buton">Students</button>-->
	</div>
	<script>
	$(document).ready(function(){
		

	});
	/*$("#studentsBtn").click(function(e){
           e.preventDefault();
          $(".modal-title").html("Your registered students");
          $("#students-modal").modal({
            fadeDuration: 250,
            showClose: false
          });
        });*/
        
    $(".viewProfile").click(function(e){
       e.preventDefault(); 
        var studentNo = $(this).attr("data-studentNo");
        var registered = <?php echo json_encode($registered); ?>;
        var grades = registered[studentNo]['grades'];
        $("#viewProfile-modal .modal-title").html(registered[studentNo]['name']+' '+registered[studentNo]['surname']);
        var firstContent = 'Nume: '+registered[studentNo]['name']+'<br>'+'Prenume: '+registered[studentNo]['surname']+'<br>'+'PIC: '+registered[studentNo]['picS']+'<br>';
        $("#viewProfile-modal .modal-firstContent").html(firstContent);
        var firstYearHtml = '<fieldset><legend>First Year</legend>';
        var secondYearHtml = '<fieldset><legend>Second Year</legend>';
        var thirdYearHtml = '<fieldset><legend>Third Year</legend>';
        for(var i = 0;i< grades.length;i++){
            if(grades[i]['year'] == 1){
                firstYearHtml = firstYearHtml + 'Subject: '+grades[i]['name']+'<br>'+'Value: '+grades[i]['val']+'<br>';
            }
            else if(grades[i]['year'] == 2){
                secondYearHtml = secondYearHtml + 'Subject: '+grades[i]['name']+'<br>'+'Value: '+grades[i]['val']+'<br>';
            }
            else if(grades[i]['year'] == 3){
                thirdYearHtml = thirdYearHtml + 'Subject: '+grades[i]['name']+'<br>'+'Value: '+grades[i]['val']+'<br>';
            }
        }
        firstYearHtml = firstYearHtml+'</fieldset>';
        secondYearHtml = secondYearHtml+'</fieldset>';
        thirdYearHtml = thirdYearHtml+'</fieldset>';
        var secondContent = firstYearHtml+secondYearHtml+thirdYearHtml;
        $('#viewProfile-modal .modal-secondContent').html(secondContent);
         $("#viewProfile-modal").modal({
            fadeDuration: 250,
            showClose: false
            });
    });  
    $(".deleteStudent").click(function(e){
        e.preventDefault();
        
           var val = confirm("Do you really want to delete this student?");
            if (val == true){
                var studentNo = $(this).attr("data-studentNo");
                var registered = <?php echo json_encode($registered); ?>;
                var picS = registered[studentNo]['picS'];
                var picT = <?php echo $this->session->userdata('pic'); ?>;
                $.ajax({
                    type:'POST',
                    url:'profMain/delete_registered_student',
                    data:{'picS':picS,
                          'picT':picT,
                          },
                    success:function(data){

                       $("#main_content").html(data);
                        },
                    error: function (jqxhr, status, error) {
                        alert(error);
                    }
                });
            }
    });
    $(".sendMessage").click(function(e){
        e.preventDefault();
         var studentNo = $(this).attr("data-studentNo");
       var registered = <?php echo json_encode($registered); ?>;
       $("#sendMessage-modal .modal-title").html('Message to '+registered[studentNo]['name']+' '+registered[studentNo]['surname']);
        $("#sendMessage-modal .modal-maincontent").html('<span class="hiddenPic" style="display:none">'+registered[studentNo]['picS']+'</span><label>Subject:</label><input type="text" class="sendInput" name="subject-dest" value="Subject"> <br/><label>Message</label> <br/><textarea class="sendTextArea" rows="5" cols="50" name="mesage"> </textarea> <br/> <button id="sendBtn">Send message</button>');
      $("#sendMessage-modal").modal({
        fadeDuration: 250,
        showClose: false
        });
        $("#sendBtn").click(function(e){
            e.preventDefault();
            var picS = $("#sendMessage-modal .hiddenPic").text();
            var message = $("#sendMessage-modal .sendInput").val()+' : '+$("#sendMessage-modal .sendTextArea").val();
            var picT = <?php echo $this->session->userdata('pic'); ?>;
            
            $("#sendBtn").css('display','none');
             $.ajax({
            type:'POST',
            url:'profMain/send_message_register',
            data:{'picS':picS,
                  'picT':picT,
                  'message':message
                  },
            success:function(data){
            	alert('Message sent!');
               $("#main_content").html(data);
            	},
        	error: function (jqxhr, status, error) {
                alert(error);
            }
			});
        });
    });
   
    $(".viewDeadlines").click(function(e){
       e.preventDefault(); 
       var studentNo = $(this).attr("data-studentNo");
       var registered = <?php echo json_encode($registered); ?>;
       var deadlines = registered[studentNo]['deadlines'];
       $("#viewDeadlines-modal .modal-title").html(registered[studentNo]['name']+' '+registered[studentNo]['surname']+'\'s deadlines');
        var deadlinesHtml = "";
       for(var i = 0;i<deadlines.length;i++){
           deadlinesHtml = deadlinesHtml + 'Deadline: '+deadlines[i]['value']+'<br>';
           if(deadlines[i]['done'] == '0000-00-00'){
               deadlinesHtml = deadlinesHtml + 'Status: not done yet<br>';
           }
           else{
               deadlinesHtml = deadlinesHtml + 'Status: finished at '+deadlines[i]['done']+'<br>';
           }
           
           deadlinesHtml = deadlinesHtml + 'Additional info: '+deadlines[i]['additional']+'<br> Finish date: '+deadlines[i]['date']+'<hr>';
       }
        $("#viewDeadlines-modal .modal-maincontent").html(deadlinesHtml);
       $("#viewDeadlines-modal").modal({
            fadeDuration: 250,
            showClose: false
            });
    });
	$(".messageList .accept").click(function(e){
		e.preventDefault();
		$(".activeB").removeClass('activeB');
		$(this).addClass('activeB');
		var picS = $(this).prevAll(".hiddenPic").text();
		var picT = <?php echo $this->session->userdata('pic'); ?>;
		var topicId = $(this).prevAll(".hiddenTopic").text();
		
		 $.ajax({
            type:'POST',
            url:'profMain/add_student',
            data:{'picS':picS,
                  'picT':picT,
                  'topicId':topicId
                  },
            success:function(data){
            	
               $("#main_content").html(data);
            	},
        	error: function (jqxhr, status, error) {
                alert(error);
            }
			});

	});
	$(".messageList .decline").click(function(e){
		e.preventDefault();
		$(".activeB").removeClass('activeB');
		$(this).addClass('activeB');
		var picS = $(this).prevAll(".hiddenPic").text();
		var picT = <?php echo $this->session->userdata('pic'); ?>;
		var topicId = $(this).prevAll(".hiddenTopic").text();
		 $.ajax({
            type:'POST',
            url:'profMain/decline_student',
            data:{'picS':picS,
                  'picT':picT,
                  'topicId':topicId
                  },
            success:function(data){
            	
               $("#main_content").html(data);
            	},
        	error: function (jqxhr, status, error) {
                alert(error);
            }
			});
	});
	</script>

	</body>



</html>
