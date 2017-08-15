@extends('layouts.vendor')

@section('style')

@endsection

@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">Categories Of interest</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('vendor-dashboard') }}">Dashboard</a></li>
                        <li><a href="#"><span>Referrals</span></a></li>
                        <li class="active"><span>Categories</span></li>
                    </ol>
                </div>
                <!-- /Breadcrumb -->
            </div>
            <!-- /Title -->
            <!-- Row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="">
                                    <div class="col-lg-3 col-md-4 file-directory pa-0">
                                        <div class="ibox float-e-margins">
                                            <div class="ibox-content">
                                                <div class="file-manager">
                                                    <div class="mt-20 mb-20 ml-15 mr-15">
                                                        <select id="category_id" name="category_id" class="form-control">
                                                            <option value="" disabled>Please select a category</option>
                                                            <option value="1">OTHER</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}" disabled> {{ $category->name }}</option>
                                                                @if($category->subcategories()->count())))
                                                                @foreach($category->subcategories()->get() as $cat)
                                                                    <option value="{{ $cat->id }}"> - {{ $cat->name }}</option>
                                                                @endforeach
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mt-20 mb-20 ml-15 mr-15">
                                                        <div class="fileupload btn btn-success btn-anim btn-block" onclick="addCategory()">
                                                            <i class="fa fa-plus-circle"></i><span class="btn-text">Add Category</span>
                                                            <input type="button" class="upload">
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-8 file-sec pt-20">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div id="vendor_categories_list" class="row">
                                                    @foreach($vendorCategories as $cat)
                                                        <div id="category_id_{{ $cat->id }}" class="col-lg-3 col-md-4 col-sm-6 col-xs-12  file-box">
                                                            <div class="file">
                                                                <a href="#">

                                                                    <div class="icon">
                                                                        <i class="fa fa-2x {{ $cat->icon }}"></i>
                                                                    </div>
                                                                    <div class="file-name">
                                                                        {{ $cat->name }}
                                                                        <br>
                                                                        <span>Added: Jan 11, 2016</span>
                                                                    </div>
                                                                    <div class="mt-20 mb-20 ml-15 mr-15">
                                                                        <div class="fileupload btn btn-success btn-anim btn-block" onclick="removeCategory('{{$cat->id}}')">
                                                                            <i class="fa fa-minus-circle"></i><span class="btn-text">Remove</span>
                                                                            <input type="text" class="upload">
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
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
                    <p>2017 &copy; RyansReferrals</p>
                </div>
            </div>
        </footer>
        <!-- /Footer -->
        <style>
            .file {
                border: 1px solid rgba(33, 33, 33, 0.1);
                border-radius: 2px;
                padding: 0;
                background-color: #fff;
                position: relative;
            }
            .file .icon, .file .image {
                height: 75px;
                overflow: hidden;
                background-size: cover;
                background-position: top;
            }
            .file .icon {
                padding: 15px 10px;
                display: table;
                width: 100%;
                text-align: center;
            }
            .file .icon i {
                color: lightskyblue;
                display: table-cell;
                font-size: 60px;
                vertical-align: middle;
            }
            .file .file-name {
                text-align: center;
                padding: 10px;
                background-color: rgba(33, 33, 33, 0.05);
                border-top: 1px solid rgba(33, 33, 33, 0.05);
            }
            .file .file-name span {
                font-size: 12px;
                color: #878787;
            }
        </style>
    </div>
    <!-- /Main Content -->
@endsection

@section('script')
    <script>
        $(document).ready(function(){

        });

        function addCategory(){
            var id = $('#category_id').val();

            $.ajax({
                url : 'categories/manage',
                type : 'POST',
                data : {id:id},
                beforeSend: function (request) {
                    request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
                },
                success : function(response){
                    addCategoryToList(response);
                    showSuccessNotification('added');
                },
                error : function(xhr){
                    if(xhr.status === 400){
                        showErrorNotification('added')
                    } else {
                        alert('Something went totaly wrong, please contact the webmaster.')
                    }
                }
            });
        }

        function removeCategory(id){

            $.ajax({
                url : 'categories/manage',
                type : 'DELETE',
                data : {id:id},
                beforeSend: function (request) {
                    request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
                },
                success : function(response){
                    removeCategoryFromstList(id);
                    showSuccessNotification('deleted');
                },
                error : function(xhr){
                    if(xhr.status === 400){
                        showErrorNotification('deleted')
                    } else {
                        alert('Something went totaly wrong, please contact the webmaster.')
                    }                }
            });
        }

        function addCategoryToList(category){
            var list = $('#vendor_categories_list');
                list.html(list.html() +
                        '<div id="category_id_' + category.id + '" class="col-lg-3 col-md-4 col-sm-6 col-xs-12  file-box">' +
                    '<div class="file">' +
                    '<a href="#">' +

                    '<div class="icon">' +
                    '<i class="fa fa-2x ' + category.icon + '"></i>' +
                    '</div>' +
                    '<div class="file-name">' +
                    category.name +
                    '<br>' +
                    '<span>Added: Jan 11, 2016</span>' +
                    '</div>' +
                    '<div class="mt-20 mb-20 ml-15 mr-15">' +
                    '<div class="fileupload btn btn-success btn-anim btn-block" onclick="removeCategory(\'' + category.id + '\')">' +
                    '<i class="fa fa-minus-circle"></i><span class="btn-text">Remove</span>' +
                    '<input type="text" class="upload">' +
                    '</div>' +
                    '</div>' +
                    '</a>' +
                    '</div>' +
                    '</div>'
                )
        }

        function removeCategoryFromstList(id){
            $('#category_id_'+id).remove();
        }

        function showSuccessNotification(action){
            $.toast().reset('all');
            $("body").removeAttr('class').addClass("bottom-center-fullwidth");
            $.toast({
                heading: 'SUCCESS',
                text: 'Category was ' + action + '.',
                position: 'bottom-center',
                loaderBg:'#ea6c41',
                bgColor:'#469408',
                hideAfter: 3500
            });
            return false;
        }

        function showErrorNotification(action){
            $.toast().reset('all');
            $("body").removeAttr('class').addClass("bottom-center-fullwidth");
            $.toast({
                heading: 'OOPS',
                text: 'You probably ' + action + ' this category. If this error occurred, please refresh the page.',
                position: 'bottom-center',
                loaderBg:'#469408',
                bgColor:'#ea6c41',
                hideAfter: 3500
            });
            return false;
        }

    </script>
@endsection