<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matrix extends CI_Controller {

	function __construct() {
        parent::__construct();

    }

	public function index()
	{
		$this->load->view('matrix-view');

	} // end of index function

	/*----------------------- Create Matrix Function  -------------------------*/
	/* it take 2 inputs value of n and m */
	/* Create Matrix of n*m */
	/* Redirect To display Matrix */
	function create_matrix() {

		$n = (int)$this->input->post('first_num'); // receive first Value
		$m = (int)$this->input->post('sec_num');   // receive second Value

		$mat_arr = array(); // array to store matrix

		for ($i=0; $i < $n ; $i++) { 

			$row_arr = array(); // array to store single row

			for ($j=0; $j < $m ; $j++) { 

				$temp_var = mt_rand(1,40);

				array_push($row_arr,$temp_var);
			
			} // end of second for loop

			array_push($mat_arr,$row_arr);

		} // end of first for loop

		$session_data = array('mat_arr' => $mat_arr,'n'=>$n, 'm' => $m);

		$this->session->set_userdata($session_data);

		$data = array('mat_arr' => $mat_arr);

        $fl_data = $this->session->set_flashdata('data', $data);

        redirect(base_url().'matrix',$fl_data);

	} // end of create matrix

	/*----------------------- Create Sub Matrix Function  -------------------------*/
	/* it take 1 input value of k */
	/* Create Possible Sub Matrixs of n*m */
	/* Find Sub Matrix with having highest sum of its elements */
	/* Redirect To display Matrix and its Sub Matrix with having Highest Sum */

	function create_submatrix() {

		$k = (int)$this->input->post('k_num'); // receive submatrix value

		$ach_matrix = $this->session->userdata('mat_arr'); // created Matrix
		$n = $this->session->userdata('n'); // Entered number of rows
		$m = $this->session->userdata('m'); // Entered number of columns

		$in_var = $k-1; // to get last index of row/column of submatrix

		$row_var = $n - $in_var; // to get number of rows
		$col_var = $m - $in_var; // to get number of columns

		$total_sub = $row_var*$col_var; // to get total number of submatrix

		$ttl_sub_max_arr = array(); // array to store total sub matrix
		$col_num = 0; // define variable
		$row_num = 0; // define variable

		for ($a=0; $a < $total_sub ; $a++) { 

			$chki = 0;
			$sub_max_arr = array(); // array to store a sub matrix
			for ($i=$row_num; $i < $n ; $i++) {

				if ($chki < $k) {
					$temp_arr = array(); // array to store value of sub matrix
					$chkj = 0;
					for ($j= $col_num; $j < $m ; $j++) { 

						if ($chkj < $k) {

							$temp = $ach_matrix[$i][$j];
							array_push($temp_arr,$temp);
							$chkj++;

						} // end of if 
						else{
							break;
						}
						
					} // end of for loop				

				array_push($sub_max_arr,$temp_arr);
				$chki++;

				} else {
					break;
				}

			} // end of for loop

			array_push($ttl_sub_max_arr,$sub_max_arr);

			if ($col_num < $col_var-1) {
				$col_num++;
			} else {
				if ($row_num < $row_var-1 ) {
					$row_num++;
					$col_num = 0;
				}
			}

		} // end of for loop

		$sum_arr = array();

		foreach ($ttl_sub_max_arr as $key => $value) {
			$sub_sum = 0;
			foreach ($value as $vkey => $vvalue) {
				$temp_sum = 0;
				foreach ($vvalue as $kkey => $kvalue) {
					$temp_sum = $temp_sum + $kvalue;
				} // end of foreach
				$sub_sum = $sub_sum + $temp_sum;
			} // end of foreach
			array_push($sum_arr, $sub_sum);
		} // end of foreach

		$sorted_arr = $sum_arr; // assign to another variable

		rsort($sorted_arr); // to get sorted array in ascending order

		$highest_sum = $sorted_arr[0]; // to get highest sum of sub matrix

		$sub_key = array_search($highest_sum, $sum_arr);  // to get key of submatrix with having highest sum of its element

		$highest_sum_sub_mat = $ttl_sub_max_arr[$sub_key]; // to get submatrix with having highest sum of its element

		$data = array('sub_matrix' => $highest_sum_sub_mat,'matrix' => $ach_matrix);

        $fl_data = $this->session->set_flashdata('data', $data); // set flashdata

        redirect(base_url().'sub_matrix',$fl_data);

	} // end of create matrix

} // end of class