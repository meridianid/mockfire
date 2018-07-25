<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mockfire</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset("/bower_components/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("/bower_components/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset("/bower_components/Ionicons/css/ionicons.min.css") }}" rel="stylesheet" type="text/css" />
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset("/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset("/bower_components/select2/dist/css/select2.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css") }}" rel="stylesheet" type="text/css" >
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue-light.min.css") }}" rel="stylesheet" type="text/css" >
<!--   <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
  <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  @include('include.header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('include.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $page_title or "Mockfire" }}
        <small>{{ $page_description or "- v1" }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">{{ Request::segment(1) }}/{{ Request::segment(2) }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('include.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset("/bower_components/jquery/dist/jquery.min.js") }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset("/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<!-- Select2 -->
<script src="{{ asset("/bower_components/select2/dist/js/select2.full.min.js") }}"></script>
<!-- DataTables -->
<script src="{{ asset("/bower_components/datatables.net/js/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("/bower_components/admin-lte/dist/js/adminlte.min.js") }}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<script>
  $(document).ready(function () {
  	//Initialize Select2 Elements
    $('.select2').select2()

    $('#data').DataTable()
    $('#table').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

        <script>
        $(document).ready(function() {
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".daftar-isi"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID
            
            var a = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(a < max_fields){ //max input box allowed
                    a++; //text box increment
                    // $(wrapper).append('<div class="form-group"><input class="form-control" type="text" name="mytext[]"/><a href="#" class="remove_field"><i class="fa"></i></a></div>'); //add input box
                    
                    $(wrapper).append('<div class="skema"><div class="col-xs-4"><input class="form-control" type="text" name="mytext[]" placeholder="Field Name"></div><div class="col-xs-4"><select class="form-control select2 select_type" name="type[]" style="width: 100%;" id="type"><optgroup label="ADDRESS"><option value="address.zipCode">Zip code</option><option value="address.city">City</option><option value="address.streetAddress">Street address</option><option value="address.secondaryAddress">Secondary address</option><option value="address.county">County</option><option value="address.country">Country</option><option value="address.state">State</option><option value="address.stateAbbr">State abbreviated</option><option value="address.latitude">Latitude</option><option value="address.longitude">Longitude</option></optgroup><optgroup label="COMMERCE"><option value="commerce.color">Color</option><option value="commerce.department">Department</option><option value="commerce.productName">Product name</option><option value="commerce.price">Price</option><option value="commerce.productAdjective">Product adjective</option><option value="commerce.productMaterial">Product material</option><option value="commerce.product">Product</option></optgroup><optgroup label="DATE"><option value="date.past">Past</option><option value="date.future">Future</option><option value="date.recent">Recent</option><option value="date.month">Month</option><option value="date.weekday">Weekday</option></optgroup><optgroup label="IMAGE"><option value="image.image">Image</option><option value="image.avatar">Avatar</option><option value="image.dataUri">Data URI</option></optgroup><optgroup label="NAME"><option value="name.firstName">First name</option><option value="name.lastName">Last name</option><option value="name.findName">Full name</option><option value="name.jobTitle">Job title</option><option value="name.prefix">Prefix</option><option value="name.suffix">Suffix</option><option value="name.title">Title</option><option value="name.jobDescriptor">Job descriptor</option><option value="name.jobArea">Job area</option><option value="name.jobType">Job type</option></optgroup><optgroup label="PHONE"><option value="phone.phoneNumber">Number</option></optgroup><optgroup label="RANDOM"><option value="random.number">Number</option><option value="random.uuid">UUID</option><option value="random.boolean">Boolean</option><option value="random.word">Word</option><option value="random.words">Words</option><option value="random.locale">Locale</option><option value="random.alphaNumeric">Alpha numeric</option></optgroup><optgroup label="SYSTEM"><option value="system.fileName">File name</option><option value="system.commonFileName">Common file name</option><option value="system.commonFileExt">Common file extension</option><option value="system.fileType">File type</option><option value="system.fileExt">File extension</option><option value="system.semver">Semver</option></optgroup><optgroup label="OBJECT"><option value="object.object">Object</option></optgroup><optgroup label="ARRAY"><option value="array.array">Array</option></optgroup></select></div><p class="add_array"></p><div class="col-xs-4"><input class="form-control" type="hidden" name="id_user" value="{{ Auth::user()->id }}"></p></div><a href="#" class="remove_field" title="Delete"><i class="fa fa-remove"></i></a><div class="col-md-6 skema2"></div></div><br>');
                    // $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
		        }
		    });
            
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); a--;
            })
        });
						$(document).on('change', '.select_type' ,function() {
                          // alert( this.value );
                          var value_select_type = this.value;
                          if(value_select_type == 'array.array') {
                          	$(this).parents(".skema").find(".add_array").append("<a class='skema_add_field btn btn-primary' title='Add New Array' ><i class='fa fa-plus'></i></a>");
  							console.log($(this).parents(".skema").find(".add_array"))
                                  // document.getElementByClass("add_array").innerHTML = "<a class='add_field_button btn btn-primary' title='Add New Array' ><i class='fa fa-plus'></i></a>";
                            } else {

                            }
                        })
        </script>
        <script type="text/javascript">
        	$(document).on('click', '.skema_add_field' ,function() {
        		$(".skema2").append('<div class="form-group"><input class="form-control" type="text" placeholder="Input new field" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        	});

        </script>
</body>
</html>