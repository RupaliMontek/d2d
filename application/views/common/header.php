<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>D2D</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link href="<?php echo base_url(); ?>frontend/css/mystyle.css" rel="stylesheet">
    
            <script src="<?php echo base_url();?>frontend/js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url();?>frontend/js/jquery.validate.js"></script>
        <script type = "text/javascript" src = "<?php echo base_url(); ?>/frontend/js/multiselect-dropdown.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
  </head>
  <body>
       <?php if($this->session->flashdata('success')){ ?>
        <script>
         toastr.success('<?php echo $this->session->flashdata('success'); ?>', 'Success Alert', {timeOut: 8000})
           
            </script>
        <?php }else if($this->session->flashdata('error')){  ?>
        <script>
        toastr.error('<?php echo $this->session->flashdata('error'); ?>', {timeOut: 8000})
            
            </script>
        <?php }else if($this->session->flashdata('warning')){  ?>
        <script>
            toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
             </script>
        <?php }else if($this->session->flashdata('info')){  ?>
        <script>
            toastr.info("<?php echo $this->session->flashdata('info'); ?>");
            </script>
        <?php } ?>
<div id="info"></div>
<div id="success"></div>
<div id="danger"></div>

<div class="container-fluid g-0" id="forTopHead">
  <div class="container">
  <div class="row TopHeadInn">
    <div class="col-lg-2 col-sm-3 frlogo"><img id="logoimg" src="<?php echo base_url(); ?>frontend/images/logo.png" width="" height="auto"></div>
    <div class="col-lg-10 col-sm-9"><div class="w-100 forMarquee ">
      <marquee onmouseover="this.stop()" onmouseout="this.start()" direction="left" width="100%">
                              <a id="frmarquee" href="gfhfghfgh" target="blank">test data</a>
                                    <a id="frmarquee2" href="https://www.doc2data.in/" target="blank">https://www.doc2data.in/</a>
                              </marquee>

    </div></div>
</div>
</div>
</div>


