<div class="row">
    <div class="col-md-12">
    	<div class="card card-underline" id="card">
    		<div class="card-head">
    			<header><h4>View Country Ports</h4></header>
    		</div>
    		<div class="card-body">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4">
                    <input type="text"  id="search" class="form-control" placeholder="Enter your keyword">
                    </div>
                </div>
            </div>
            <div id="test"></div>
    			<div class="row">
                    <div class="table-responsive">
                        <table id="example3" class="table table-hover">
        					<thead>
        						<tr>
        							<th>SN#.</th>
        							<th>Country Name</th>
                                    <th class="text-center">Actions</th>
        						</tr>
        					</thead>
        					<tbody id="tblbody">					
        					</tbody>
        				</table>
                    </div>
                </div>
                <div id="page_links" class="text-left">
                    <?php //echo $page_links; ?>
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
                <h4 class="modal-title" id="myModalLabel">Delete Country Ports </h4>
            </div>
            <div class="modal-body">
                    
                <div id="msg-error" class="alert alert-danger fade in" style="display: none;">
                    <a href="#" class="close" onclick='javascript:$("#msg-error").hide();' aria-label="close">&times;</a>
                    <div></div>
                </div>
                
                <div class="form-group">
                    <input type="hidden" id="flag_del" value="" class="form-control" placeholder="flag" required>
                </div>
                <div class="form-group">
                    <input type="hidden" id="hv_port_country_id_del" value="" class="form-control" placeholder="hv_port_country_id_del" required>
                </div>
                <div class="alert alert-danger" role="alert">
                    Are you sure you want to delete this record?.
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="btn_delete" type="button" class="btn btn-danger btn-raised btn-loading-state" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Deleting...">Delete</button>                        
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

var url = "<?= base_url() . 'index.php/'; ?>port_assign/select";
load_port_assign(url);

$("#search").keyup(function () {
    var value = this.value.toLowerCase().trim();
    var url = "<?= base_url() . 'index.php/'; ?>port_assign/select?search_term="+value;

    load_port_assign(url);
});

function load_port_assign(url)
{
    var card = $("#card");
	materialadmin.AppCard.addCardLoader(card);
    
    $.getJSON(url, function(result){
        materialadmin.AppCard.removeCardLoader(card);
        var sn = 1;
        $.each(result, function(i, field){
            if(i == "offset")
            {
                sn = parseInt(field) + 1;
            }
            if(i == "port_assign")
            {   
                var status = "";
                if(field.length == 0) {
                    $('#tblbody').html('<tr><td colspan="5">No record found</td></tr>');
                } else {
                    
                    var rowtags = "";
                    for(j=0; j<field.length;j++)
                    {
                        if(field[j].active == "1") {
                        status = "glyphicon glyphicon-star";
                        } else {
                            status = "glyphicon glyphicon-star-empty";
                        }
                        rowtags += '<tr>' +
                           '<td>' + sn + '</td>' +
                           '<td>' + field[j].country_name + '</td>' +
                           '<td style="text-align:center;">' +
						   '<button name="btn_edit" data="' + field[j].hv_port_country_id + '" class="btn btn-primary glyphicon glyphicon-edit btn-responsive margin-2px"></button>' +
                           '&nbsp;&nbsp;' +
                           '<button name="btn_delete" data="' + field[j].hv_port_country_id + '" class="btn btn-danger glyphicon glyphicon-remove btn-responsive"></button>' +
                           '</td>' +
                           '</tr>';
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
    }).fail(function(xhr){
        
        materialadmin.AppCard.removeCardLoader(card);
        
        if( xhr.status == "404" )
        {
            alert("Your login session has been expired. Please login again.");
            location.reload();
        } else if(xhr.status == "0") {
            
            alert("No connection available.");
        } else {
            
            alert(xhr.responseText);
        }
    });
}

$("#page_links").on("click", ".pagination a", function(){
    
    var url = $(this).attr("href");
    
    if(url != "#")
    {
        load_port_assign(url);
        return false;
    }
});

$('#example3').on('click', 'button[name=btn_edit]', function(){

    var hv_port_country_id = $(this).attr("data");
    var card = $("#card");
	materialadmin.AppCard.addCardLoader(card);
    
    $("#page_content").load
    ("<?= base_url() . 'index.php/'; ?>port_assign/load_edit?hv_port_country_id="+hv_port_country_id, function(responseTxt, statusTxt, xhr){
        if(xhr.status == "200" || xhr.status == "204")
        {
            if(xhr.status == "204")
            {
                alert("No data available for edit.");
                materialadmin.AppCard.removeCardLoader(card);
            } else {
                $("#btn_show_new").hide();
                $("#btn_show_view").show();
            }            
        }   
        if(statusTxt == "error")
        {            
            
            materialadmin.AppCard.removeCardLoader(card);
            $btn.button('reset');
            if(xhr.status == "404")
            {
                $btn.button('reset');
                alert("Your login session has been expired. Please login again.");
                location.reload();
            }
            if(xhr.status == "403")
            {
                $btn.button('reset');
                alert("You don't have permission to perform this action.");
            }
            if(xhr.status == "500")
            {
                $btn.button('reset');
                alert("Required data not available.");
            }
        }
    });
    
    $('#flag').val('Edit');
    window.scroll(0,0);
});

$('#example3').on('click', 'button[name=btn_delete]', function(){
   var id = $(this).attr("data");
    $('#hv_port_country_id_del').val(id);
    $('#flag_del').val('Delete');
    $("#btn_delete").show();
    $('#myModal-del').modal('show');
});

$("#btn_delete").click(function(){
    
    if($('#flag_del').val()=="Delete")
    {
        var formdata_d = {
        'hv_port_country_id'    : $('#hv_port_country_id_del').val()
        }
        url = "<?= base_url() . 'index.php/'; ?>port_assign/delete";
        
        $(this).button('loading');
        
        SendDataByAjax3(
            url, formdata_d,
            function(result)
            {
                
                var result_array = JSON.parse(result);
                
                $("#btn_delete").button('reset');
                $("#btn_delete").hide();
                
                if( result_array.res )
                {   
                    toastr.success('Record Deleted', 'Successful');
                } else {
                    if( result_array.status == "404" )
                    {
                        alert("Your login session has been expired. Please login again.");
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
    $('#hv_port_country_id_del').val('');
});

$('#myModal-del').on('hidden.bs.modal', function (e) {
    $("#hv_port_country_id_del").val('');
    $("#flag_del").val('');
    var url = "<?= base_url() . 'index.php/'; ?>port_assign/select";
    load_port_assign(url);
});

</script>
