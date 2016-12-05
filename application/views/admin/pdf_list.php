      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" id="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Uploaded Resumes<div id='response'>	<?php echo $this->session->flashdata('file'); ?></div><br/>
            
          </h1>
          
        </section>
       
                   
          
        <!-- Main content -->
        <section class="content" id="content">
          <div class="row">
              <div class="col-xs-12">
                
                
              <div class="box table-responsive">
                <div class="box-header">
                  <h3 class="box-title edit">List</h3>
                  
                                                    <a href="<?php echo base_url() ?>index.php/buku_con/toExcelAll" class="btn btn-primary btn-xs pull-right">Download as Excel</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      <th style='width: 10px'>#</th>
                      <th>File Name</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>Marketing Experience</th>
                      <th>Familiarity with UAE</th>
                    
                      <th>Whether holding a UAE driving license ?</th>
                      <th>Applied Date</th>
                    </tr>
                    
                     <tbody>
                      <?php $i=1; 
                     
                        foreach($files as $file){ 
                     ?>
                    <tr>

                      <td><?php echo $i; ?></td>
                      <td><a href="<?php echo base_url('index.php/import_pdf/view_pdf/'.$file->resume)?>" target="_blank"><?php echo $file->resume;?></a></td>
                     <td><?php echo $file->name; ?></td>
                     <td><?php echo $file->email; ?></td>
                     <td><?php echo $file->contact; ?></td>
                     <td><?php echo $file->experience; ?></td>
                     <td><?php echo $file->familiarity; ?></td>
                     <td><?php echo $file->driving_license; ?></td>
                     <td><?php echo $file->applied_date; ?></td>
                   
                      
                     
                    </tr>
                    <?php  $i=$i+1; }?>
                 </tbody>
                   
                  </table>
                        
                  </div><!-- /.box-body -->
              </div><!-- /.box -->
            <!--   <span id="result_pwd"></span> -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        
       <!-- <strong>Powered By <a href="http://webqua.com">Webqua</a>.</strong> -->
      </footer>
      
      
      <!-- Add the sidebars background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
      
      
       <!--modal-->           
    
 <div id="myModal2" class="modal fade">
   <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-body">
              
                <div class='box-header'>
                  <i class='fa fa-group'></i>
                  
                  <!-- tools box -->
                 </div>
                 
            </div>

        </div>
       </div>
    </div>
<!--modal-->  
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
    <script type="text/javascript">

        $(document).ready(function() 
        {
                $(document).on("click", "#del_conf", function () {
                    return confirm('Are you sure you want to delete this File?');
                });
        });
</script>
  </body>
</html>
