@extends('admin/master')
@section('extra-css')
<link rel="stylesheet" href="http://startbootstrap.com/templates/sb-admin-v2/css/plugins/morris/morris-0.4.3.min.css"/>
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            <small><i class="fa fa-dashboard"></i></small>
            Glavni Panel
        </h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<!--Comments-->
<div class="row">
<div class="col-lg-3">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <i class="fa fa-comments fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{ Comment::count() }}</p>

                    <p class="announcement-text">Komentari</p>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer announcement-bottom">
                <div class="row">
                    <a href="{{ url('admin/comments') }}">
                        <div class="col-xs-6">
                            Pogledaj Komentare
                        </div>
                        <div class="col-xs-6 text-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </a>
                  
                </div>
            </div>
        </a>
    </div>
</div>

<!--Images-->
<div class="col-lg-3">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <i class="fa fa-picture-o fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{ Images::approved()->count() }}</p>

                    <p class="announcement-text">Fotografije</p>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer announcement-bottom">
                <div class="row">
                    <a href="{{ url('admin/images') }}">
                        <div class="col-xs-6">
                            Pogledaj Fotografije
                        </div>
                        <div class="col-xs-6 text-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </a>
    </div>
</div>

<!--Users-->
<div class="col-lg-3">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{ User::confirmed()->count() }}</p>

                    <p class="announcement-text">Korisnici</p>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer announcement-bottom">
                <div class="row">
                    <a href="{{ url('admin/users') }}">
                        <div class="col-xs-6">
                            Pogledaj sve Korisnike
                        </div>
                        <div class="col-xs-6 text-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </a>
    </div>
</div>

<!--Feature Images-->
<div class="col-lg-3">
    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <i class="fa fa-star-o fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{ Images::approved()->whereNotNull('featured_at')->count() }}</p>

                    <p class="announcement-text">Featured Fotografije</p>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer announcement-bottom">
                <div class="row">
                    <a href="{{ url('admin/images/featured') }}">
                        <div class="col-xs-6">
                            Featured Fotografije
                        </div>
                        <div class="col-xs-6 text-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </a>
    </div>
</div>
</div>
<div class="row">
<!--Blogs-->
<div class="col-lg-3">
    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <i class="fa fa-file-text fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{ Blogs::count() }}</p>

                    <p class="announcement-text">Blogovi</p>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer announcement-bottom">
                <div class="row">
                    <a href="{{ url('admin/blogs') }}">
                        <div class="col-xs-6">
                            Pogledaj Blogove
                        </div>
                        <div class="col-xs-6 text-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="col-lg-3">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <i class="fa fa-frown-o fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{ User::wherePermission('ban')->count() }}</p>

                    <p class="announcement-text">Banovani Korisnici</p>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer announcement-bottom">
                <div class="row">
                    <div class="col-xs-6">
                        Pogledaj banovane Korisnike
                    </div>
                    <div class="col-xs-6 text-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="col-lg-3">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <i class="fa fa-flag-o fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{ Report::count() }}</p>

                    <p class="announcement-text">Prijave</p>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer announcement-bottom">
                <div class="row">
                    <a href="{{ url('admin/reports') }}"><div class="col-xs-6">
                        Pogledaj Prijave
                    </div>
                    <div class="col-xs-6 text-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </div></a>
                </div>
            </div>
        </a>
    </div>
</div>


@if(siteSettings('autoApprove') == 0)
<div class="col-lg-3">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <i class="fa fa-question fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{ Images::whereNull('approved_at')->count() }}</p>

                    <p class="announcement-text">Potrebna Dozvola</p>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer announcement-bottom">
                <div class="row">
                    <a href="{{ url('admin/images/approval') }}"><div class="col-xs-6">
                            Potrebna Dozvola
                    </div>
                    <div class="col-xs-6 text-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </div></a>
                </div>
            </div>
        </a>
    </div>
</div>
@endif
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Dnevna Statistika Registrovanja
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row section">
                    <div class="col-md-12">
                        <h4 class="title">Dnevna Statistika Registrovanja <small>Broj registrovanih korisnika u danu</small></h4>
                    </div>
                    <div class="col-md-12 chart">
                        <div id="signup-container"></div>
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->


        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Dnevna Statistika otpremljenih Fotografija
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row section">
                    <div class="col-md-12">
                        <h4 class="title">Dnevna Statistika otpremljenih Fotografija <small>Broj otpremljenih fotografija u mesecu</small></h4>
                    </div>
                    <div class="col-md-12 chart">
                        <div id="images-container"></div>
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i> Detalji Mreže
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="list-group">
                    <div id="donut-example"></div>
                </div>

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

        <!-- /.panel -->
    </div>
    <!-- /.col-lg-4 -->
</div>
<!-- /.row -->


@stop

@section('extra-js')
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>

<script type="text/javascript">
    Morris.Donut({
        element: 'donut-example',
        data: [
            {label: "Fotografija", value: {{ Images::count() }} },
            {label: "Korisnika", value: {{ User::count() }}},
            {label: "Komentara", value: {{ Comment::count() }} },
            {label: "Odgovora", value: {{ Reply::count() }} },
        ]
    });

    var data = JSON.parse('{{ $signup }}');
    new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'signup-container',
        data: data,
        xkey: 'date',
        ykeys: ['value'],
        labels: ['Users'],
    });

    var newsdata = JSON.parse('{{ $images }}');
    new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'images-container',
        data: newsdata,
        xkey: 'date',
        ykeys: ['value'],
        labels: ['News'],
    });
</script>
@stop