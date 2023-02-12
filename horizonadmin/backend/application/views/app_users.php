<?php include( 'include/header.php'); ?>
<!-- start: HORIZONTAL MENU----------------------------------------------------- -->
<?php include('include/nav/Administration.php'); ?>

<section>
    <div class="section-body">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="row">
<div class="row" style="<?php if($permissions['write_permission']=="0") echo 'display:none;'; ?>">
    <div class="col-md-offset-1 col-md-10">
        <div class="panel-group" id="accordion1">
            <div class="card panel card-underline">
                <div class="card-head collapsed" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-1">
                    <header><h3>Add New Application User</h3></header>
                    <div class="tools">
                        <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
                    </div>
                </div>
                <div id="accordion1-1" class="collapse">

                    <div class="card-body">
                        <form id="myform" class="form form-validate floating-label">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <select class="form-control" name="group_id" id="group_id" required="true">
                                            <option value=""></option>
                                        </select>
                                        <label for="group_id">
                                            Select User Group
                                        </label>
                                        <input type="hidden" id="flag" value="" class="form-control" placeholder="flag">
                                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="" required>
                                        <label for="first_name">
                                            First Name
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="" required>
                                        <label for="last_name">
                                            Last Name
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" value="" required>
                                        <label for="email">
                                            Email
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password" value="" required>
                                        <label for="password">
                                            Password
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="checkbox-inline checkbox-styled">
                                        <input type="checkbox" id="active" name="active"><span>Active</span>
                                    </label>
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
                        <div id="msg-success" class="row col-md-12 col-md-offset-0" style="display: none;">
                            <div class="alert alert-callout alert-success" role="alert">

                            </div>
                        </div>
                        <div id="msg-error" class="row col-md-12 col-md-offset-0" style="display: none;">
                            <div class="alert alert-callout alert-danger" role="alert">

                            </div>
                        </div>
                        <div id="result"></div>
                    </div><!--end .card-actionbar -->

                </div>

            </div><!--end .panel -->
        </div><!--end .panel-group -->

    </div><!--end .col -->
</div> <!-- end .row-->

<div class="modal fade" id="myModal-del" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete User Group</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="flag_del" value="" class="form-control" placeholder="flag" required>
                </div>
                <div class="form-group">
                    <input type="hidden" id="user_id_del" value="" class="form-control" placeholder="user_id_del" required>
                </div>
                <div class="alert alert-danger" role="alert">
                    Are you sure you want to delete this record?.
                </div>
                <div id="msg_del" style="display: none;">
                    <div class="alert alert-callout alert-success" role="alert">

                    </div>
                </div>
                <div id="err_del" style="display: none;">
                    <div class="alert alert-callout alert-danger" role="alert">

                    </div>
                </div>
                <div id="result_del"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" id="del_users" class="btn btn-danger">Delete</button>
                <img id="loader_del" src="<?= base_url(); ?>assets/img/reload.GIF" style="display: none; width: 28px; height: 28px;" />
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-offset-1 col-md-10">
        <div class="card card-underline">
            <div class="card-head">
                <header><h3>Application Users</h3></header>
                <div class="tools">
                    <div class="btn-group">
                        <a id="refresh" class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>

                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body">

                <div id="test"></div>

                <table id="example3" class="table table-hover">
                    <thead>
                    <tr>
                        <th>SN#.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th class="text-center">Active</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="tblbody">
                    </tbody>
                </table>

            </div><!--end .card-body -->
        </div><!--end .card -->
    </div><!--end .col -->

</div> <!-- end .row-->

<div>


</div>


