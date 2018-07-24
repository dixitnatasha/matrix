<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	.margin-left {
		margin-left: 15px;
	}
	.tbl-border{
		border: 1px solid black;
	}
	.yellow-bg{
		background-color: #FFFACD;	
	}
	.green-bg{
		background-color: #9ACD32;
	}
	.margin-top{
		margin-top: 20px;
	}
</style>
<body>
	<h3>Created Matrix :</h3>
	<?php $f_data = $this->session->flashdata('data'); 
				$mat_data = $f_data['matrix']; ?>
	<table class="tbl-border yellow-bg">
		<?php foreach ($mat_data as $key => $value) { ?>
		<tr class="tbl-border">	
			<?php foreach ($value as $vkey => $vvalue) { ?>
				<td class="tbl-border">
					<?php echo $vvalue; ?> 
				</td>
			<?php } ?>
		</tr>
		<?php } ?>
	</table>
	<h3>Sub Matrix with having Highest number of its elements.</h3>
	<?php $f_data = $this->session->flashdata('data'); 
				$arr_data = $f_data['sub_matrix']; ?>
	<table class="tbl-border green-bg">
		<?php foreach ($arr_data as $key => $value) { ?>
		<tr class="tbl-border">	
			<?php foreach ($value as $vkey => $vvalue) { ?>
				<td class="tbl-border">
					<?php echo $vvalue; ?> 
				</td>
			<?php } ?>
		</tr>
		<?php } ?>
	</table>
	<div class="margin-top">
		<a href="<?php echo base_url(); ?>index.php/matrix">Try Another</a>
	</div>
</body>
</html>