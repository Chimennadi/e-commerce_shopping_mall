@extends("admin.layout.layout")

@section("content")
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Categories</h3>
                        <!-- <h6 class="font-weight-normal mb-0">Update Admin Password</h6> -->
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $title }}</h4>
                        <!-- client side validation -->
                        <!-- error Message -->
                        @if(Session::has("error_message"))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error: </strong> {{ Session::get("error_message")}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <!-- Success Message -->
                        @if(Session::has("success_message"))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success: </strong> {{ Session::get("success_message")}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <!-- end client side validation -->
                        <!-- server side validation -->
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <!-- end server side validation -->
                        <form class="forms-sample" @if(empty($category['id'])) action="{{ url('admin/add-edit-category') }}" @else action="{{ url('admin/add-edit-category/'.$category['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" id="category_name" placeholder="Enter Category Name" name="category_name"  @if(!empty($category['category_name'])) value="{{ $category['category_name']}}" @else value="{{ old('category_name') }}" @endif required="">
                            </div>
                            <div class="form-group">
                                <label for="section_id">Select Section</label>
                                <select name="section_id" id="section_id" class="form-control" style="color: #161515;">
                                    <option value="">Select</option>
                                    @foreach($getSections as $section)
                                    <option value="{{ $section['id'] }}" @if(!empty($category['section_id']) && $category['section_id'] == $section['id']) selected="" @endif>{{ $section['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="appendCategoriesLevel">
                                @include("admin.categories.append_categories_level")
                            </div>
                            <div class="form-group">
                                <label for="admin_image">Category Image</label>
                                <input type="file" class="form-control" id="category_image" name="category_image">
                                @if(!empty($category["category_image"]))
                                    <a target="_blank" href="{{ url('front/images/category_images/'.$category["category_image"]) }}">View Image</a>&nbsp; | &nbsp;
                                    <a class="confirmDelete" href="javascript:void(0)" module="category-image" moduleid="{{ $category['id']}}">Delete Image</a>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="category_discount">Category Discount</label>
                                <input type="text" class="form-control" id="category_discount" placeholder="Enter Category Discount" name="category_discount"  @if(!empty($category['category_discount'])) value="{{ $category['category_discount']}}" @else value="{{ old('category_discount') }}" @endif >
                            </div>
                            <div class="form-group">
                                <label for="category_description">Category Description</label>
                                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="url">Category URL</label>
                                <input type="text" class="form-control" id="url" placeholder="Enter Category URL" name="url"  @if(!empty($category['url'])) value="{{ $category['url']}}" @else value="{{ old('url') }}" @endif required="">
                            </div>
                            <div class="form-group">
                                <label for="meta_title">Enter Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" placeholder="Enter Meta Title" name="meta_title"  @if(!empty($category['meta_title'])) value="{{ $category['meta_title']}}" @else value="{{ old('meta_title') }}" @endif>
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <input type="text" class="form-control" id="meta_description" placeholder="Enter Meta Description" name="meta_description"  @if(!empty($category['meta_description'])) value="{{ $category['meta_description']}}" @else value="{{ old('meta_description') }}" @endif>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords</label>
                                <input type="text" class="form-control" id="meta_keywords" placeholder="Enter Meta Keywords" name="meta_keywords"  @if(!empty($category['meta_keywords'])) value="{{ $category['meta_keywords']}}" @else value="{{ old('meta_keywords') }}" @endif>
                            </div>
                            <div class="form-group" style="margin-top: 20px">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn btn-light">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include("admin.layout.footer")
    <!-- partial -->
</div>
@stop