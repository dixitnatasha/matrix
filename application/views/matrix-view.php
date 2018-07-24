<!DOCTYPE html>
<html>
<head>
	<title>Task</title>
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
</style>
<body>
	<?php if ($this->session->flashdata('data') != NULL) {
		$f_data = $this->session->flashdata('data'); 
				$arr_data = $f_data['mat_arr']; ?>
			<table class="tbl-border yellow-bg">
				<?php foreach ($arr_data as $key => $value) { ?>
				<tr class="tbl-border">	
					<?php foreach ($value as $vkey => $vvalue) { ?>
						<td class="margin-left tbl-border">
							<?php echo $vvalue; ?> 
						</td>
					<?php } ?>
				</tr>
				<?php } ?>
			</table>
			<form method="post" action="Matrix/create_submatrix">
				<div><p>Enter Size of SubMatrix:</p> <input type="Number" name="k_num"></div>
				<div><button type="submit"> Submit </button></div>
			</form>
	<?php } else { ?>
		<form method="post" action="<?php echo base_url(); ?>matrix/create_matrix">
			<div><p>Enter Number of Row(0-9):</p> <input type="Number" name="first_num"></div>
			<div><p>Enter Number of Column(0-9):</p> <input type="Number" name="sec_num"></div>
			<div><button type="submit"> Submit </button></div>
		</form>
	<?php } ?>
</body>
</html>