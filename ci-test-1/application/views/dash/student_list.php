<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!$_SESSION['u_name'])
{
	redirect('home','refresh');
}

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
   <body>
      <?php $this->load->view('dash/inc/nav');?>
    <!--dash data-->
    <div class="container">
    	<div class="row">
    		<div class="col-lg-3 col-md-3">
    			<?php $this->load->view('dash/inc/sidebar');?>
    			
    		</div>
    		<div class="col-lg-9 col-md-9">
           <table class="table table-bordered">
            <tr>
              <th>ID</th>
              <th>Student Name</th> 
              <th>Details</th>  
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          
               <?php
                       $data_list = $this->db->get('student');
                       foreach ($data_list->result() as $stu_data) {
                        ?>
                       <tr>
                        <td> <?php echo $stu_data->s_id;?></td>
                        <td><?php echo $stu_data->s_name;?></td>
                        <td><a href="<?php site_url()?>student_details_view/<?php echo $stu_data->s_id;?>" class="btn btn-warning btn-block btn-xs">Details</a></td>
                       <td><a href="<?php site_url()?>student_details_update_view/<?php echo $stu_data->s_id;?>" class="btn btn-warning btn-block btn-xs">Edit</a></td>
                       <td><a href="<?php echo site_url();?>student/delete/<?php echo $stu_data->s_id;?>" class="btn btn-danger btn-block btn-xs">Delete</a></td>
                       </tr>
                  <?php }
               ?>
              
           </table>
    		    </div>
    	</div>
    </div>

     <!--dash data-->


   </body>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script>
  </body>
</html>
