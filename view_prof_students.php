<html>
	<head>
		<base href="<?php echo base_url(); ?>" />
      <link href="css/main_style.css" rel="stylesheet" type="text/css">
        <link href="css/add_topic.css" rel="stylesheet" type="text/css">
        <script src="js/jquery-1.11.0.js"></script>
    <script src="js/main.js"></script>
        <script src="js/jquery.modal.js"></script>
        <script src="js/jquery.modal.min.js"></script>
	</head>
	<body>
		<!--modal code -->   
        
    <div id="students-modal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <h4 class="modal-maincontent"></h4>
            <?php 
            echo "<ul>";
            if(count($registered)==0){
            	echo "No registered students";
            }
            else{
            	for($i=0;$i<count($registered);$i++){
            		echo "<li>Name: ".$registered[$i]['name']." ".$registered[$i]['surname']." -> Topic: ".$registered[$i]['topic']." </li>";
            	}
            }
            	
            echo "</ul>";
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default buton" data-dismiss="modal" ><a href="#close" rel="modal:close">Close window</a></button>
          </div>
        </div>
      </div>
    </div>
        
    <!--end modal code -->  
	<div id="main_content">
		<h2>Notifications</h2>
		<?php
			echo "<ul>";
			if(count($messagesData) == 0){
				echo "<h3>No notifications</h3>";
			}
			else{
				for($i = 0;$i < count($messagesData);$i++){
				
					echo "<li class='messageList'>From: ".$names[$i]['name']." ".$names[$i]['surname']." => Project: <span class='project'>".$messagesData[$i]['message']."
					</span><span class='hiddenPic'>".$messagesData[$i]['from']."</span><button class='accept buton'>Accept</button><button class='decline buton'>Decline</button></li>";
				}
			}
				

			echo "</ul>";
		?>
		<button id="studentsBtn" class="buton">Students</button>
	</div>
	<script>
	$(document).ready(function(){
		$(".hiddenPic").css({'display':'none'});

	});
	$("#studentsBtn").click(function(e){
           e.preventDefault();
          $(".modal-title").html("Your registered students");
          $("#students-modal").modal({
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
		var topic = encodeURIComponent($(this).prevAll(".project").text());
		topic = topic.replace(/[^a-zA-Z0-9-_]/g, '');
		topic = topic.replace("0A0909090909",'');
		
		 $.ajax({
            type:'POST',
            url:'profMain/add_student',
            data:{'picS':picS,
                  'picT':picT,
                  'topic':topic
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
		var topic = encodeURIComponent($(this).prevAll(".project").text());
		topic = topic.replace(/[^a-zA-Z0-9-_]/g, '');
		topic = topic.replace("0A0909090909",'');
		
		 $.ajax({
            type:'POST',
            url:'profMain/decline_student',
            data:{'picS':picS,
                  'picT':picT,
                  'topic':topic
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
