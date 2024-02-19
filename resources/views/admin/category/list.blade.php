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
                    <h1 class="">Tour Category List </h1>
                    <a href="category-add" class="ml-3 btn btn-primary">Add Category</a>
                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">


                    <div class="col-md-12 mb-3">
                        <div class="card text-left">

                            <div class="card-body">
                                <h4 class="card-title mb-3"> Tour Category</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="text-center">#ID</th>
                                                <th>Tour category name</th>
                                                <th class="text-center">Status</th>
                                                <th width="20%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tourCategory as $response )
                                            <tr>
                                                <td class="text-right">#{{$response->id}}</td>
                                                <td>{{$response->tour_category_name}}</td>

                                                <td class="text-center">
                                                    <label class="switch switch-success mr-3">
                                                        <span>Active</span>
                                                        <input type="checkbox" id="statusCheckbox{{ $response->id }}" {{
                                                            $response->showinheader ? 'checked' : '' }}
                                                        onchange="statusChanged({{ $response->id }})">
                                                        <span class="slider"></span>
                                                    </label>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-primary mr-2"
                                                        href="{{route('edit-category',['id'=>$response->id])}}">
                                                        <span class="btn btn-sm btn-primary">
                                                            <i class="nav-icon i-Pen-3"></i> Edit
                                                        </span>
                                                    </a>
                                                    <a href="{{route('delete-category',['id'=>$response->id])}}"
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
        function statusChanged(id) {
        const checkBox = document.getElementById("statusCheckbox" + id);
        // console.log(checkBox.checked);
        $.ajax({
            url: `updateCategory/${id}`,
            type: 'POST',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            data: JSON.stringify({ showinheader: checkBox.checked }),
            success: function(data) {
                toastr.success("updated");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
                checkBox.checked = !checkBox.checked;
            }
        });
    }
    </script>
</body>

</html>
