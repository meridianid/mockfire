@extends('admin_template')

@section('content')
    <div class='row'>
        <div class='col-md-6'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Welcome to MockFire</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        </ol> -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSy_abYxeAQllz-qCThucRW3tJQ05099Wp_Y-3Z5ipscAMBsj6Pkg" width="100%"></div>
                            <div class="item"><img src="https://1.bp.blogspot.com/-x-PX22iYjhc/W0hLIK7Z9OI/AAAAAAAAFTM/iQnYnTeTcp8wRyYYJwVs2CzIPdhBFjDswCLcBGAs/s1600/LogoAsianGames.png" width="100%"></div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                </div><!-- /.box-footer-->
            </div><!-- /.box -->
        </div><!-- /.col -->
        <div class='col-md-6'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Mockfire</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <p><strong>Mockfire</strong> adalah website layanan API , dimana anda dapat menggunakan layanan kami untuk membuat struktur API yang akan anda gunakan. Anda juga dapat men-generate data data yang kami siapkan, nantinya data itu akan berbeda setiap anda men-generate. Layanan ini kami persembahkan untuk anda yang ingin menginput data ke dalam database anda tanpa perlu panjang lebar mengetik satu-satu atau menginput satu-satu, dengan ini anda langsung bisa menginput data ke dalam database anda menggunakan hasil <i>JSON</i> dari kami.</p>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection