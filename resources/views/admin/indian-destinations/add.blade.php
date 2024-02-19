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
                    <h1>Add Destination</h1>
                    <ul>
                        <li><a href="/">Dashboard</a></li>
                        <li>Add Destination</li>
                    </ul>
                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">

                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">

                                <form method="POST" enctype="multipart/form-data" action="{{ route('create-indiandestination') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="title">Destination Name</label>
                                            <input name="destinationName" id="destinationName" class="form-control"
                                                type="text" required />
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="title">Destination  </label>
                                            <select name="destination" class="form-control" required="true">
                                                {{-- <option>None</option> --}}
                                                @foreach ($indianDestinationResponse as $response)
                                                    <option value="{{ $response->destination_id }}">
                                                        {{ $response->destination_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="short_description">Starting Price</label>
                                            <input name="destinationPrice" class="form-control" type="text"
                                                required />
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="form-label">Card Image</label>
                                            <input type="file" name="destionationCard" accept="image/*,video/*"
                                                class="form-control" required />
                                        </div>
                                        {{-- <div class="form-group col-sm-12">
                                            <label for="text">Seo Description</label>
                                            <textarea id="overview" name="seoDescr" class="form-control" required></textarea>
                                        </div> --}}

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

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
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
        CKEDITOR.replace('overview');

    </script>
</body>

</html>
