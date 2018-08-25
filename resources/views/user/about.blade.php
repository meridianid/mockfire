@extends('admin_template')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">WHAT IS MOCKFIRE?</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <p>Mockfire is a <strong>free tool</strong> that lets you easily mock up APIs, generate custom data, and preform operations on it using RESTful interface. MockAPI is meant to be used as a prototyping/testing/learning tool.</p>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->

        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">GETTING STARTED</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <ul>
                        <li>In sidebar , click menu <a href="{{ url('/') }}/project/{{ Auth::user()->id }}">project</a>.</li>
                        <li>Then, Click "+" Add New Project. Input your project name.</li>
                        <li>Go to your project.</li>
                        <li>In project page, you must create new resource.</li>
                        <li>Input your name resource, method resource and schema .</li>
                        <li>Schema will be used to generate mock data .</li>
                        <li>For add new column schema , click "+" or for delete column schema click "X".</li>
                        <li>If you selected object data "Array" , there will be new button "+". click the button for add field for "Array".</li>
                        <li>Click "Create" .</li>
                        <li>Your New resource has been created . for generate mock data , click "Generate Data". </li>
                        <li>You can access your resource , click name your resource (Resource [Name Resource]) .</li>
                    </ul>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->

        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">LICENSE</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <center>
                        <p><strong>Contribute</strong></p>
                        <p>- Dhiemas Ganisha -</p>
                        <p>- Nunu Reza Mushnin -</p>
                        <p>- Staff & Member Meridian.id -</p>
                    </center>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection