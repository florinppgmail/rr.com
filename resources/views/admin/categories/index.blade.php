@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('dashboard/vendors/fontawesome-iconpicker-1.3.0/dist/css/fontawesome-iconpicker.css') }}" type="text/css">
@endsection
@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">

            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">Categories list</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('admin') }}">Dashboard</a></li>
                        <li class="active"><span>Categories</span></li>
                    </ol>
                </div>
                <!-- /Breadcrumb -->
            </div>
            <!-- /Title -->
            <div class="row">
                <div class="col-md-12">
                    <i id="showAddCategoryForm" class="fa fa-2x fa-plus-circle pull-right"></i>
                </div>
                <br>
            </div>
            <!-- Row -->
            <div class="row" id="addCategory">
                <div class="col-md-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            {{--<div class="pull-left">
                                <h6 class="panel-title txt-dark">New category form</h6>
                            </div>
                            <div class="clearfix"></div>--}}
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-wrap">
                                            <form name="categoryForm" id="categoryForm" action="#" class="form-horizontal" >
                                                <input type="hidden" name="id" id="id">
                                                <div class="form-body">
                                                    <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-folder mr-10"></i>Category's Info</h6>
                                                    <hr class="light-grey-hr"/>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Category</label>
                                                                <div class="col-md-9">
                                                                    <select id="category_id" name="category_id" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                    </select>
                                                                    <span id="message_category_id" class="help-block"> For a subcategory, chose from above. </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Icon</label>
                                                                <div class="col-md-9">
                                                                    <input id="icon" name="icon" type="text" class="form-control" placeholder="">
                                                                    <span id="message_icon" class="help-block"> Click to select an icon.</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!-- /Row -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Name</label>
                                                                <div class="col-md-9">
                                                                    <input id="name" name="name" type="text" class="form-control" placeholder="Category Name">
                                                                    <span id="message_name" class="help-block"> Up to 50 characters </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Description</label>
                                                                <div class="col-md-9">
                                                                    <input id="description" name="description" type="text" class="form-control" placeholder="Category Description">
                                                                    <span id="message_description" class="help-block"> Up to 255 characters. </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!-- /Row -->
                                                </div>
                                                <div class="form-actions mt-10">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit" id="submitButton" class="btn btn-success  mr-10">Submit</button>
                                                                    <button type="button" id="cancelButton" class="btn btn-default">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"> </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->

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
                                        <table id="datable_vendors" class="table table-hover display  pb-30" >
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Icon</th>
                                                <th>Name</th>
                                                <th>Belongs To</th>
                                                <th>Subcategories</th>
                                                <th>Created On</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Icon</th>
                                                <th>Name</th>
                                                <th>Belongs To</th>
                                                <th>Subcategories</th>
                                                <th>Created On</th>
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
    <script src="{{ asset('dashboard/vendors/fontawesome-iconpicker-1.3.0/dist/js/fontawesome-iconpicker.js') }}"></script>

    <script>
        var vendorsTable, categories, editedCategory = null,
            formFieldsMessage = ['category_id', 'name', 'icon', 'description'];

        $(document).ready(function() {

            vendorsTable = $('#datable_vendors').DataTable({
                ajax: {
                    url: '{{ route('admin-categories-all') }}',
                    type: 'POST',
                    contentType: "application/json",
                    beforeSend: function (request) {
                        request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
                    },
                    dataSrc: function (json) {
                        var return_data = new Array();

                        for(var i=0;i< json.length; i++){
                            return_data.push({
                                'id': json[i].id,
                                'icon' : json[i].icon,
                                'icon_icon' : '<i class="fa ' + json[i].icon + '"></i> ',
                                'name' : json[i].name,
                                'description' : json[i].description,
                                'subcategories' : json[i].subcategories,
                                'root_category_name' : (json[i].root_category !== null && json[i].subcategories > 0) ? json[i].root_category.name : 'N/A',
                                'category_id' : json[i].category_id,
                                'created_at': json[i].created_at
                            })
                        }

                        categories = return_data;
                        setCategoriesDropdown();

                        return return_data;
                    }
                },

                columns: [
                    {'data': 'id', 'width': '5%'},
                    {'data': 'icon_icon'},
                    {'data': 'name'},
                    {'data': 'root_category_name'},
                    {'data': 'subcategories', 'width': '13%'},
                    {'data': 'created_at', 'width': '15%'},
                    {'data': 'actions', 'width': '12%'},
                ],
                "columnDefs": [{
                    "targets": -1,
                    "defaultContent": '<i class="disable-user zmdi zmdi-edit mr-20">'
                }],
                createdRow: function (row, data, dataIndex) {
                    $(row).data('id', data.id);
                },
                "fnDrawCallback": function (oSettings, json) {
                    $('#datable_vendors').find('i.disable-user').on('click', function () {
                        var tr = $(this).parents('tr');
                        editCategory(tr.data('id'));
                    });
                }
            });

            var addCategoryForm = $("#addCategory"), editCategoryForm = $("#editCategory"),
                addCategoryIcon = $("#showAddCategoryForm"), submitButton = $('#submitButton'),
                cancelButton = $('#cancelButton'), categoryForm = $("#categoryForm");

            addCategoryForm.hide();

            addCategoryIcon.click(function(){

                if(addCategoryIcon.hasClass('fa-plus-circle') && !addCategoryForm.is(":visible")){
                    setCategoriesDropdown();
                    addCategoryIcon.removeClass('fa-plus-circle');
                    addCategoryIcon.addClass('fa-minus-circle');
                    addCategoryForm.slideToggle();

                } else {
                    closeForm();
                }
            });

            cancelButton.click(function(){
                categoryForm.trigger('reset');
                addCategoryIcon.removeClass('fa-minus-circle');
                addCategoryIcon.addClass('fa-plus-circle');
                addCategoryForm.slideToggle();
            });

            function setCategoriesDropdown(id){
                var html;

                if(id !== null){
                    html = '<option value="">Chose a category</option>';
                    $.each(categories, function(idx, val){
                        if(val.category_id <= 1){
                            if(id && id === val.id)
                                html += '<option value="' + val.id + '" selected>' + val.name + '</option>';
                            html += '<option value="' + val.id + '">' + val.name + '</option>';
                        }
                    });
                } else if(id === null){
                    html = '<option value="">------ N/A -----</option>'
                }

                $('#category_id').html(html);
            };

            function editCategory(id){
                $.each(categories, function(idx, val){
                    if(val.id == id){
                        editedCategory = val;
                        return false;
                    }
                });

                setCategoriesDropdown(editedCategory.category_id);

                fillCategoryForm(editedCategory);

                if(!addCategoryForm.is(":visible")){
                    addCategoryForm.slideToggle();
                }
            }

            function fillCategoryForm(cat){
                $('#id').val(cat.id);
                $('#name').val(cat.name);
                $('#description').val(cat.description);
                $('#icon').val(cat.icon);
            }

            submitButton.click(function(e){
                e.preventDefault();

                if($('#id').val() !== ''){
                    updateCategory()
                } else {
                    createCategory();
                }
            });

            function createCategory(){
                $.ajax({
                    url : '/admin/categories',
                    type : 'POST',
                    data : getFormData(),
                    beforeSend: function (request) {
                        request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
                    },
                    success : function(response){
                        closeForm();
                        refreshTable();
                    },
                    error : function(xhr){
                        if(xhr.status === 422){
                            setErrors(xhr.responseJSON);
                        } else {
                            alert('Something went totaly wrong, please contact the webmaster.')
                        }
                    }
                })
            }

            function updateCategory(){
                $.ajax({
                    url : '/admin/categories/' + editedCategory.id,
                    type : 'POST',
                    data : getFormData(),
                    beforeSend: function (request) {
                        request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
                    },
                    success : function(response){
                        closeForm();
                        refreshTable()
                    },
                    error : function(xhr){
                        if(xhr.status === 422){
                            setErrors(xhr.responseJSON);
                        } else {
                            alert('Something went totaly wrong, please contact the webmaster.')
                        }
                    }
                })
            }

            function getFormData(){
                var data = {}, id = $('#id').val(), category_id = $('#category_id').val();

                if(id !== '') data['id'] = id;
                if(category_id !== '') data['category_id'] = $('#category_id').val();
                data['name'] = $('#name').val();
                data['description'] = $('#description').val();
                data['icon'] = $('#icon').val();


                return data;
            }

            function setErrors(errors)
            {
                $.each(formFieldsMessage, function(idx,val){
                    if(errors[val]){
                        $('#message_'+val).html(errors[val]);
                    } else if(errors[val] === undefined){
                        $('#message_'+val).html('<i class="zmdi zmdi-check">OK</i>');
                    }
                });
            }

            function closeForm()
            {
                $('#id').val('');
                editedCategory = null;
                categoryForm.trigger('reset');

                addCategoryIcon.removeClass('fa-minus-circle');
                addCategoryIcon.addClass('fa-plus-circle');
                addCategoryForm.slideToggle();
            }

            function refreshTable()
            {
                //vendorsTable.clear().draw();
                vendorsTable.ajax.reload();
            }

            $('#icon').iconpicker();
        });
    </script>
@endsection
