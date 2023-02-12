
<div class="row">
    <div class="col-md-12">
    	<div class="card card-underline" id="card-list">
    		<div class="card-head">
    			<header><h4>Application Users</h4></header>
    		</div><!--end .card-head -->
    		<div class="card-body">
            
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4">
                    <input type="text"  id="search" class="form-control" placeholder="Enter your keyword">
                    </div>
                </div>
            </div>
            <div id="test"></div>
    			<div class="table-responsive">
                    <table id="example3" class="table table-hover">
    					<thead>
    						<tr>
    							<th>SN#.</th>
    							<th>Users</th>
                                <th>Official ID</th>
                                <th>User Group</th>
    							<th class="text-center">Actions</th>
    						</tr>
    					</thead>
    					<tbody id="tblbody">					
    					</tbody>
    				</table>
                </div>
                <div id="page_links" class="text-left">
                </div>
    		</div><!--end .card-body -->
            
    	</div><!--end .card -->
    </div><!--end .col -->
    
</div> <!-- end .row-->

<div class="modal fade" id="myModal-del" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Banks</h4>
            </div>
            <div class="modal-body">
                    
                <div id="msg-success" class="alert alert-success" style="display: none;"> 
                  <div></div>
                </div>
                
                <div id="msg-error" class="alert alert-danger fade in" style="display: none;">
                    <a href="#" class="close" onclick='javascript:$("#msg-error").hide();' aria-label="close">&times;</a>
                    <div></div>
                </div>
                
                <div class="form-group">
                    <input type="hidden" id="flag_del" value="" class="form-control" placeholder="flag" required>
                </div>
                <div class="form-group">
                    <input type="hidden" id="user_id_del" value="" class="form-control" placeholder="user_id_del" required>
                    <input type="hidden" id="system_id_del" value="" class="form-control" placeholder="system_id_del" required>
                </div>
                <div class="alert alert-danger" role="alert">
                    Are you sure you want to delete this record?.
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btn_delete" class="btn btn-danger">Delete</button>
                <img id="loader_del" src="<?= base_url(); ?>assets/img/reload.GIF" style="display: none; width: 28px; height: 28px;" />                        
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $("#search").keyup(function () {
        var value = this.value.toLowerCase().trim();

        $("table tr").each(function (index) {
            if (!index) return;
            $(this).find("td").each(function () {
                var id = $(this).text().toLowerCase().trim();
                var not_found = (id.indexOf(value) == -1);
                $(this).closest('tr').toggle(!not_found);
                return not_found;
            });
        });
    });
    
var url = "<?= base_url() . 'index.php/'; ?>application_users/select";

load_application_users(url);

function load_application_users(url)
{
    $.getJSON(url, function(result){
        
        var sn = 1;
       
        $.each(result, function(i, field){
            
            if(i == "offset")
            {
                sn = parseInt(field) + 1;
                
            }
            if(i == "app_users")
            {
                var status = "";
                if(field.length == 0) {
                    $('#tblbody').append('<tr><td>No record found</td></tr>');
                } else {
                    
                    var rowtags = "";
                    for(j=0; j<field.length;j++)
                    {
                        if(field[j].active == "1"){
                            status = "glyphicon glyphicon-star";
                        } else {
                            status = "glyphicon glyphicon-star-empty";
                        }
                       rowtags += '<tr><td>' + sn + '</td><td>' + field[j].first_name + " " + field[j].last_name + '</td><td>' + field[j].official_id + '</td><td>' + field[j].group_name + '</td></span></td><td style="text-align:center;"><button name="btn_delete" system_id="'+field[j].system_id+'" data="' + field[j].user_id + '" class="btn btn-danger glyphicon glyphicon-remove btn-responsive"></button></td></tr>';
                       sn += 1;
                    }
                    $('#tblbody').html(rowtags);
                 }
            }
            if(i == "page_links")
            {
                $('#page_links').html(field);
            } 
                         
        });
    });
    $("#bank_id").val('');
    $("#bank_name").val('');
    $("#flag").val('');
}
$("#page_links").on("click", ".pagination a", function(){
    
    var url = $(this).attr("href");
    
    if(url != "#")
    {
       load_application_users(url);
        return false;
    }
});
    
$('#example3').on('click', 'button[name=btn_delete]', function(){
    //
    var user_id = $(this).attr("data");
    var system_id = $(this).attr("system_id");
    $('#user_id_del').val(user_id);
    $('#system_id_del').val(system_id);
    $('#flag_del').val('Delete');
    $('#myModal-del').modal('show');
});

$("#btn_delete").click(function(){
    if($('#flag_del').val()=="Delete")
    {
        var formdata_d = {
        'user_id'    : $('#user_id_del').val(),
        'system_id'  : $('#system_id_del').val()
        }
        url = "<?= base_url() . 'index.php/'; ?>application_users/delete";
        $("#loader_del").show();
        
        SendDataByAjax3(
            url, formdata_d,
            function(result)
            {
                //alert(result);
                var result_array = JSON.parse(result);
                
                $("#loader_del").hide();
                
                if( result_array.res )
                {   
                    $("#msg-success").children('div').html("Successful");
                    $("#msg-success").show();
                    $("#msg-success").fadeIn('slow', function()
                    {
                        $(this).delay(1800).fadeOut(600);				  
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
                    else if( result_array.status == "500" ) 
                    {
                        $("#msg-error").children('div').html( result_array.msg );
                        $("#msg-error").show();
                    } else {
                        $("#msg-error").children('div').html( result_array.msg );
                        $("#msg-error").show();
                    }
                }
            }
        );
    }
    $('#flag_del').val('');
    $('#bank_id_del').val('');
});

$('#myModal-del').on('hidden.bs.modal', function (e) {
    $("#bank_id_del").val('');
    $("#flag_del").val('');
       var url = "<?= base_url() . 'index.php/'; ?>application_users/select";
        load_application_users(url);
});

</script>
