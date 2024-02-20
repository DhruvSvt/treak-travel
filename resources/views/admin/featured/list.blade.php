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
                    <h1 class="">Top Destinations List </h1>
                    <a href="{{url('admin/add-homepage-featured-destination')}}" class="ml-3 btn btn-primary">Add Top Destinations</a>
                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">


                    <div class="col-md-12 mb-3">
                        <div class="card text-left">

                            <div class="card-body">
                                <h4 class="card-title mb-3">Top Destinations</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="text-center">#ID</th>
                                                <th>Title</th>
                                                <th>Card Image</th>
                                                <th>Destinations</th>

                                                <th width="20%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($featuredDestinationResponse as $response)


                                            <tr>
                                                <td class="text-right">#{{$response->featured_destination_id}}</td>
                                                <td>{{$response->featured_destination_name}}</td>
                                                <td>
                                                    <img class="img-thumbnail" style="width:100px;"
                                                        src="{{ Storage::url( $response->featured_destination_image) }}" />
                                                </td>
                                                <td>{{$response->destinations->destination_name}}</td>

                                                <td class="text-center">
                                                    <a class="text-primary mr-2" href="{{url('admin/edit-homepage-featured-destination/'.$response->featured_destination_id)}}">
                                                        <span class="btn btn-sm btn-primary">
                                                            <i class="nav-icon i-Pen-3"></i> Edit
                                                        </span>
                                                    </a>
                                                    <a href="{{route('delete-featureddestination',['id'=>$response->featured_destination_id])}}" class="text-primary mr-2">
                                                        <span class="btn btn-sm btn-danger">
                                                            <i class="nav-icon i-Close-Window"></i> Delete
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>


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



</body>

</html>
