@extends('layouts.admin')

@section('style')
    <link href="{{ asset('dashboard/vendors/bower_components/sweetalert/dist/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <style>
        tbody .details-control {
            cursor: pointer;
        }

        tbody .details-control:hover {
            text-decoration: underline;
        }
    </style>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">

            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">SOLD referrals list</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin') }}">Dashboard</a></li>
                        <li><a href="#"><span>Referrals</span></a></li>
                        <li class="active"><span>Sold</span></li>
                    </ol>
                </div>
                <!-- /Breadcrumb -->
            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default card-view">
                        {{--<div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">data Table</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>--}}
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table id="datatable_referrals_sold" class="table table-hover display  pb-30" >
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Belongs To</th>
                                                {{--<th>City</th>--}}
                                                <th>Created At</th>
                                                <th>Needed At</th>
                                                {{--<th>Actions</th>--}}
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                {{--<th>Belongs To</th>--}}
                                                <th>City</th>
                                                <th>Created At</th>
                                                <th>Needed At</th>
                                                {{--<th>Actions</th>--}}
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->
        </div>

        <!-- Footer -->
        <footer class="footer container-fluid pl-30 pr-30">
            <div class="row">
                <div class="col-sm-12">
                    <p>2017 &copy; RyansReferrals.com.</p>
                </div>
            </div>
        </footer>
        <!-- /Footer -->

    </div>
    <!-- /Main Content -->
@endsection

@section('script')
    <script src="{{ asset('dashboard/vendors/bower_components/sweetalert/dist/sweetalert.min.js') }}"></script>

    <script>
        function format(d) {
            let urgent = d.urgent ? 'Yes' : 'No';

            let data =
                '<div class="panel panel-default card-view">' +
                '<div class="panel-heading">' +
                '<div class="pull-left">' +
                '</div>' +
                '<div class="clearfix"></div>' +
                '</div>' +
                '<div class="panel-wrapper collapse in">' +
                '<div class="panel-body">' +
                '<div class="row">' +
                '<div class="col-md-12">' +
                '<table style="clear: both" class="table table-bordered table-striped" id="user">' +
                '<tbody>' +
                '<tr>' +
                '<td style="width:20%"><strong>Category</strong></td>' +
                '<td style="width:80%">' + d.category.name + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td style="width:20%"><strong>Description</strong></td>' +
                '<td style="width:80%">' + d.description + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td style="width:20%"><strong>Address</strong></td>' +
                '<td style="width:80%">' + d.city + ', ' +  d.state + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td><strong>Phone</strong></td>' +
                '<td>' + d.phone + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td><strong>Details</strong></td>' +
                '<td>' + d.description + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td><strong>Contact time</strong></td>' +
                '<td>' + d.contact_time + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td><strong>Is urgent</strong></td>' +
                '<td>' + urgent + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td style="width:20%"><strong>Sold to</strong></td>' +
                '<td style="width:80%">' + d.buyers[0].name + ', ' + d.buyers[0].email+ '</td>' +
                '</tr>' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';

            return data;
        };

        $(document).ready(function() {
            "use strict";

            var membersTable = $('#datatable_referrals_sold').DataTable({
                ajax: {
                    url: '{{ route('admin-referrals-sold-all') }}',
                    type: 'POST',
                    contentType: "application/json",
                    beforeSend: function (request) {
                        request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
                    },
                    dataSrc: function (json) {
                        return json;
                    }
                },

                columns: [
                    {'data': 'id', 'width': '5%'},
                    {'data': 'name', 'class': 'details-control'},
                    {'data': 'email'},
                    {'data': 'belongs_to'},
                    /*{'data': 'city', 'width': '15%'},*/
                    {'data': 'createdAt', 'width': '12%'},
                    {'data': 'neededAt', 'width': '12%'},
                    /*{'data': 'actions', 'width': '10%', 'class' : 'text-center'},*/
                ],
                /*"columnDefs": [{
                    "targets": -1,
                    "defaultContent": '<button class="disable-user btn btn-warning btn-anim"><i class="icon-user"></i><span class="btn-text">View</span></button>'
                }],
                createdRow: function (row, data, dataIndex) {
                    $(row).data('id', data.id);
                    $(row).data('name', data.name);
                    $(row).data('active', data.active);
                },*/
                "fnInitComplete": function (oSettings, json) {

                }
            });

            var detailRows = [];

            $('#datatable_referrals_sold tbody').on('click', 'tr td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = membersTable.row(tr);
                var idx = $.inArray(tr.attr('id'), detailRows);

                if (row.child.isShown()) {
                    tr.removeClass('details');
                    row.child.hide();

                    // Remove from the 'open' array
                    detailRows.splice(idx, 1);
                }
                else {
                    tr.addClass('details');
                    row.child(format(row.data())).show();

                    // Add to the 'open' array
                    if (idx === -1) {
                        detailRows.push(tr.attr('id'));
                    }
                }
            });

            // On each draw, loop over the `detailRows` array and show any child rows
            membersTable.on('draw', function () {
                $.each(detailRows, function (i, id) {
                    $('#' + id + ' td.details-control').trigger('click');
                });
            });
        });
    </script>
@endsection