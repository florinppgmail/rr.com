@extends('layouts.admin')

@section('style')
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
                    <h5 class="txt-dark">FREE referrals list</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin') }}">Dashboard</a></li>
                        <li><a href="#"><span>Referrals</span></a></li>
                        <li class="active"><span>Free</span></li>
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
                                        <table id="datatable_payments_requested" class="table table-hover display  pb-30" >
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Member Name</th>
                                                <th>Email</th>
                                                <th>Sum</th>
                                                <th>Requested At</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Member Name</th>
                                                <th>Email</th>
                                                <th>Sum</th>
                                                <th>Requested At</th>
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

    <script>
        function format(d) {
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
                '<tr id="payment_"'+ d.id +'">' +
                /*'<td style="width:20%"></td>' +*/
                '<td style="width:80%">' +
                    '<div class="pull-right">' +
                        '<button class="disable-user btn btn-warning btn-anim" onclick="acceptPayment(' + d.id +')">' +
                            '<i class="icon-check"></i><span class="btn-text">Accept</span>' +
                        '</button> ' +
                        ' <button class="disable-user btn btn-warning btn-anim">' +
                            '<i class="icon-check"></i><span class="btn-text">Reject</span>' +
                        '</button>' +
                    '</div>' +
                '</td>' +
                '</tr>' +
                '<tr style="display: hidden;">' +
                /*'<td style="width:20%"></td>' +*/
                '<td style="width:80%">' +
                '<p id="responseMessage"></p>' +
                '</td>' +
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

            var membersTable = $('#datatable_payments_requested').DataTable({
                ajax: {
                    url: '{{ route('admin-payments-requested-all') }}',
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
                    {'data': 'member.name', 'class': 'details-control'},
                    {'data': 'member.email'},
                    {'data': 'requested_sum', 'width': '7%'},
                    {'data': 'created_at', 'width': '20%'},
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

            // Array to track the ids of the details displayed rows
            var detailRows = [];

            $('#datatable_payments_requested tbody').on('click', 'tr td.details-control', function () {
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

        function acceptPayment(id){
            $.ajax({
                url : '/admin/payments/' + id + '/accept',
                type : 'POST',
                beforeSend: function (request) {
                    request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
                },
                success : function(response){
                    $('#responseMessage').html(response)
                },
                error : function(xhr){
                    if(xhr.status === 422){
                        $('#responseMessage').html(xhr.responseJSON);
                    } else {
                        alert('Something went totaly wrong, please contact the webmaster.')
                    }
                }
            })
        }
    </script>
@endsection