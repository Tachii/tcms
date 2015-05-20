<?php $this->load->view('admin/layouts/includes/header'); ?>
<?php $this->load->view('admin/layouts/includes/sidebar'); ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<!-- Loading Main Content -->
			<?php $this->load->view($main_content); ?>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>
