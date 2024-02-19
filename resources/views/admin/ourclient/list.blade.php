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
                    <h1>Our Client List</h1>
                    <a href="add-our-client" class="ml-3 btn btn-primary">Add Our Client</a>
                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">


                    <div class="col-md-12 mb-3">
                        <div class="card text-left">

                            <div class="card-body">
                                <h4 class="card-title mb-3"> Our Client</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="text-center">#ID</th>
                                                <th>Image</th>
                                                <th class="text-center">Status</th>
                                                <th width="20%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $ourClientResponse as $response )
                                            <tr>
                                                <td class="text-right">#{{$response->id}}</td>
                                                <td>
                                                    <img class="img-thumbnail" style="width:200px;"
                                                        src="{{ Storage::url( $response->our_client_image) }}" />
                                                </td>

                                                <td class="text-center">
                                                    <label class="switch switch-success mr-3">
                                                        <span>Active</span>
                                                        <input type="checkbox" id="statusCheckbox" {{($response->status)?'checked':''}} onChange='statusChanged({{$response->destination_id}},{{$response->status}})'>
                                                        <span class="slider"></span>
                                                    </label>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-primary mr-2" href="/pages-edit">
                                                        <span class="btn btn-sm btn-primary">
                                                            <i class="nav-icon i-Pen-3"></i> Edit
                                                        </span>
                                                    </a>
                                                    <a href="{{route('delete-client',['id'=>$response->id])}}" class="text-primary mr-2">
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

                                <div class="card-footer text-center">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
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
