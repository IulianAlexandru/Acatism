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
        
    <div id="topic-modal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <h4 class="modal-description"></h4>
            <h4 class="modal-requirement"></h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default buton" data-dismiss="modal" ><a href="#close" rel="modal:close">Close window</a></button>
          </div>
        </div>
      </div>
    </div>
        
    <!--end modal code -->  

    <!--form code -->
      <div id="form-modal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
            
            <?php echo form_open_multipart('profMain/process_form'); ?>
           
                <div class="add">
                    <fieldset>
                        <legend>Adding a new Topic</legend>
                            <ul>
                                <li>
                                    <label>Title</label> <br/>
                                <input id="topicTitle" type="text" name="title" value="Title" maxlength="175" size="30" required />
                                </li> <br/>
                                <li>
                                    <label>Description</label> <br/>
                                <textarea id="topicDescription" rows="6" cols="20"></textarea>
                                </li> <br/>
                                <li>
                                    <label>Type</label> <br />
                                    <input type="radio" name="type" value="master" checked="checked"/> Master <br />
                                    <input type="radio" name="type" value="bachelor" /> Bachelor 
                                </li> <br/>
                                <li>
                                    <label>Requirements:</label> <br/> <br/>
                                    <label>Requirement 1</label>
                                            <input id="req1_number" type="number" name="reqr1" value="5" /> at 
                                            <select id="req1_select">
                                            <?php
                                              for($i=0;$i<count($allSubjects);$i++){
                                                echo "<option value=".$allSubjects[$i]['name'].">".$allSubjects[$i]['name']."</option>";
                                              }
                                            ?>
                                                
                                             </select> <br/>
                                    <label>Requirement 2</label>
                                            <input id="req2_number" type="number" name="reqr2" value="5" /> at 
                                            <select id="req2_select">
                                               <?php
                                                 for($i=0;$i<count($allSubjects);$i++){
                                                   echo "<option value=".$allSubjects[$i]['name'].">".$allSubjects[$i]['name']."</option>";
                                                 }
                                               ?>
                                             </select> <br/>
                                    <label>Requirement 3</label>
                                            <input id="req3_number" type="number" name="reqr3" value="5" /> at 
                                            <select id="req3_select">
                                               <?php
                                                 for($i=0;$i<count($allSubjects);$i++){
                                                   echo "<option value=".$allSubjects[$i]['name'].">".$allSubjects[$i]['name']."</option>";
                                                 }
                                               ?>
                                             </select> <br/> <br/>
                                  </li>
                                <li> 
                                <label>Other</label> <br/>
                                    <textarea id="topicOther" rows="6" cols="20"></textarea>
                                </li>
                            </ul>
                    <input type="submit" id="submitBtn" class="buton" name="submit" value="Add topic">
                    </fieldset>
                </div>
         <?php echo form_close(); ?>
            
          <div class="modal-footer">
            <button type="button" id="closeBtn" class="btn btn-default buton"  data-dismiss="modal" ><a href="#close" rel="modal:close">Close window</a></button>
         
          </div>
        </div>
      </div>
    </div>




    <!--end form code -->
    <div id="main_content">

        <h2>Bachelor</h2>
  <?php 
    echo '<ul id="bachelor">';
    if(count($data) == 0)
      echo '<h3>No topic for Bachelor</h3>';
    else{
      for($i = 0;$i<count($data);$i++){
          if($data[$i]['type'] == 'bachelor'){
              if(!isset($reqArray[$i]['requirement1_subj'])){
                $reqArray[$i]['requirement1_subj'] = "-";
                $reqArray[$i]['requirement1_grade'] = "-";
              }
               if(!isset($reqArray[$i]['requirement2_subj'])){
                $reqArray[$i]['requirement2_subj'] = "-";
                $reqArray[$i]['requirement2_grade'] = "-";
              }
              if(!isset($reqArray[$i]['requirement3_subj'])){
                $reqArray[$i]['requirement3_subj'] = "-";
                $reqArray[$i]['requirement3_grade'] = "-";
              }
             echo "<li class='topicsList cl-effect-1'>".$data[$i]['title']."<a
              href='' class='linkTopic' 
              data-title=".$data[$i]['title']." 
              data-description=\"".$data[$i]['description']."\"
              data-requirement1_subj=".$reqArray[$i]['requirement1_subj']."
              data-requirement1_grade=".$reqArray[$i]['requirement1_grade']."
              data-requirement2_subj=".$reqArray[$i]['requirement2_subj']."
              data-requirement2_grade=".$reqArray[$i]['requirement2_grade']."
              data-requirement3_subj=".$reqArray[$i]['requirement3_subj']."
              data-requirement3_grade=".$reqArray[$i]['requirement3_grade']."><span data-hover='View more'>View more</span></a></li>";
          }
        }
           
    }
    echo '</ul>';
    ?>
         <h2>Master</h2>
  <?php 
    echo '<ul id="master">';
    if(count($data) == 0)
      echo '<h3>No topic for master</h3>';
    else{
      for($i = 0;$i<count($data);$i++){
        if($data[$i]['type'] == 'master'){
            if(!isset($reqArray[$i]['requirement1_subj'])){
              $reqArray[$i]['requirement1_subj'] = "-";
              $reqArray[$i]['requirement1_grade'] = "-";
            }
             if(!isset($reqArray[$i]['requirement2_subj'])){
              $reqArray[$i]['requirement2_subj'] = "-";
              $reqArray[$i]['requirement2_grade'] = "-";
            }
            if(!isset($reqArray[$i]['requirement3_subj'])){
              $reqArray[$i]['requirement3_subj'] = "-";
              $reqArray[$i]['requirement3_grade'] = "-";
            }
           echo "<li class='topicsList cl-effect-1'>".$data[$i]['title']."<a
            href='' class='linkTopic' 
            data-title=".$data[$i]['title']." 
            data-description=\"".$data[$i]['description']."\"
            data-requirement1_subj=".$reqArray[$i]['requirement1_subj']."
            data-requirement1_grade=".$reqArray[$i]['requirement1_grade']."
            data-requirement2_subj=".$reqArray[$i]['requirement2_subj']."
            data-requirement2_grade=".$reqArray[$i]['requirement2_grade']."
            data-requirement3_subj=".$reqArray[$i]['requirement3_subj']."
            data-requirement3_grade=".$reqArray[$i]['requirement3_grade']."><span data-hover='View more'>View more</span></a></li>";
        }
    }
    
           
    }
    echo '</ul>';
    ?>
      <button id="addBtn" class="buton">Add topic</button>
     </div>
        <script>
        
           $(".linkTopic").click(function(e){
             e.preventDefault();
              $(".modal-title").html($(this).attr("data-title"));
              $(".modal-description").html('Description <br><br> '+$(this).attr("data-description"));
            $(".modal-requirement").html("Requirements <br><br>Requirement 1: "+$(this).attr('data-requirement1_subj')+" > "+
              $(this).attr('data-requirement1_grade')+"<br>Requirement 2: "+$(this).attr('data-requirement2_subj')+" > "+
              $(this).attr('data-requirement2_grade')+"<br>Requirement 3: "+$(this).attr('data-requirement3_subj')+" > "+
              $(this).attr('data-requirement3_grade')+"<br>");
            $("#topic-modal").modal({
            fadeDuration: 250,
            showClose: false
            });
           });
        
        $("#addBtn").click(function(e){
           e.preventDefault();
          $("#form-modal").modal({
            fadeDuration: 250,
            showClose: false
          });
        });
        $("#submitBtn").click(function(e){

          e.preventDefault();
          var title = $("#topicTitle").val();
          var description = $("#topicDescription").val();
          var type = $("[name='type']:checked").val();
          var req1_number = $("#req1_number").val();
          var req1_subject = $("#req1_select option:selected").val();
          var req2_subject = $("#req2_select option:selected").val();
          var req3_subject = $("#req3_select option:selected").val();
          var req2_number = $("#req2_number").val();
          var req3_number = $("#req3_number").val();
          var other = $("#topicOther").val();
          var picT = <?php echo $this->session->userdata('pic'); ?>;

           $.ajax({
            type:'POST',
            url:'profMain/process_form',
            data:{'title':title,
                  'description':description,
                  'type':type,
                  'req1_number':req1_number,
                  'req1_subject':req1_subject,
                  'req2_number':req2_number,
                  'req2_subject':req2_subject,
                  'req3_number':req3_number,
                  'req3_subject':req3_subject,
                  'other':other,
                  'picT':picT
                  },
            success:function(data){
                $("#main_content").html(data);
                $("#submitBtn").css({'display':'none'});
            }

           });
          


        });
     
      
        </script>
  </body>



</html>
