<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title >ระบบกองทุนกู้ยืมเงินผู้สูงอายุ พมจ. อุบลราชธานี</title>

    <!-- Bootstrap Core CSS -->
    @include('admin.layouts.inc-stylesheet')
	@yield('stylesheet')



</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color:#CC99FF;" >
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href={{ action('HomeController@index')}} style="color: black;">ระบบกองทุนกู้ยืมเงินผู้สูงอายุ พมจ. อุบลราชธานี</a>
            </div>
            <!-- /.navbar-header -->

            @include('admin.layouts.inc-header')
            <!-- /.navbar-top-links -->

            @include('admin.layouts.inc-left-sidebar')
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                @yield('content')
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
	@include('admin.layouts.inc-scripts')
    @yield('scripts')

</body>
<link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables JavaScript -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
<!-- DataTables Responsive CSS -->
<link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
</html>
<script type="text/javascript">
  $(document).ready(function() {

      $('#reset').click(function() {
            location.reload();
        });

     $('#dataTables-example').DataTable({
          responsive: true
        });

     $('#dataTables-example').on('click', '.del', function() {
          var x = confirm("ต้องการลบใช่ไหม?");
          if (x) {
             return true;
        }
          else {
          event.preventDefault();
                return false;
            }
         });

  });

</script>
