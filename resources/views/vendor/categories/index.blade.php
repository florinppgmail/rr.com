@extends('layouts.vendor', [
    'page' => 'Subscribed categories'
])

@section('style')

@endsection

@section('content')
    <div class="ads-info">
        <div class="row">
            <div class="col-sm-8">
                <div class="my-ads section">
                    <h2>Subscribed categories</h2>
                    <!-- ad-item -->
                    <div class="row">
                        <div class="col-md-11 col-sm-10 col-xs-10">
                            <select id="category_id" name="category_id" class="form-control" {{ !$isLocationSet ? 'disabled' : '' }}>
                                <option value="">Please select a category</option>
                                @foreach($categories as $category)
                                    @if($category->subcategories()->count())))
                                    <option value="{{ $category->id }}" disabled> {{ $category->name }}</option>
                                    @foreach($category->subcategories()->get() as $cat)
                                        <option value="{{ $cat->id }}"> - {{ $cat->name }}</option>
                                    @endforeach
                                    @endif
                                @endforeach
                            </select>
                            @if(!$isLocationSet)
                                <span id="message_category_id" class="help-block">In order to subscribe to categories, you need to set your location on your <a
                                            href="{{ route('vendor-settings-profile') }}">Profile</a> page.</span>
                            @endif
                        </div>
                        <div class="col-md-1 col-sm-1 col-xs-1">
                            <a onclick="addCategory()"><i class="fa fa-plus-circle fa-3x"></i></a>
                        </div>
                    </div>
                    <hr>
                    <div class="list-group" id="vendor_categories_list" style="max-height: 300px;overflow-y:scroll;">
                        <a href="#" class="list-group-item disabled">
                            Currently subscribed to :
                        </a>
                        @foreach($vendorCategories as $category)
                            <a href="#" id="category_id_{{ $category->id }}" class="list-group-item">{{$category->name }}
                                <span class="badge">
                                    <i class="fa fa-close" onclick="removeCategory({{ $category->id }})"></i>
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div><!-- my-ads -->

            <!-- recommended-cta-->
            <div class="col-sm-4 text-center">
                <!-- recommended-cta -->
                <div class="recommended-cta">
                    <div class="cta">
                        <!-- single-cta -->
                        <div class="single-cta">
                            <!-- cta-icon -->
                            <div class="cta-icon icon-secure">
                                <img src="{{ asset('website/images/icon/13.png') }}" alt="Icon" class="img-responsive">
                            </div><!-- cta-icon -->

                            <h4>Secure Trading</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div><!-- single-cta -->


                        <!-- single-cta -->
                        <div class="single-cta">
                            <!-- cta-icon -->
                            <div class="cta-icon icon-support">
                                <img src="{{ asset('website/images/icon/14.png') }}" alt="Icon" class="img-responsive">
                            </div><!-- cta-icon -->

                            <h4>24/7 Support</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div><!-- single-cta -->


                        <!-- single-cta -->
                        <div class="single-cta">
                            <!-- cta-icon -->
                            <div class="cta-icon icon-trading">
                                <img src="{{ asset('website/images/icon/15.png') }}" alt="Icon" class="img-responsive">
                            </div><!-- cta-icon -->

                            <h4>Easy Trading</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div><!-- single-cta -->

                        <!-- single-cta -->
                        <div class="single-cta">
                            <h5>Need Help?</h5>
                            <p><span>Give a call on</span><a href="tellto:08048100000"> 08048100000</a></p>
                        </div><!-- single-cta -->
                    </div>
                </div><!-- cta -->
            </div><!-- recommended-cta-->

        </div><!-- row -->
    </div><!-- row -->
@endsection

@section('script')
    <script>
        $(document).ready(function(){

        });

        function addCategory(){
            var id = $('#category_id').val();
            if(id === null || id.length === 0) return;

            $.ajax({
                url : 'categories/manage',
                type : 'POST',
                data : {id:id},
                beforeSend: function (request) {
                    request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
                },
                success : function(response){
                    addCategoryToList(response);
                    //showSuccessNotification('added');
                },
                error : function(xhr){
                    if(xhr.status === 400){
                        //showErrorNotification('added')
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
                    //showSuccessNotification('deleted');
                },
                error : function(xhr){
                    if(xhr.status === 400){
                        //showErrorNotification('deleted')
                    } else {
                        alert('Something went totaly wrong, please contact the webmaster.')
                    }                }
            });
        }

        function addCategoryToList(category){
            var list = $('#vendor_categories_list');
                list.html(list.html() +
                '<a href="#" id="category_id_' + category.id + '" class="list-group-item">' + category.name + '<span class="badge" onclick="removeCategory(\'' + category.id + '\')"><i class="fa fa-close"></i></span></a>')
        }

        function removeCategoryFromstList(id){
            $('#category_id_'+id).remove();
        }

    </script>
@endsection