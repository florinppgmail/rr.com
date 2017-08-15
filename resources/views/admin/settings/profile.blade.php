@extends('layouts.admin')

@section('style')

@endsection

@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">

            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">Profile Settings</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin') }}">Dashboard</a></li>
                        <li><a href="#"><span>Settings</span></a></li>
                        <li class="active"><span>Profile</span></li>
                    </ol>
                </div>
                <!-- /Breadcrumb -->
            </div>
            <!-- /Title -->
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
        $(document).ready(function() {
            "use strict";

            var membersTable = $('#datable_members').DataTable({
                ajax: {
                    url: '{{ route('member-referrals-free-all') }}',
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
                    {'data': 'name'},
                    {'data': 'email'},
                    {'data': 'city', 'width': '15%'},
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
                },
                "fnInitComplete": function (oSettings, json) {

                }*/
            });
        });
    </script>
@endsection