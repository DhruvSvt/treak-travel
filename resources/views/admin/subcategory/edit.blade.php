<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')

</head>


<body class="text-left">

    <!-- ============ Compact Layout start ============= -->
    <!-- ============Deafult  Large SIdebar Layout start ============= -->


    <div class="app-admin-wrap layout-sidebar-large clearfix">

        <!--=============== Left side End ================-->
        @include('includes.header')
        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Edit Tour Subcategory</h1>
                    <ul>
                        <li><a href="/">Dashboard</a></li>
                        <li>Edit Tour Subcategory</li>
                    </ul>
                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">


                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <form method="POST"
                                    action="{{ route('update-subcategory', ['id' => $tourSubCategory->tour_subcategories_id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="title">Title</label>
                                            <input name="tour_subcategory_name"
                                                value='{{ $tourSubCategory->tour_subcategory_name }}'
                                                class="form-control" type="text" required />
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="title">Category </label>
                                            <select name="tour_categories_id" class="form-control" required="true">
                                                {{-- <option>None</option> --}}
                                                @foreach ($tourCategory as $response)
                                                    <option value="{{ $response->id }}"
                                                        {{ $response->id == $tourSubCategory->tour_categories_id ? 'selected' : null }}>
                                                        {{ $response->tour_category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
<div class="form-group col-sm-6">
    <label for="title">Page URL</label>
    <input name="slug" id="slug" value="{{ $tourSubCategory->slug }}" class="form-control" type="text" required />
</div>
<div class="form-group col-sm-6">
    <label class="form-label">Banner</label>
    <input type="file" name="bannerimage" accept="image/*" class="form-control"  />
</div>
<div class="form-group col-sm-12">
    <label for="short_description">SEO Description</label>
    <textarea name="seo_description" class="form-control" required>{{ $tourSubCategory->seo_description }}</textarea>
</div>
                                       

                                        <div class="form-group col-sm-12 text-right">
                                            <a href="{{ url()->previous() }}" class="btn btn-default">
                                                Cancel
                                            </a>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>


            </div>

        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

    @include('includes.footer')

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
</body>

</html>
