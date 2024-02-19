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
					<h1>Dashboard</h1>

				</div>

				<div class="separator-breadcrumb border-top"></div>

				<div class="row">
					<!-- ICON BG -->
					<!-- <div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
							<div class="card-body text-center">
								<i class="i-Notepad-2"></i>
								<div class="content">
									<p class="text-muted mt-2 mb-0">New Bookings</p>
									<p class="text-primary text-24 line-height-1 mb-2">205</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
							<div class="card-body text-center">
								<i class="i-Add-User"></i>
								<div class="content">
									<p class="text-muted mt-2 mb-0">Users</p>
									<p class="text-primary text-24 line-height-1 mb-2">4021</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
							<div class="card-body text-center">
								<i class="i-Checkout-Basket"></i>
								<div class="content">
									<p class="text-muted mt-2 mb-0">Total Tours</p>
									<p class="text-primary text-24 line-height-1 mb-2">80</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
							<div class="card-body text-center">
								<i class="i-Money-2"></i>
								<div class="content">
									<p class="text-muted mt-2 mb-0">Earnings</p>
									<p class="text-primary text-24 line-height-1 mb-2">$1200</p>
								</div>
							</div>
						</div>
					</div> -->

				</div>

    <div class="row mb-4">

                    <!-- <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h3>Bookings</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="bookings"></canvas>
                            </div>
                            <div class="card-footer">
                                Bookings done in the last working week
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h3>Accquired Customers</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="customers"></canvas>
                            </div>
                            <div class="card-footer">
                                Number of customers registred on the site
                            </div>
                        </div>
                    </div> -->
                </div>
				<div class="row">


					<div class="col-md-12 mb-3">
                    <div class="card text-left">

                        <div class="card-body">
                            <h4 class="card-title mb-3"> Recent Enquiries</h4>
                            <div class="table-responsive">
                               <table class="table table-striped table-hover" id="myTable">
                                    <thead class="thead-dark">

                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Contact Details</th>
                                            <th scope="col">Travel Date</th>
                                            <th scope="col">Duration</th>

                                            <th scope="col">Description</th>
                                            <th scope="col">No Of Person</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($homePageBannerResponse as $response)
                                        <tr>
                                            <th scope="row">{{$response->id}}</th>
                                            <td>{{$response->name}}<br>
                                            Phone:<a href="tel:{{$response->phone}}">{{$response->phone}}</a><br>
                                            Email:<a href="tel:{{$response->email}}">{{$response->email}}</a><br>
                                            Country:{{$response->country}}</a>
                                            </td>
                                            <td>{{$response->tdate}}</td>
                                            <td>{{$response->stay}}</td>
											<td><code>{{$response->detail}}</code></td>
											<td>{{$response->person}}</td>
                                            <td class="text-center">
                                                <label class="switch switch-success mr-3">
                                                    <span>Active</span>
                                                    <input type="checkbox" id="statusCheckbox" {{($response->status)?'checked':''}} onChange='statusChanged({{$response->id}},{{$response->status}})'>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <td class="text-center">

                                                <a href="{{route('delete-enquiry',['id'=>$response->id])}}" class="text-primary mr-2">
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

    @include('includes.footer');

                
<script>
    function statusChanged(id,status) {
        // const checkBox = document.getElementById("statusCheckbox").value;
        // console.log(checkBox);
        $.ajax({
            url: `api/updateenquiry/${id}`,
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
 $(document).ready(function() {
            $('#myTable').DataTable();
        });
</script>

</body>
</html>
