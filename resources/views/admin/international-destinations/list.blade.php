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
                    <h1 class="">Weekend Destinations </h1>
                    <a href="add-best-international-destination" class="ml-3 btn btn-primary">Add Weekend Destinations</a>
                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">


                    <div class="col-md-12 mb-3">
                        <div class="card text-left">

                            <div class="card-body">
                                <h4 class="card-title mb-3"> Weekend Destinations</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="text-center">#ID</th>
                                                <th>Destination Name</th>
                                                {{-- <th>Destination SEO Description</th> --}}
                                                <th>Destination</th>
                                                <th>Destination Card</th>
                                                <th>Destination Starting Price</th>
                                                
                                                <th width="20%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($featuredDestinationResponse as $response)
                                            <tr>
                                                <td class="text-right">#{{$response->destination_id }}</td>
                                                <td>{{$response->international_destination_name }}</td>
                                                {{-- <td><div style="display:block;
                                                    overflow: hidden;
                                                    text-overflow: ellipsis;
                                                    white-space: break-spaces;
                                                    max-width: 100px;
                                                    max-inline-size: inherit;
                                                    word-wrap: break-word;
                                                    max-height: 7.6em;
                                                    line-height: 1.6em;">{{$response->seo_descr }}</div></td> --}}
                                                <td>{{$response->destinations->destination_name }}</td>
                                                <td>
                                                    <img class="img-thumbnail" style="width:200px;"
                                                        src="{{ Storage::url( $response->international_destination_image) }}" />
                                                </td>
                                                <td>{{$response->international_price }}</td>

 
                                                <td class="text-center">
                                                    
                                                    <a href="{{route('delete-destination',['id'=>$response->destination_id])}}" class="text-primary mr-2">
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
    <script>
        function statusChanged(id,status) {
            // const checkBox = document.getElementById("statusCheckbox").value;
            // console.log(checkBox);
            $.ajax({
                url: `api/destination/${id}`,
                type:'PATCH',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                    'Accept' : 'application/json',
                    'Content-Type' : 'application/json'
                },
                data:JSON.stringify({status:!status}),
                success: data =>{
                    toastr.success("updated");
                },
                error:{
                    function(jqXHR, textStatus, errorThrown) {
                        console.log(error);
                        document.getElementById('statusCheckbox').checked = !checkBox;
            },
                }
            })
}
    </script>



</body>

</html>
