<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>{{TITLE}}</title>
    <script type="text/javascript" src="<?php echo resource("js/app.js");?>"></script>
    <script type="text/javascript" src="<?php echo resource("js/customs.js");?>"></script>
    <link href="<?php echo base_url("templates/default/css/app.css");?>" rel="stylesheet">
  </head>

<body>
<header>
<?php include __DIR__."/../header.php";?>
</header>

<div class="container-fluid">
    <div class="row">
    
    <main class="col-md-12 col-lg-12" style="margin-top:15px;">
    <?php alert();?>
    <?php echo $data;?>

    
    </main>
</div>
<footer>
  <?php include __DIR__."/../footer.php";?>
</footer>
<script type="text/javascript">
  $(document).ready(function(){
    var windowHeight = $("body").outerHeight();
    var barHeight = $("header").outerHeight();
    var height = windowHeight - barHeight;
    var withs = $(window).width();
    if(withs < 780){
      $(".slidebar").css("margin-left","-100%");
    }else{
      $(".slidebar").css("margin-left","0");
    }
    $(".slidebar").height(height);

    $(".navbar-brand").width("200");
  });
</script>
</body>
</html>