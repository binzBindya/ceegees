      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" id="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Reset Password<div id='response'>	<?php echo $this->session->flashdata('resetpassword'); ?></div><br/>
            
          </h1>
         
        </section>
       
                   
          
        <!-- Main content -->
        <section class="content">
         <div class="row">
               
            <div class='col-md-6'>
              <div class='box' style="padding:10px"  id="box">
               
                 <div class='box-body' id='box_body'>
                
                   
                <div class='box-header'>
                  <h3 class='box-title'>Enter Password</h3>
                </div><!-- /.box-header -->
                <div class='box-body' >
                  
                  <form role='form' method='post' action="<?php echo site_url('admin/reset_password');?>">
          
                    <!-- text input -->
                    <div class='form-group'>
                         <label>password</label>
                      <input type='password' name='password' class='form-control' value="<?php echo set_value('password'); ?>" />
                      <?php echo form_error('password','<div class="error">', '</div>'); ?>
                    </div>
                    <div class='form-group'>
                         <label>Confirm Password</label>
                      <input type='password' name='conpassword' class='form-control' value="<?php echo set_value('conpassword'); ?>" />
                      <?php echo form_error('conpassword','<div class="error">', '</div>'); ?>
                    </div>
                 
                  <input type='submit' class='btn btn-primary pull-right'  id='change_password' value='Go'>
                  </form>
                </div><!-- /.box-body -->
       
            
            </div><!--/.col (right) -->
                        
                 </div><!-- /.box -->
             
              </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        
      </footer>
      
      
      <!-- Add the sidebars background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
      
      
       
    </div><!-- ./wrapper -->

   
    <!-- jQuery 2.1.4 -->
     <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
    
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
     <!-- SlimScroll -->
    <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>
    <!-- FastClick -->
    
    <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.min.js');?>"></script>
       <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/dist/js/app.min.js');?>" type="text/javascript"></script>  

  </body>
</html>
