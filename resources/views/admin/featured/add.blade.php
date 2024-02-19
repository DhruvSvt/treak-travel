<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                    <h1>Add Top Destinations</h1>
                    <ul>
                        <li><a href="/">Dashboard</a></li>
                        <li>Add Top Destinations</li>
                    </ul>
                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">


                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">



                                <form method="POST" enctype="multipart/form-data" action="{{ route('create-featuredestination') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="title">Feature Destination Name</label>
                                            <input name="featureDestinationName" class="form-control" type="text"
                                                required />
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="title">Select Destinations</label>
                                            <select class="form-control select2" required name="destination">
                                                @foreach ($destinationResponse as $response)
                                                    <option value="{{ $response->destination_id }}">
                                                        {{ $response->destination_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class="form-label">Featured Card Image</label>
                                            <input type="file" name="featureDestinationCardImage" accept="image/*"
                                                class="form-control" required />
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


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</body>

</html>