<?php include('include/footer.php'); ?>
<script type="text/javascript">
    populate_Group_Dropdown();
    loadUsers();

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
    function loadUsers()
    {

        $("#tblbody").empty();
        var url = "<?= base_url() . 'index.php/'; ?>app_users/select";
        $.getJSON(url, function(result){

            $.each(result, function(i, field){
                var status = "";
                if(field.length == 0) {
                    $('#tblbody').append('<tr><td>No record found</td></tr>');
                } else {
                    var sn = 1;
                    for(j=0; j<field.length;j++)
                    {
                        if(field[j].active == "1"){
                            status = "glyphicon glyphicon-star";
                        } else {
                            status = "glyphicon glyphicon-star-empty";
                        }
                        $('#tblbody').append('<tr><td>' + sn + '</td><td>' + field[j].first_name + '</td><td>' + field[j].last_name + '</td><td>' + field[j].email + '</td><td style="text-align:center;"><span class="'+ status + '"></span></td><td style="text-align:center;"><button name="btn_edit" data="' + field[j].user_id + '" class="btn btn-primary glyphicon glyphicon-edit margin-2px"></button><button name="btn_delete" data="' + field[j].user_id + '" class="btn btn-danger glyphicon glyphicon-remove"></button></td></tr>');
                        sn += 1;
                    }
                }

            });
        });
        $("#group_id").val('');
        $("#user_id").val('');
        $("#flag").val('');
        $("#first_name").val('');
        $("#last_name").val('');
        $("#email").val('');
        $("#password").val('');
    }
    $("#btn_save").click(function()
    {

        var form = $("#myform");

        var res = form.valid();

        var url = "";

        if(res){

            var status = "";

            if($("#active").is(':checked'))
            {
                status = "1";
            } else {
                status = "0";
            }

            var formdata = {
                'group_id'      : $("#group_id").val(),
                'user_id'       : $("#user_id").val(),
                'first_name'    : $("#first_name").val(),
                'last_name'     : $("#last_name").val(),
                'email'         : $("#email").val(),
                'password'      : $("#password").val(),
                'active'        : status
            }
            if($('#flag').val()=="")
            {
                url = "<?= base_url() . 'index.php/'; ?>app_users/create";
                SendDataByAjax(url, formdata, "#loader", false, "#result", "#msg-success", "#msg-error");



                //alert(url);

            }
            else if($('#flag').val()=="Edit")
            {
                url = "<?= base_url() . 'index.php/'; ?>app_users/update";
                SendDataByAjax(url, formdata, "#loader", false, "#result", "#msg-success", "#msg-error");

            }
            setTimeout(function() {
                loadUsers();
                window.close();
            }, 2000);

            $("#group_id").val('');
            $("#user_id").val('');
            $("#flag").val('');
            $("#first_name").val('');
            $("#last_name").val('');
            $("#email").val('');
            $("#password").val('');
            $('#cancel').hide();


        } else {
            alert('fill out the required fields.!!');
        }

    });
    $('#example3').on('click', 'button[name=btn_edit]', function(){

        var id = $(this).attr("data");

        var url = "<?= base_url() . 'index.php/'; ?>app_users/select_by_id/" + id;
        $.getJSON(url, function(result){

            $.each(result, function(i, field){
                for(j=0; j<field.length;j++)
                {
                    $('#group_id').val(field[j].group_id);
                    $('#user_id').val(field[j].user_id);
                    $('#first_name').val(field[j].first_name);
                    $('#last_name').val(field[j].last_name);
                    $('#email').val(field[j].email);
                    $('#password').val(field[j].password);
                    if(field[j].active == "1"){
                        $("#active").prop('checked', true);
                    } else {
                        $("#active").prop('checked', false);
                    }
                }
            });
        });

        $('#flag').val('Edit');
        $('#accordion1-1').collapse('show');
        $('#cancel').show();
    });

    $('#example3').on('click', 'button[name=btn_delete]', function(){
        var id = $(this).attr("data");
        $('#user_id_del').val(id);
        $('#flag_del').val('Delete');
        $('#myModal-del').modal('show');
    });

    $("#del_users").click(function(){
        if($('#flag_del').val()=="Delete")
        {
            var formdata_d = {
                'user_id'    : $("#user_id_del").val()
            }
            url = "<?= base_url() . 'index.php/'; ?>app_users/delete";
            SendDataByAjax(url, formdata_d, "#loader_del", false, "#result_del", "#msg_del", "#err_del");
        }
        $('#flag_del').val('');
        $('#user_id_del').val('');
    });
    $('#cancel').click(function(){

        $('#accordion1-1').collapse('hide');
        $("#group_id").val('');
        $("#user_id").val('');
        $("#flag").val('');
        $("#first_name").val('');
        $("#last_name").val('');
        $("#email").val('');
        $("#password").val('');
        $(this).hide();
    });

    $('#myModal-del').on('hidden.bs.modal', function (e) {
        $("#group_id_del").val('');
        $("#flag_del").val('');
        loadUsers();
    });

</script>
</body>
</html>



<style>
 
.dropdown-menu > li.kopie > a {
    padding-left:5px;
}
 
.dropdown-submenu {
    position:relative;
}
.dropdown-submenu>.dropdown-menu {
   top:0;left:100%;
   margin-top:-6px;margin-left:-1px;
   -webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px;
 }
  
.dropdown-submenu > a:after {
  border-color: transparent transparent transparent #333;
  border-style: solid;
  border-width: 5px 0 5px 5px;
  content: " ";
  display: block;
  float: right;  
  height: 0;     
  margin-right: -10px;
  margin-top: 5px;
  width: 0;
}
 
.dropdown-submenu:hover>a:after {
    border-left-color:#555;
 }

.dropdown-menu > li > a:hover, .dropdown-menu > .active > a:hover {
  text-decoration: underline;
}  
  
@media (max-width: 767px) {

  .navbar-nav  {
     display: inline;
  }
  .navbar-default .navbar-brand {
    display: inline;
  }
  .navbar-default .navbar-toggle .icon-bar {
    background-color: #fff;
  }
  .navbar-default .navbar-nav .dropdown-menu > li > a {
    color: red;
    background-color: #ccc;
    border-radius: 4px;
    margin-top: 2px;   
  }
   .navbar-default .navbar-nav .open .dropdown-menu > li > a {
     color: #333;
   }
   .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
   .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
     background-color: #ccc;
   }

   .navbar-nav .open .dropdown-menu {
     border-bottom: 1px solid white; 
     border-radius: 0;
   }
  .dropdown-menu {
      padding-left: 10px;
  }
  .dropdown-menu .dropdown-menu {
      padding-left: 20px;
   }
   .dropdown-menu .dropdown-menu .dropdown-menu {
      padding-left: 30px;
   }
   li.dropdown.open {
    border: 0px solid red;
   }

}
 
@media (min-width: 768px) {
  ul.nav li:hover > ul.dropdown-menu {
    display: block;
  }
  #navbar {
    text-align: center;
  }
}  

</style>


