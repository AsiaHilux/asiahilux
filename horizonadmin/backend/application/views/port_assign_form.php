<?php
if( isset($formdata) )
{
    $tag = "Edit";
    $hv_port_country_id = $formdata[0]['hv_port_country_id'];  
    $country_id = $formdata[0]['country_id'];  
    
    

} else {
    $tag = "";
    $hv_port_country_id = ""; 
    $country_id = "";   
   
 
}
?>
<div class="row">
    <div class="col-md-12">
    	<div class="card card-underline">
    		<div class="card-head">
    			<header><h4><?php if( $tag == "Edit") echo "Edit Country Port"; else echo "Add Country Port"; ?></h4></header>
    			
    		</div><!--end .card-head -->
    		<div class="card-body">
            
                <div id="msg-error" class="alert alert-danger fade in" style="display: none;">
                    <a href="#" class="close" onclick='javascript:$("#msg-error").hide();' aria-label="close">&times;</a>
                    <div></div>
                </div>
                
                <form id="myform" class="form form-validate">
                    <input type="hidden" id="flag" value="<?= $tag ?>" class="form-control" placeholder="flag">
                    <input type="hidden" class="form-control" id="hv_port_country_id" name="hv_port_country_id" value="<?= $hv_port_country_id ?>">

                <div class="row">
                    <div class="col-sm-12">
                                <div class="form-group">
                                    <select class="form-control select2-list" id="country_id" name="country_id" required="true">
                                        <option value=""></option>
                                    </select>
                                    <label for="country_id">
                                        Select Country Name *
                                    </label>
                                
                                </div>
                            </div>
                </div>
                       
                                
                   
                </form>
                <h4>Ports:</h4>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-responsive table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">Action</th>
                                    <th style="width: 20%;">Arrival Port Name</th>
                                    <th style="width: 50%;">Port Price</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_ports">
                                <?php                                
                                if(isset($formdata))
                                {                                    
                                    foreach($formdata as $fd)
                                    {
                                ?>
                                    <tr>
                                        <td style="width: 10%;" hv_port_country_details_id="<?= $fd['hv_port_country_details_id'] ?>"><button name="btn_delete" class="btn btn-sm btn-danger glyphicon glyphicon-remove btn-responsive"></button></td>
                                        <td style="width: 20%;"><input type="text" name="arrival_port" class="form-control" value="<?= $fd['arrival_port'] ?>" maxlength="10" placeholder="Arrival Port"></td>
                                        <td style="width: 50%;"><input type="text" name="total_price" class="form-control" value="<?= $fd['total_price'] ?>" maxlength="100" placeholder="Total Price"></td>    
                                    </tr>
                                <?php                                    
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot id="tbl_foot">
                                <tr>
                                    <th colspan="4"><button id="btn_add_line" class="btn btn-primary-dark btn-raised btn-sm">Add Port</button></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>                
    		</div><!--end .card-body -->
            <div class="card-actionbar">
				<div class="card-actionbar-row">
                    <div class="btn-group">
                        <button id="btn_save" type="button" class="btn btn-primary btn-raised btn-loading-state" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Saving...">Save</button>
                    </div>
				</div>
		    </div><!--end .card-actionbar -->
    	</div><!--end .card -->
    </div><!--end .col -->
    
</div>

<script type="text/javascript">

   

    populate_Country_Dropdown();

   

    function populate_Country_Dropdown() {
        var url = "<?= base_url() . 'index.php/'; ?>port_assign/select_country";
        var country_id = "<?= $country_id ?>";
        $('#country_id').empty();
        $('#country_id').append('<option value=""></option>');
        $.getJSON(url, function (result) {
            $.each(result, function (i, field) {
                for (j = 0; j < field.length; j++) {
                    var tag = "";
                    if (country_id == field[j].country_id) {
                        
                        tag = 'selected';
                    }

                    $('#country_id').append('<option value = "' + field[j].country_id + '" ' + tag + '>' + field[j].country_name + '</option>');

                    
                }

            });
        }).fail(function (xhr) {

            if (xhr.status == "404") {
                alert("Your login session has been expired. Please login again.");
                location.reload();
            } else if (xhr.status == "0") {

                alert("No connection available.");
            } else {

                alert(xhr.responseText);
            }
        });
    }


$("#btn_add_line").click(function(){

    var arrival_port = '<input type="text" name="arrival_port" class="form-control" value="" maxlength="300" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 300 characters allowed" placeholder="Arrival Port Name">';
    var total_price = '<input type="number" name="total_price" class="form-control" value=""max="99999999999" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 11 digit allowed Format Price is : $65,000,000,000" placeholder="Port Price">';
    $("#tbl_ports").append('<tr><td style="width: 10%;" hv_port_country_details_id="0"><button name="btn_delete" class="btn btn-sm btn-danger glyphicon glyphicon-remove btn-responsive"></button></td><td style="width: 50%;">'+arrival_port+'</td><td style="width: 20%;">'+total_price+'</td></tr>');
});

$('#tbl_ports').on('click', 'button[name=btn_delete]', function(){
    var res = confirm("Delete this Port Details?");
    if(res)
    {
       
            var rows = 0;
            rows = $('#tbl_ports').children("tr").length;
            if( rows > 0 )
            {
                $(this).parent('td').parent('tr').remove();
            }
       
    }    
});

$("#btn_save").click(function(){
    
    var form = $("#myform");
    var res = form.valid();
    var rows = 0;
    
    if(res){
        
        rows = $('#tbl_ports').children("tr").length;
        var json_string = "[";
        var row = 1;
        var row_is_valid = true;
        $('#tbl_ports').children("tr").each(function(){

            var arrival_port = $(this).children('td:eq(2)').find('input[name="arrival_port"]').val();
            var total_price = $(this).children('td:eq(3)').find('input[name="total_price"]').val();
            
            if( arrival_port == "" || total_price == "" )
            {
                row_is_valid = false;
            }

            json_string += "{";            
            json_string += '"hv_port_country_details_id":"' + $(this).children('td:eq(0)').attr('hv_port_country_details_id') + '",';
            json_string += '"arrival_port":"' + $(this).children('td:eq(1)').children('input[name="arrival_port"]').val() + '",';
            json_string += '"total_price":"' + $(this).children('td:eq(2)').children('input[name="total_price"]').val() + '"';
            
            if(row < rows)
            {
                json_string += '},';
            }
            else
            {
                json_string += '}';
            }       
            row +=1;            
        });
        json_string += ']';
        //alert(json_string); return false;
        if(!row_is_valid)
        {
            alert("Please fill detail in each row.");
            return false;
        }

        var formdata = {
            'hv_port_country_id'       : $("#hv_port_country_id").val(),
            'country_id'        : $("#country_id").val(),
            'ports_data'     : json_string
        }
        if($('#flag').val()=="")
        {
            url = "<?= base_url() . 'index.php/'; ?>port_assign/create";
        }
        else if($('#flag').val()=="Edit")
        {
            url = "<?= base_url() . 'index.php/'; ?>port_assign/update";
        }
       
        $(this).button('loading');
       
        $("#msg-error").hide();
        
        SendDataByAjax3(
            url, formdata,
            function(result)
            {
                var result_array = JSON.parse(result);
                
                $("#btn_save").button('reset');
                window.scroll(0,0);
                if( result_array.res )
                {   
                    toastr.success('Record Saved', 'Successful');
                    if($('#flag').val()=="Edit")
                    {
                        $("#btn_show_new").show();
                        $("#btn_show_view").hide();
                        load_view(null);
                    }
                    $("#myform")[0].reset();
                    $('#tbl_ports').children("tr").remove();
                    
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
        alert('Country and ports details are required.');
    }    
});

</script>