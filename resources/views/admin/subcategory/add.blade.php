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
                    <h1>Add Tour Subcategory</h1>
                    <ul>
                        <li><a href="/">Dashboard</a></li>
                        <li>Add Tour Subcategory</li>
                    </ul>
                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">


                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">

                                <form method="POST" enctype="multipart/form-data" action="{{ route('create-subcategory') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="title">Title</label>
                                            <input name="name" class="form-control" id="destinationName" type="text" required />
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="title">Category </label>
                                            <select name="categoryId" class="form-control" required="true">
                                                {{-- <option>None</option> --}}
                                                @foreach ($tourCategory as $response)
                                                    <option value="{{ $response->id }}">
                                                        {{ $response->tour_category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
<div class="form-group col-sm-6">
    <label for="title">Page URL</label>
    <input name="slug"   id="slug" class="form-control"
        type="text" required />
</div>
<div class="form-group col-sm-6">
    <label class="form-label">Banner</label>
    <input type="file" name="bannerimage" accept="image/*" class="form-control" required />
</div>
                                        <div class="form-group col-sm-12">
                                            <label for="short_description">SEO Description</label>
                                            <textarea name="seo_description" class="form-control" type="text" required /></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 text-right">
                                            <a href="" class="btn btn-default">
                                                Cancel
                                            </a>
                                            <button type="submit" class="btn btn-primary">Add</button>
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
    <script>
        $("#destinationName").on('change', function () {
            var slug = $(this).val();
            let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
            //remove multiple space to single
            finalSlug = slug.replace(/  +/g, ' ');
            // remove all white spaces single or multiple spaces
            finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
            $('#slug').val(finalSlug);
        });
    </script>
</body>

</html>
