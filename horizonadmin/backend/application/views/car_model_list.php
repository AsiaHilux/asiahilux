<div class="row">
    <div class="col-md-12">
    	<div class="card card-underline">
    		<div class="card-head">
    			<header><h4>View Car Models</h4></header>
    		</div><!--end .card-head -->
    		<div class="card-body">

            <div id="test"></div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-4">
                            <input type="text"  id="search" class="form-control" placeholder="Enter your keyword">
                        </div>
                    </div>
                </div>

    			<div class="table-responsive">
                <table id="example3" class="table table-hover">
					<thead>
						<tr>
							<th>SN#.</th>
							<th>Car Make Names</th>
							<th>Car Model Names</th>
							<th class="text-center">Active</th>
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
                <h4 class="modal-title" id="myModalLabel">Delete Car Model</h4>
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
                        <input type="hidden" id="m_id_del" value="" class="form-control" placeholder="m_id_del" required>
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
    var url = "<?= base_url() . 'index.php/'; ?>car_model/select";

        $("#search").keyup(function () {
            var value = this.value.toLowerCase().trim();
            var url = "<?= base_url() . 'index.php/'; ?>car_model/select?search_term="+value;

            loadcar_model(url);
        });


loadcar_model(url);

function loadcar_model(url)
{
    $.getJSON(url, function(result){

        var sn = 1;
        $.each(result, function(i, field){
            if (i == "offset") {
                sn = parseInt(field) + 1;
            }
            if(i == "deptype")
            {
            var status = "";
            if(field.length == 0) {
                $('#tblbody').html('<tr><td style="width: 15%;">No record found</td></tr>');
            } else {
                var rowtags = "";
                for(j=0; j<field.length;j++)
                {
                    if(field[j].active == "1"){
                        status = "glyphicon glyphicon-star";
                    } else {
                        status = "glyphicon glyphicon-star-empty";
                    }
                    rowtags += '<tr><td>' + sn + '</td><td>' + field[j].vm_name + '</td><td>' + field[j].model_name + '</td><td style="text-align:center;"><span class="'+ status + '"></span></td><td style="text-align:center;"><button name="btn_edit" data="' + field[j].m_id + '" class="btn btn-primary btn-responsive glyphicon glyphicon-edit"></button>&nbsp;&nbsp;<button name="btn_delete" data="' + field[j].m_id + '" class="btn btn-danger btn-responsive glyphicon glyphicon-remove"></button></td></tr>';
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
        var value = $("#search").val().toLowerCase().trim();
        url += "?search_term="+value;
        loadcar_model(url);
        return false;
    }
});


    $('#example3').on('click', 'button[name=btn_edit]', function()
    {
        var id = $(this).attr("data");
                            
        $("#page_content").load
        ("<?= base_url() . 'index.php/'; ?>car_model/load_edit?id="+id, function(responseTxt, statusTxt, xhr){
            if(xhr.status == "200" || xhr.status == "204")
            {
                if(xhr.status == "204")
                {
                    alert("No data available for edit.");
                } else {
                    $("#btn_show_new").hide();
                    $("#btn_show_view").show();
                }
            }   
            if(statusTxt == "error")
            {
                //alert("Error: " + xhr.status + ": " + xhr.statusText);
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
                            
                         

    });

    $('#example3').on('click', 'button[name=btn_delete]', function(){
        var id = $(this).attr("data");
        $('#m_id_del').val(id);
        $('#flag_del').val('Delete');
        $("#btn_delete").show();
        $('#myModal-del').modal('show');
    });

    $("#btn_delete").click(function(){
        if($('#flag_del').val()=="Delete")
        {
            var formdata_d = {
            'm_id'    : $("#m_id_del").val()
            }
            url = "<?= base_url() . 'index.php/'; ?>car_model/delete";
            

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
        $('#m_id_del').val('');
    });

    $('#myModal-del').on('hidden.bs.modal', function (e) {
        $("#m_id_del").val('');
        $("#flag_del").val('');
        $("#msg-error").hide();
        var url = "<?= base_url() . 'index.php/'; ?>car_model/select";
        loadcar_model(url);
    });

    $("#btn_print_report").click(function(){

        url = "<?= base_url() . 'index.php/'; ?>car_model/generate_report";
        window.open(url, "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=5%, left=0%, width=600, height=800");
});


</script>