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
                    <h1>Add Cruise</h1>
                    <ul>
                        <li><a href="/">Dashboard</a></li>
                        <li>Add Cruise</li>
                    </ul>
                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">


                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">

                                <form method="POST" enctype="multipart/form-data"
                                    action="{{ route('create-cruise') }}">
                                    @csrf
                                    <div class="row">

                                        <div class="form-group col-sm-6">
                                            <label for="title">Cruise title</label>
                                            <input name="cruiseTitle" id="cruiseTitle" class="form-control"
                                                type="text" required />
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="short_description">Price (per person)</label>
                                            <input name="cruisePrice" class="form-control" type="text" required />
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="short_description">days/night</label>
                                            <input name="dayNight" class="form-control" type="text" required />
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class="form-label">Image</label>
                                            <input type="file" name="cruiseImage" accept="image/*,video/*"
                                                class="form-control" required />
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class="form-label">document</label>
                                            <input type="file" name="documentUrl" accept="pdf/*" class="form-control"
                                                required />
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
        $(document).ready(function() {
                    $('.select2').select2();
                }

                $("#destinationName").on('change', function() {
                    var slug = $(this).val();
                    let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                    //remove multiple space to single
                    finalSlug = slug.replace(/  +/g, ' ');
                    // remove all white spaces single or multiple spaces
                    finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                    $('#slug').val(finalSlug);
                });
    </script>
    <script>
        CKEDITOR.replace('editor');
    </script>
</body>

</html>
