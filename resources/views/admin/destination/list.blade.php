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
                    <h1 class="">Destination List </h1>
                    <a href="destination-add" class="ml-3 btn btn-primary">Add Destination</a>
                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">

                    <div class="col-md-12 mb-3">
                        <div class="card text-left">

                            <div class="card-body">
                                <h4 class="card-title mb-3"> Destination</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="myTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="text-center">#ID</th>
                                                <th>Destination Name</th>
                                                <th>Destination Link</th>
                                                <th>Destination Type</th>
                                                 <th>Destination Card</th>
                                                <th>Destination Starting Price</th>
                                                  <th width="20%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($destinationResponse as $response)
                                                <tr>
                                                    <td class="text-right">#{{ $response->destination_id }}</td>
                                                    <td>{{ $response->destination_name }}</td>
                                                      <td>{{ $response->destination_slug }}</td>
                                                    <td>{{ $response->destination_type->destionation_type_name }}</td>
                                                     <td>
                                                        <img class="img-thumbnail" style="width:200px;"
                                                            src="{{ Storage::url($response->destination_card_image) }}" />
                                                        {{-- <img class="img-thumbnail" style="width:200px;"
                                                            src="{{ config('app.url')$response->destination_card_image }}" /> --}}
                                                    </td>
                                                    <td>{{ $response->destination_starting_price }}</td>

                                                    <td class="text-center">
                                                        <a class="text-primary mr-2"
                                                            href="{{ route('edit-destination', ['id' => $response->destination_id]) }}">
                                                            <span class="btn btn-sm btn-primary">
                                                                <i class="nav-icon i-Pen-3"></i> Edit
                                                            </span>
                                                        </a>
                                                        <a href="{{ route('delete-destination', ['id' => $response->destination_id]) }}"
                                                            class="text-primary mr-2">
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

                                {{-- <div class="card-footer text-center">
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
                                </div> --}}
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
        function statusChanged(id, status) {
            // const checkBox = document.getElementById("statusCheckbox").value;
            // console.log(checkBox);
            $.ajax({
                url: `api/destination/${id}`,
                type: 'PATCH',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                data: JSON.stringify({
                    status: !status
                }),
                success: data => {
                    toastr.success("updated");
                },
                error: {
                    function(jqXHR, textStatus, errorThrown) {
                        console.log(error);
                        document.getElementById('statusCheckbox').checked = !checkBox;
                    },
                }
            })
        }

        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>



</body>

</html>
