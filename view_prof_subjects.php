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
        <script src="js/jquery-ui-1.10.4.js"></script>
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
              <h4 class="modal-domain"></h4>
            <h4 class="modal-requirement"></h4>
            
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-default m-btn blue" data-dismiss="modal" ><a href="#close" rel="modal:close"><i class="icon-remove"></i>Close window</a></button>
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
                                <label>Domain</label> <br/>
                                    <input id="topicDomain" type="text" name="domain" >
                                    
                                </li>
                                <li>
                                    <label>Requirements:</label> <br/> <br/>
                                       <button id="reqBtn" class="m-btn blue" >Add requirement<i class="icon-plus"></i></button>
                                    
                                           
                                    
                                  </li>
                                
                            </ul>
                     <input type="submit" id="submitBtn" class="m-btn blue" name="submit" value="Add topic"> <i class="icon-share-alt"></i>
                    </fieldset>
                </div>
         <?php echo form_close(); ?>
            
          <div class="modal-footer">
            <button type="button" id="closeBtn" class="btn btn-default m-btn blue"  data-dismiss="modal" ><a href="#close" rel="modal:close"><i class="icon-remove"></i>Close window</a></button>
         
          </div>
        </div>
      </div>
    </div>




    <!--end form code -->
      <!--form edit code -->
      <div id="formedit-modal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
            
            <?php echo form_open_multipart('profMain/edit_form','id="editForm"'); ?>
           
                <div class="add">
                    <span id="editTopicId"></span>
                    <fieldset>
                        <legend><p class="modal-title"></p></legend>
                            <ul>
                                <li>
                                    <label>Title</label> <br/>
                                <input id="editTitle" type="text" name="title" value="Title" maxlength="175" size="30" required />
                                </li> <br/>
                                <li>
                                    <label>Description</label> <br/>
                                <textarea id="editDescription" rows="6" cols="20"></textarea>
                                </li> <br/>
                                <li>
                                    <label>Type</label> <br />
                                    <label id="editType"></label><br />
                                </li> <br/>
                                <li> 
                                <label>Domain</label> <br/>
                                    <input id="editDomain" type="text" name="domain" >
                                    
                                </li>
                                <li>
                                    <h4 class="modal-requirement"></h4>
                                   <button id="editBtn" class="m-btn blue">Add requirement<i class='icon-pencil'></i></button>
                                    
                                           
                                    
                                  </li>
                                
                            </ul>
                    <input type="submit" id="saveBtn" class="m-btn blue" name="submit" value="Save topic">
                    </fieldset>
                </div>
         <?php echo form_close(); ?>
            
          <div class="modal-footer">
            <button type="button" id="closeEditBtn" class="btn btn-default m-btn blue"  data-dismiss="modal" ><a href="#close" rel="modal:close"><i class="icon-remove"></i>Close window</a></button>
         
         
          </div>
        </div>
      </div>
    </div>




    <!--end form edit code -->
      
      
      
    <div id="main_content">

        <h2>Bachelor</h2>
  <?php 
    echo '<ul id="bachelor">';
    if(count($data) == 0)
      echo '<h3>No topic for Bachelor</h3>';
    else{
    
      for($i = 0;$i<count($data);$i++){
          if($data[$i]['type'] == 'bachelor'){
                $require = null;
                if($data[$i]['requirements']!=null){
                    
                   
                    for($j=0;$j<count($data[$i]['requirements']);$j++){
                        $require = $require.$data[$i]['requirements'][$j]['subjName'].' > '.$data[$i]['requirements'][$j]['grade'].'<br>';
                    }
                }
                    
                echo "<li class='topicsList cl-effect-1'>".$data[$i]['title']."<a
              href='' class='deleteTopic m-btn red' 
              data-title=".$data[$i]['title']." 
              data-description=\"".$data[$i]['description']."\"
              data-domain=\"".$data[$i]['domain']."\"
              data-topicId=\"".$data[$i]['topicId']."\"
              data-requirements=\"".$require."\"><i class='icon-trash'></i><span data-hover='Delete'>Delete</span></a><a
              href='' class='editTopic m-btn' 
              data-title=".$data[$i]['title']." 
              data-description=\"".$data[$i]['description']."\"
              data-domain=\"".$data[$i]['domain']."\"
              data-type=\"".$data[$i]['type']."\"
              data-listOrder=\"".$i."\"
              data-topicId=\"".$data[$i]['topicId']."\"
              data-requirements=\"".$require."\"><i class='icon-pencil'></i><span data-hover='Edit'>Edit</span></a><a
              href='' class='viewTopic m-btn blue' 
              data-title=".$data[$i]['title']." 
              data-description=\"".$data[$i]['description']."\"
              data-domain=\"".$data[$i]['domain']."\"
              data-requirements=\"".$require."\"><i class='icon-zoom-in'></i><span data-hover='View more'>View more</span></a></li>";
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
                $require = null;
                if($data[$i]['requirements']!=null){
                    for($j=0;$j<count($data[$i]['requirements']);$j++){
                        $require = $require.$data[$i]['requirements'][$j]['subjName'].' > '.$data[$i]['requirements'][$j]['grade'].'<br>';
                    }
                }
                    
                    
                 echo "<li class='topicsList cl-effect-1'>".$data[$i]['title']."<a
              href='' class='deleteTopic m-btn red' 
              data-title=".$data[$i]['title']." 
              data-description=\"".$data[$i]['description']."\"
              data-domain=\"".$data[$i]['domain']."\"
              data-topicId=\"".$data[$i]['topicId']."\"
              data-requirements=\"".$require."\"><span data-hover='Delete'>Delete</span><i class='icon-trash'></i></a><a
              href='' class='editTopic m-btn' 
              data-title=".$data[$i]['title']." 
              data-description=\"".$data[$i]['description']."\"
              data-domain=\"".$data[$i]['domain']."\"
              data-type=\"".$data[$i]['type']."\"
              data-listOrder=\"".$i."\"
              data-topicId=\"".$data[$i]['topicId']."\"
              data-requirements=\"".$require."\"><i class='icon-pencil'></i><span data-hover='Edit'>Edit</span></a><a
              href='' class='viewTopic m-btn blue' 
              data-title=".$data[$i]['title']." 
              data-description=\"".$data[$i]['description']."\"
              data-domain=\"".$data[$i]['domain']."\"
              data-requirements=\"".$require."\"><i class='icon-zoom-in'></i><span data-hover='View more'>View more</span></a></li>";
            }
    }
    
           
    }
    echo '</ul>';
    ?>
       <button id="addBtn" class="m-btn blue rnd">Add topic</button>
     </div>
        <script>
        
       $(".viewTopic").click(function(e){
         e.preventDefault();
          $(".modal-title").html($(this).attr("data-title"));
          $(".modal-description").html('Description <br><br> '+$(this).attr("data-description"));
           $(".modal-domain").html("Domain <br><br> "+$(this).attr("data-domain"));
        $(".modal-requirement").html("Requirements:<br>"+$(this).attr("data-requirements"));
        $("#topic-modal").modal({
        fadeDuration: 250,
        showClose: false
        });
       });
        $(".deleteTopic").click(function(e){
           e.preventDefault();
           val = confirm("Do you really want to delete this topic?");
            if (val == true){
                 var picT = <?php echo $this->session->userdata('pic'); ?>;
                 var topicId = $(this).attr("data-topicId");
                   $.ajax({
                    type:'POST',
                    url:'profMain/delete_topic',
                    data:{'topicId':topicId,
                          'picT':picT
                          },
                    success:function(data){
                        $("#main_content").html(data);
                    }

                   });
            }
           
        });  
        $(".editTopic").click(function(e){
           e.preventDefault(); 

             $('.requirementP').each(function(i,obj){
                $(this).remove();
            });
             $("#saveBtn").css({'display':'default'});
            $(".modal-title").html("Edit topic "+$(this).attr("data-title"));
            $("#editTitle").val($(this).attr("data-title"));
            $("#editDescription").val($(this).attr("data-description"));
            $("#editType").text($(this).attr("data-type"));
            $("#editDomain").val($(this).attr("data-domain"));
            $("#editTopicId").text($(this).attr("data-topicId"));
            $("#editTopicId").css("display","none");
            var data = <?php echo json_encode($data); ?>;
            var listOrder = $(this).attr("data-listOrder");
            var requirements = data[listOrder]['requirements'];
            if(requirements != null){
                var form = document.getElementById('editForm');
                  var saveBtn = document.getElementById('saveBtn');
                 $("#editBtn").css("display","block");
               for(var i = 0;i<requirements.length;i++){
                   var paragraph = document.createElement('p');
                   var removeReq = document.createElement('a');
                    paragraph.setAttribute('class','requirementP');
                    removeReq.setAttribute('href','#');
                    removeReq.setAttribute('class','removeRequirement');
                    removeReq.appendChild(document.createTextNode('Remove'));
                    var input = document.createElement('input');
                    input.setAttribute('type','number');
                    input.setAttribute('value',requirements[i]['grade']);
                    input.setAttribute('class','editGrade');
                    var select = document.createElement('select');
                    select.setAttribute('class','editReq');
                    paragraph.appendChild(input);
                    paragraph.appendChild(select);
                    paragraph.appendChild(removeReq);
                    form.appendChild(paragraph);
                    var allSubjects = <?php echo json_encode($allSubjects); ?>;     
            
                    for(var j=0;j<allSubjects.length;j++){
                        var option = document.createElement('option');
                        option.setAttribute('value',allSubjects[j]['name']);
                        if(allSubjects[j]['name'] == requirements[i]['subjName']){
                            option.setAttribute('selected','selected');
                        }
                        option.appendChild(document.createTextNode(allSubjects[j]['name']));
                        select.appendChild(option);
                    }
                  
                   form.appendChild(saveBtn); 
               }
            }
             $("#formedit-modal").modal({
            fadeDuration: 250,
            showClose: false
            });
             $(".removeRequirement").click(function(e){
            e.preventDefault();
            $(this).parents('p').remove(); 
            }); 
        });
       
            
        $("#addBtn").click(function(e){
           e.preventDefault();
            $("#submitBtn").css({'display':'default'});
            document.getElementsByTagName('form')[0].reset();
             $('.selectReq').each(function(i,obj){
               $(this).remove();
            });
            $('.selectGrade').each(function(i,obj){
                $(this).remove();
            });
          $("#form-modal").modal({
            fadeDuration: 250,
            showClose: false
          });
        });
        $("#reqBtn").click(function(e){
           e.preventDefault();
            var form = document.getElementsByTagName('form')[0];
            var input = document.createElement('input');
            var select = document.createElement('select');
            var submitBtn = document.getElementById('submitBtn');
            var paragraph = document.createElement('p');
        
            select.setAttribute('class','selectReq');
            input.setAttribute('type','number');
            input.setAttribute('value','5');
            input.setAttribute('class','selectGrade');
            $("#submitBtn").css("display","block");
            paragraph.appendChild(input);
            paragraph.appendChild(select);
            
            form.appendChild(paragraph);
            var allSubjects = <?php echo json_encode($allSubjects); ?>;     
            
            for(var i=0;i<allSubjects.length;i++){
                var option = document.createElement('option');
                option.setAttribute('value',allSubjects[i]['name']);
                option.appendChild(document.createTextNode(allSubjects[i]['name']));
                select.appendChild(option);
            }
            form.appendChild(submitBtn);  
            
        });  
        $("#editBtn").click(function(e){
           e.preventDefault();
           var form = document.getElementById('editForm');
            var input = document.createElement('input');
            var select = document.createElement('select');
            var saveBtn = document.getElementById('saveBtn');
            var paragraph = document.createElement('p');
           var removeReq = document.createElement('a');
            removeReq.setAttribute('href','#');
            removeReq.setAttribute('class','removeRequirement');
            removeReq.appendChild(document.createTextNode('Remove'));
            paragraph.setAttribute('class','requirementP');
            select.setAttribute('class','editReq');
            input.setAttribute('type','number');
            input.setAttribute('value','5');
            input.setAttribute('class','editGrade');
            $("#editBtn").css("display","block");
            paragraph.appendChild(input);
            paragraph.appendChild(select);
            paragraph.appendChild(removeReq);
            form.appendChild(paragraph);
            var allSubjects = <?php echo json_encode($allSubjects); ?>;     
            
            for(var i=0;i<allSubjects.length;i++){
                var option = document.createElement('option');
                option.setAttribute('value',allSubjects[i]['name']);
                option.appendChild(document.createTextNode(allSubjects[i]['name']));
                select.appendChild(option);
            }
            form.appendChild(saveBtn);  
           $(".removeRequirement").click(function(e){
            e.preventDefault();
            $(this).parents('p').remove(); 
            }); 
            
        });  
            
            
            
        $("#submitBtn").click(function(e){

          e.preventDefault();
             var i = 0;
            var requirements = new Array();
            $('.selectReq').each(function(i,obj){
                requirements[i] = new Object();
                requirements[i]['subject'] = $(this).val();
                i++;
            });
            i = 0;
            $('.selectGrade').each(function(i,obj){
               requirements[i]['grade'] = $(this).val();
                i++;
            });
         var title = $("#topicTitle").val();
          var description = $("#topicDescription").val();
          var type = $("[name='type']:checked").val();
          var domain = $("#topicDomain").val();
          var picT = <?php echo $this->session->userdata('pic'); ?>;
           $.ajax({
            type:'POST',
            url:'profMain/process_form',
            data:{'title':title,
                  'description':description,
                  'type':type,
                'requirements':requirements,
                  'domain':domain,
                  'picT':picT
                  },
            success:function(data){
                
                $("#main_content").html(data);
                $("#submitBtn").css({'display':'none'});
            }

           });

        });
        $("#saveBtn").click(function(e){
            
          e.preventDefault();
             var i = 0;
            var requirements = new Array();
            $('.editReq').each(function(i,obj){
                requirements[i] = new Object();
                requirements[i]['subject'] = $(this).val();
                i++;
            });
            i = 0;
            $('.editGrade').each(function(i,obj){
               requirements[i]['grade'] = $(this).val();
                i++;
            });
         var title = $("#editTitle").val();
          var description = $("#editDescription").val();
          var type = $("#editType").text();
          var domain = $("#editDomain").val();
          var picT = <?php echo $this->session->userdata('pic'); ?>;
          var topicId = $("#editTopicId").text();
           $.ajax({
            type:'POST',
            url:'profMain/edit_form',
            data:{'title':title,
                  'description':description,
                  'type':type,
                'requirements':requirements,
                  'domain':domain,
                  'picT':picT,
                  'topicId':topicId
                  },
            success:function(data){
                
                $("#main_content").html(data);
                $("#saveBtn").css({'display':'none'});
            }

           });
        });
     
      
        </script>
  </body>



</html>
