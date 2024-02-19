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
                    <h1 class="">Tours List </h1>
                    <a href="tours-add" class="ml-3 btn btn-primary">Add Tours</a>

                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">


                    <div class="col-md-12 mb-3">
                        <div class="card text-left">

                            <div class="card-body">
                                <h4 class="card-title mb-3"> Tours</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="myTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="text-center">#ID</th>
                                                <th>Tour Package Name</th>
                                                <th>Tour Package Price</th>
                                                <th>Tour Package Duration</th>
                                                <th>Tour Package Banner Image</th>
                                                
                                                <th>Tour Package Destinations</th>
                                                <th class="text-center">Status</th>
                                                <th width="20%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tourResponse as $response)
                                                <tr>
                                                    <td class="text-right">#{{ $response->tours_id }}</td>
                                                    <td>{{ $response->tours_name }}</td>
                                                    <td>{{ $response->tours_price }}</td>
                                                    <td>{{ $response->tours_duration }}</td>
                                                    <td>
                                                        <img class="img-thumbnail" style="width:200px;"
                                                            src="{{ Storage::url($response->tours_banner) }}" />
                                                    </td> 
                                                    <td>
                                                        @foreach ($response->destinations as $responseDestination)
                                                            {{ $responseDestination->destination_name }},
                                                        @endforeach
                                                    </td>
                                                    
                                                    <td class="text-center">
                                                        <label class="switch switch-success mr-3">
                                                            <span>Active</span>
                                                            <input type="checkbox" id="statusCheckbox"
                                                                {{ $response->status ? 'checked' : '' }}
                                                                onChange='statusChanged({{ $response->tours_id }},{{ $response->status }})'>
                                                            <span class="slider"></span>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class=" mr-2"
                                                            href="{{ route('view-tour-edit', ['id' => $response->tours_id]) }}">
                                                            <span class="btn btn-sm btn-success">
                                                                <i class="nav-icon i-Pen-3"></i> Edit
                                                            </span>
                                                        </a>
                                                        <a href="{{ route('delete-tour', ['id' => $response->tours_id]) }}"
                                                            class="text-primary mr-2">
                                                            <span class="btn btn-sm btn-danger">
                                                                <i class="nav-icon i-Close-Window"></i> Delete
                                                            </span>
                                                        </a>
                                                      <a target="_blank" href="tour/{{ $response->tours_url }}"
                                                            class="  mr-2">
                                                            <span class="btn btn-sm btn-warning">
                                                                <i class="nav-icon i-view"></i> View On Website
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

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

<script>
    function statusChanged(id, status) {
        // const checkBox = document.getElementById("statusCheckbox").value;
       
        $.ajax({
            url: `{{url('api/tour')}}/${id}`,
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
</script>

</body>

</html>
