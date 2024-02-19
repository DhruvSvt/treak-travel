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
                <h1>Add Promotional Banner</h1>
                <ul>
                    <li><a href="/">Dashboard</a></li>
                    <li>Add Promotional Banner</li>
                </ul>
            </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">


                  <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('create-promotionalbanner') }}">
                                @csrf
                                <div class="row">
                                                 <div class="form-group col-sm-6">
                                                    <label for="title">Page URL</label>
                                                    <input name="bannerSlug" class="form-control" type="text" required />
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">Banner</label>
                                                    <input type="file" name="homePageBanner" accept="image/*,video/*"
                                                        class="form-control" required />
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="title">Banner Position</label>
                                                    <input name="bannerPosition" class="form-control" type="text" required />
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
                        CKEDITOR.replace( 'editor' );
                </script>
</body>
</html>
