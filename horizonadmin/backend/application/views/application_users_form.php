<div class="row">
    <div class="col-md-12">
    	<div class="card card-underline">
    		<div class="card-head">
    			<header><h4>Add New Application User</h4></header>
    		</div><!--end .card-head -->
    		<div class="card-body">
                
                <div id="msg-success" class="alert alert-success" style="display: none;"> 
                  <div></div>
                </div>
                
                <div id="msg-error" class="alert alert-danger fade in" style="display: none;">
                    <a href="#" class="close" onclick='javascript:$("#msg-error").hide();' aria-label="close">&times;</a>
                    <div></div>
                </div>
                
                <form id="myform" class="form form-validate">                        
                    <div class="row">
    					<div class="col-sm-12">
    						<div class="form-group">
                                <select class="form-control" id="group_id" name="group_id" required="true">
                                    <option value=""></option>
                                </select>
    							<label for="group_id">
    								Select User Group
    							</label>
    						</div>
    					</div>
                    </div>
                    <div class="row">
        				<div class="col-md-6">
        					<div class="form-group">
                                <select id="dep_id" name="dep_id" class="form-control" required="true">
                                    <option value=""></option>
                                </select>
                                <label for="dep_id">Select Department</label>
        					</div>
        				</div>
                        <div class="col-md-6">
        					<div class="form-group">
                                <select id="emp_id" name="emp_id" class="form-control" required="true">
                                    <option value=""></option>
                                </select>
                                <label for="emp_id">Select Employee</label>
        					</div>
        				</div>
                    </div>
               </form>
    		</div><!--end .card-body -->
            
            <div class="card-actionbar">
				<div class="card-actionbar-row">
                    <button id="cancel" class="btn ink-reaction btn-raised btn-default" style="display: none;">
						Cancel
					</button> &nbsp;
					<button id="btn_save" class="btn ink-reaction btn-raised btn-primary">
						Save
					</button>

                    <img id="loader" src="<?= base_url(); ?>assets/img/reload.GIF" style="display: none; width: 28px; height: 28px;" />
				</div>
		    </div><!--end .card-actionbar -->
            
    	</div><!--end .card -->
    </div><!--end .col -->
    
</div>


<script type="text/javascript">

populate_Group_Dropdown();

populate_Departments_Dropdown();

function populate_Group_Dropdown()
{
    var url = "<?= base_url() . 'index.php/'; ?>user_groups/select_active";
    $.getJSON(url, function(result){               
        $.each(result, function(i, field){
            for(j=0; j<field.length;j++)
            {                 
                $('#group_id').append('<option value = "' + field[j].group_id + '">' + field[j].group_name + '</option>');
            }
                         
        });
    });
}

function populate_Departments_Dropdown()
{
    var url = "<?= base_url() . 'index.php/'; ?>departments/select_active";
    $('#dep_id').empty();
    $('#dep_id').append('<option value=""></option>');
    $.getJSON(url, function(result){               
        $.each(result, function(i, field){
            for(j=0; j<field.length;j++)
            {                 
                $('#dep_id').append('<option value = "' + field[j].dep_id + '">' + field[j].department + '</option>');
            }                         
        });
    });
}

function populate_Employees_Dropdown(dep_id)
{
    var url = "<?= base_url() . 'index.php/'; ?>employees/select_by_department/"+dep_id;
    $('#emp_id').empty();
    $('#emp_id').append('<option value=""></option>');
    $.getJSON(url, function(result){               
        $.each(result, function(i, field){
            for(j=0; j<field.length;j++)
            {                 
                $('#emp_id').append('<option value = "' + field[j].emp_id + '">' + field[j].emp_first_name + " - " + field[j].emp_last_name + '</option>');
            }                         
        });
    });
}

$('#dep_id').change(function(){
    
    if($(this).val()=="")
    {
        $("#emp_id").empty();
    } else {
        var dep_id = $(this).val();
        populate_Employees_Dropdown(dep_id);
    }
    
});
    
$("#btn_save").click(function(){
    
    var form = $("#myform");        
    
    var res = form.valid();
    
    if(res){
        
        var formdata = {
                'group_id'      : $("#group_id").val(),
                'dep_id'        : $("#dep_id").val(),
                'emp_id'        : $("#emp_id").val()
                }
        url = "<?= base_url() . 'index.php/'; ?>application_users/create";
        
        $("#msg-error").hide();
        
        $("#loader").show();
        
        SendDataByAjax3(
            url, formdata,
            function(result)
            {
                //alert(result);
                var result_array = JSON.parse(result);
                
                $("#loader").hide();
                
                if( result_array.res )
                {   
                    $("#msg-success").children('div').html("Successful");
                    $("#msg-success").show();
                    $("#msg-success").fadeIn('slow', function(){
                        $(this).delay(1800).fadeOut(600);
                        $("#btn_show_new").show();
                        $("#btn_show_view").hide();
                        load_view(null);				  
                    });
                } else {
                    if( result_array.status == "404" )
                    {
                        alert("Your login session hase beeen expired. Please login again.");
                        location.reload();
                    } 
                    else if( result_array.status == "403" )
                    {
                        alert("You don't have permission to perform this action.");
                        location.reload();
                    } 
                    else if( result_array.status == "500" ) {
                        $("#msg-error").children('div').html( result_array.msg );
                        $("#msg-error").show();
                    } else {
                        $("#msg-error").children('div').html( result_array.msg );
                        $("#msg-error").show();
                    }
                }
            }
        );
        
    } else {
        alert('fill out the required fields.!!');
    }    
});

</script>

