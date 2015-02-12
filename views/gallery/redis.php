<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style type="text/css">
	::selection{ background-color: #E13300; color: blue; }
	::moz-selection{ background-color: #E13300; color: blue; }
	::webkit-selection{ background-color: #E13300; color: blue; }
	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}
	h1 {
		color: #444;
		background-color: transparent;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 10px 0;
		padding: 14px 15px 0px 15px;
	}
	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}
	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	p{
		margin-left:16px;
	}
	.buttons{
		margin-top:20px;
	}
	.buttons a{
		padding: 20px 40px;
		font-size:16px;
		background-color:#666666;
		margin:10px;
		color:#FFFFFF;
		font-weight:600;
		text-decoration:none;
	}
	.buttons a.orange_css{
		background-color:#FF9900;
	}
	.buttons a.green_css{
		background-color:#006633;
	}
	.buttons a.blue_css{
		background-color:#FFFFFF;
		color:#333333;
	}
	
	</style>    
</head>

<div id="container">
	<h1>Redis example</h1>
        
	<div id="body">
            <button id = "ch_color"type="button" class="btn btn-danger">Click</button>
            <button id = "skip_color"type="button" class="btn btn-warning">Skip</button>
            <a class = "btn btn-default"href="<?php echo base_url()?><?php echo gallery_url()?>content/reset_db">Reset</a>
            <div style="color: <?php echo $color_name;?>;font-size:30px;height:30px;margin-top:5px;"><?php echo $color_name;?></div>
            <div id = "dp_click"style="width: 500px;color: <?php echo $color_name;?>; background:<?php echo $color_name;?>;" ><?php echo $color_name;?></div>
            <blockquote>
                <div id = "dp_show"style="width: 200px;">Click: <?php echo $color_click;?></div>
                <div id = "dp_show"style="width: 200px;">Show: <?php echo $color_show;?></div>    
            </blockquote>
        
        <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th></th>
                <th>Orange</th>
                <th>Green</th>
                <th>Blue</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Click</td>
                <td><?php echo $orange_click;?></td>
                <td><?php echo $green_click;?></td>
                <td><?php echo $blue_click;?></td>
              </tr>
              <tr>
                <td>Show</td>
                <td><?php echo $orange_show;?></td>
                <td><?php echo $green_show;?></td>
                <td><?php echo $blue_show;?></td>
              </tr>
            </tbody>
          </table>

	</div>
</div>
<script>
$(document).ready(function(){
    $("#ch_color").click(function(){
//        $(this).hide();
    $('#ch_color').load("/<?php echo gallery_url(); ?>content/set_click/<?php echo $color_name;?>", {
        }, 
        function(str) {
            console.log(str);
        });
    location.reload();
    });
    $("#skip_color").click(function(){
//        $(this).hide();
    $('#skip_color').load("/<?php echo gallery_url(); ?>content/skip", {
        }, 
        function(str) {
            console.log(str);
        });
    location.reload();
    });
});
</script>