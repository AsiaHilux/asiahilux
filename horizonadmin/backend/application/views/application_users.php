<?php include( 'include/header.php'); ?>
<?php include('include/nav/Administration.php'); ?>

<section>
    <div class="section-body">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="row">

<div class="row">
    <div class="col-md-12">
    	<div class="card card-underline" style="margin-bottom: -3px;">
    		<div class="card-head">
    			<header><h3>Manage Application Users</h3></header>
    			<div class="tools">
    				<div class="btn-group">
    					<button id="btn_show_new" type="button" class="btn btn-primary btn-raised btn-loading-state" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Loading...">Add User</button>
                        <button id="btn_show_view" type="button" class="btn btn-default btn-raised btn-loading-state" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Loading...">View Users</button>
    					
    				</div>
    			</div>
    		</div><!--end .card-head -->    
    	</div><!--end .card -->
    </div><!--end .col -->
    
</div>

<div id="page_content">
</div>


<?php include('include/footer.php'); ?>
<script type="text/javascript">

$("#btn_show_new").show();
$("#btn_show_view").hide();

var $btn = $("#btn_show_view");
load_view($btn);

function load_view($btn)
{
    
    setTimeout(function() {
        //
        $("#page_content").load
        ("<?= base_url() . 'index.php/'; ?>application_users/load_view", function(responseTxt, statusTxt, xhr){
            if(statusTxt == "success")
            {
                
                $btn.button('reset');
                $("#btn_show_new").show();
                $("#btn_show_view").hide();
            }   
            if(statusTxt == "error")
            {
                $btn.button('reset');
                if(xhr.status == "404")
                {
                    alert("Your login session hase beeen expired. Please login again.");
                    location.reload();
                }
                if(xhr.status == "403")
                {
                    alert("You don't have permission to perform this action.");
                }
            }
        });
    }, 500);
}

function load_from($btn)
{
    
    setTimeout(function() {
        //
        $("#page_content").load("<?= base_url() . 'index.php/'; ?>application_users/load_new", function(responseTxt, statusTxt, xhr){
            if(statusTxt == "success")
            {
                
                $btn.button('reset');
                $("#btn_show_new").hide();
                $("#btn_show_view").show();
            }   
            if(statusTxt == "error")
            {
                $btn.button('reset');
                if(xhr.status == "404")
                {
                    alert("Your login session hase beeen expired. Please login again.");
                    location.reload();
                }
                if(xhr.status == "403")
                {
                    alert("You don't have permission to perform this action.");
                }
            }
        });
    }, 500);
}

$("#btn_show_new").click(function() {
    var $btn = $(this);
    load_from($btn);
});

$("#btn_show_view").click(function() {
    var $btn = $(this);
    load_view($btn);
}); 

</script>
</body>
</html>
