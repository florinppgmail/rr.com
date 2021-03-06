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
                    <h5 class="txt-dark">Vendor's list</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin') }}">Dashboard</a></li>
                        <li><a href="#"><span>Users</span></a></li>
                        <li class="active"><span>Vendors</span></li>
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
                                        <table id="datable_vendors" class="table table-hover display  pb-30">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Categories</th>
                                                <th>Referrals</th>
                                                <th>Sign Up</th>
                                                <th>Active</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Categories</th>
                                                <th>Referrals</th>
                                                <th>Sign Up</th>
                                                <th>Active</th>
                                                <th>Actions</th>
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
            '<div class="col-md-6">' +
            '<table style="clear: both" class="table table-bordered table-striped" id="user">' +
                '<tbody>' +
                    '<tr>' +
                    '<td style="width:20%"><strong>Address</strong></td>' +
                    '<td style="width:80%">' + d.address + ', ' + d.city + ', ' + d.zip + ', ' +  d.state + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td><strong>Phone</strong></td>' +
                    '<td>' + d.phone + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Details</td>' +
                    '<td>' + d.description + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Sign up date</td>' +
                    '<td>' + d.created_at + '</td>' +
                    '</tr>' +
                '</tbody>' +
            '</table>' +
            '</div>' +
            '<div class="col-md-6">' +
            '<table style="clear: both" class="table table-bordered table-striped" id="user">' +
            '<tbody>' +
            '<td style="width:20%">Facebook</td>' +
            '<td style="width:80%">' + d.facebook + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>LinkedIn</td>' +
            '<td>' + d.linkedin + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Twitter</td>' +
            '<td>' + d.twitter + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Youtube</td>' +
            '<td>' + d.youtube + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Website</td>' +
            '<td>' + d.website + '</td>' +
            '</tr>' +
            '</tbody>' +
            '</table>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

            let datad = 'Address: ' + d.address + ' ' +
                '<br>Member until: ' + d.membership_expires_at +
                '<br>Trial until: ' + d.trial_ends_at
                // d.photo : TODO : implement photo if needed
            ;
            return data;
        }
        $(document).ready(function () {
            var vendorsTable = $('#datable_vendors').DataTable({
                ajax: {
                    url: '{{ route('admin-users-vendors-all') }}',
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
                    {'data': 'categories', 'width': '10%'},
                    {'data': 'referrals', 'width': '10%'},
                    {'data': 'sign_up', 'width': '10%'},
                    {'data': 'active', 'width': '10%'},
                    {'data': 'actions', 'width': '12%'},
                ],
                "columnDefs": [{
                    "targets": -1,
                    "defaultContent": '<button class="disable-user btn btn-warning btn-anim"><i class="icon-user"></i><span class="btn-text">Change status</span></button>'
                }],
                createdRow: function (row, data, dataIndex) {
                    $(row).data('id', data.id);
                    $(row).data('name', data.name);
                    $(row).data('active', data.active);
                },
                "fnDrawCallback": function (oSettings, json) {
                    $('#datable_vendors').find('button.disable-user').on('click', function () {
                        /*var tr = $(this).parents('tr');
                         alert(tr.data('id'));
                         */
                        var tr = $(this).parents('tr'),
                            action = tr.data('active') === 'YES' ? 'Disabl' : 'Enabl',
                            message = tr.data('active') === 'YES' ? 'block him from accessing his account!' : 'allow it to access the account!';

                        swal({
                            title: "Are you sure?",
                            text: action + "ing the user will " + message,
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#e69a2a",
                            confirmButtonText: "Yes, " + action.toLowerCase() + "e it!",
                            closeOnConfirm: false
                        }, function () {
                            changeUserStatus(tr.data('id'));
                            swal("Status Changed!", "The user has been " + action.toLowerCase() + "ed.", "success");
                        });
                    });
                }
            });

            function changeUserStatus(id) {
                $.ajax({
                    url: '/admin/users/' + id + '/status',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        vendorsTable.ajax.reload();
                    },
                    error: function (xhr, textStatus) {
                        if (xhr.status === 403) {
                            alert(xhr.responseText);
                        } else {
                            alert('Something went wrong, please contact support!')
                        }
                    }
                });
            }


            // Array to track the ids of the details displayed rows
            var detailRows = [];

            $('#datable_vendors tbody').on('click', 'tr td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = vendorsTable.row(tr);
                var idx = $.inArray(tr.attr('id'), detailRows);

                if (row.child.isShown()) {
                    tr.removeClass('details');
                    row.child.hide();

                    // Remove from the 'open' array
                    detailRows.splice(idx, 1);
                }
                else {
                    tr.addClass('details');
                    row.child(format(row.data().profile)).show();

                    // Add to the 'open' array
                    if (idx === -1) {
                        detailRows.push(tr.attr('id'));
                    }
                }
            });

            // On each draw, loop over the `detailRows` array and show any child rows
            vendorsTable.on('draw', function () {
                $.each(detailRows, function (i, id) {
                    $('#' + id + ' td.details-control').trigger('click');
                });
            });

        });
    </script>
@endsection
