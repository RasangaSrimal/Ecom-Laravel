@extends('layouts.admin_layouts.admin_layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
	@if ($errors->any())
		<div class="alert alert-danger" style="margin-top: 10px">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form name="categoryForm" id="categoryForm" @if(empty($categoryData['id'])) action="{{ url('admin/add-edit-category/') }}" @else action="{{ url('admin/add-edit-category/'.$categoryData->id) }}" @endif method="post" enctype="multipart/form-data">
	@csrf
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
		  <label for="category_name">Category Name</label>
		  <input type="text" class="form-control" name="category_name" id="category_name" value="{{ $categoryData['category_name'] ?? "" }}" placeholder="Enter Category Name">
                </div>
		<div id="appendCategoriesLevel">
		  @include('admin.categories.append_categories_level')
		</div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Select Section</label>
                  <select name="section_id" id="section_id"  class="form-control select2" style="width: 100%;">
		    <option value="">Select</option>
			@foreach($getSection as $section)
			<option value="{{ $section->id }}" @if(!empty($categoryData['section_id']) && $categoryData['section_id'] == $section['id']) selected @endif>{{ $section->name }}</option>
			@endforeach
                  </select>
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Category Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="category_image" name="category_image" accept="image/*">
                        <label class="custom-file-label" for="category_image">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
		  <label for="category_discount">Category Discount</label>
		  <input type="text" class="form-control" id="category_discount" name="category_discount" placeholder="Enter Category Discount" value="{{ $categoryData['category_discount'] ?? "" }}">
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="form-group">
		  <label for="category_url">Category URL</label>
		  <input type="text" class="form-control" id="url" name="url" placeholder="Enter Category Discount" value="{{ $categoryData['url'] ?? "" }}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
		  <label for="description">Category Description</label>
		  <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter ...">{{ $categoryData['description'] ?? "" }}</textarea>
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="form-group">
		  <label for="meta_title">Meta Title</label>
		  <textarea class="form-control" name="meta_title" id="meta_title" rows="3" placeholder="Enter ...">{{ $categoryData['meta_title'] ?? "" }}</textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
		  <label for="meta_description">Meta Description</label>
		  <textarea class="form-control" name="meta_description" id="meta_description" rows="3" placeholder="Enter ..." >{{ $categoryData['meta_description'] ?? "" }}</textarea>
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="form-group">
		  <label for="meta_keywords">Meta Keywords</label>
		  <textarea class="form-control" name="meta_keywords" id="meta_keywords" rows="3" placeholder="Enter ...">{{ $categoryData['meta_keywords'] ?? "" }}</textarea>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
	    <button type="submit" class="btn btn-primary">Submit</button>	
          </div>
        </div>
	</form>
      </div><!-- /.container-fluid -->
    </section>
  </div>
@endsection
