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
                    <h1 class="">Tour Subcategory List </h1>
                    <a href="subcategory-add" class="ml-3 btn btn-primary">Add Tour Subcategory</a>
                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">


                    <div class="col-md-12 mb-3">
                        <div class="card text-left">

                            <div class="card-body">
                                <h4 class="card-title mb-3"> Tour SubCategory</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="text-center">#ID</th>
                                                <th>Tour subcategory name</th>
                                                <th>Tour category name</th>
                                                <th class="text-center">Status</th>
                                                <th width="20%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tourSubCategory as $response)
                                            {{-- {{"print".$response}} --}}
                                            {{-- {{ $response->status }} --}}
                                            <tr>
                                                <td class="text-right">#{{$response->tour_subcategories_id}}</td>
                                                <td>{{$response->tour_subcategory_name}}</td>
                                                <td>{{ $response->tour_category ?
                                                    $response->tour_category->tour_category_name : '-'}}</td>

                                                {{-- <td class="text-center">
                                                    <label class="switch switch-success mr-3">
                                                        <span>Active</span>
                                                        <input type="checkbox" id="statusCheckbox"
                                                            {{($response->status)?'checked':''}}
                                                        onChange='statusChanged({{$response->tour_subcategories_id}},{{$response->status}})'>
                                                        <span class="slider"></span>
                                                    </label>
                                                </td> --}}
                                                <td class="text-center">
                                                    <label class="switch switch-success mr-3">
                                                        <span>Active</span>
                                                        <input type="checkbox"
                                                            id="statusCheckbox{{ $response->tour_subcategories_id }}" {{
                                                            $response->status ? 'checked' : '' }}
                                                        onchange="statusChanged({{ $response->tour_subcategories_id
                                                        }})">
                                                        <span class="slider"></span>
                                                    </label>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-primary mr-2"
                                                        href="{{route('edit-subcategory',['id'=>$response->tour_subcategories_id])}}">
                                                        <span class="btn btn-sm btn-primary">
                                                            <i class="nav-icon i-Pen-3"></i> Edit
                                                        </span>
                                                    </a>
                                                    <a href="{{route('delete-subcategory',['id'=>$response->tour_subcategories_id])}}"
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
    {{-- <script>
        function statusChanged(id,status) {
            // const checkBox = document.getElementById("statusCheckbox").value;
            // console.log(checkBox);
            $.ajax({
                url: `api/updateSubCategory/${id}`,
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
    </script> --}}

    <script>
        function statusChanged(id) {
            const checkBox = document.getElementById("statusCheckbox" + id);
            // console.log(checkBox.checked);
            $.ajax({
                url: `updateSubCategory/${id}`,
                type: 'POST',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                data: JSON.stringify({ status: checkBox.checked }),
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
