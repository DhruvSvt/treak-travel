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
                    <h1>New Bookings</h1>
                     
                </div>

                <div class="separator-breadcrumb border-top"></div>
              

                <div class="row">
                 

                    <div class="col-md-12 mb-3">
                    <div class="card text-left">

                        <div class="card-body">
                            <h4 class="card-title mb-3"> Tour Bookings</h4>
                              <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th># ID</th>
                                                <th>Tour</th>
                                                <th>Details</th>
                                                <th>Customer</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Payments</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                                <tr>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="booking_id[]" value="20">
                                                            #0020                                                        </td>
                                                     <td>
                                                            <p><b>Tour :</b> Experience Taj Mahal and Agra on a Private Tour by Express Train<br><b>Option :</b> All Inclusive Tour</p></td>
                                                        <td>
                                                            <p><b>Booked On:</b> 26-04-2023                                                            <small>
                                                                03:38 PM                                                            </small>
                                                            <br><b>Travel On :</b> 26-04-2023                                                            <small>
                                                                12:00 AM                                                            </small><br />
                                                            <b>Packs:</b> 
                                                            1 Adult,
                                                            0 Child,
                                                            0 Infant
                                                            </p>
                                                        </td>
                                                        <td><p><b>Name:</b> John Doe<br>
                                                        <b>Phone:</b> 123456789<br>
                                                        <b>Email:</b> John@gmail.com<br></p>
                                                          </td>
                                                        <td>
                                                            19 Amira Ln<br>
                                                            New Jersey<br>
                                                          
                                                            United States                                                        </td>
                                                        <td class="text-center">
                                                            <p class="badge badge-success">
                                                                Confirmed                                                            </p>
                                                        </td>
                                                        <td class="text-right">
                                                            <p class="badge badge-danger">
                                                                Full Pay                                                            </p>
                                                            
                                                            <br />
                                                            <p><b>Cost:</b> USD 1.00<br>
                                                        <b>Paid:</b> USD 1.00<br>
                                                        <b>Paid on:</b> 26-04-2023                                                            
                                                            <small>
                                                                03:38 PM                                                            </small></p>
                                                          
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="booking_id[]" value="20">
                                                            #0020                                                        </td>
                                                     <td>
                                                            <p><b>Tour :</b> Experience Taj Mahal and Agra on a Private Tour by Express Train<br><b>Option :</b> All Inclusive Tour</p></td>
                                                        <td>
                                                            <p><b>Booked On:</b> 26-04-2023                                                            <small>
                                                                03:38 PM                                                            </small>
                                                            <br><b>Travel On :</b> 26-04-2023                                                            <small>
                                                                12:00 AM                                                            </small><br />
                                                            <b>Packs:</b> 
                                                            1 Adult,
                                                            0 Child,
                                                            0 Infant
                                                            </p>
                                                        </td>
                                                        <td><p><b>Name:</b> John Doe<br>
                                                        <b>Phone:</b> 123456789<br>
                                                        <b>Email:</b> John@gmail.com<br></p>
                                                          </td>
                                                        <td>
                                                            19 Amira Ln<br>
                                                            New Jersey<br>
                                                          
                                                            United States                                                        </td>
                                                        <td class="text-center">
                                                            <p class="badge badge-success">
                                                                Confirmed                                                            </p>
                                                        </td>
                                                        <td class="text-right">
                                                            <p class="badge badge-danger">
                                                                Full Pay                                                            </p>
                                                            
                                                            <br />
                                                            <p><b>Cost:</b> USD 1.00<br>
                                                        <b>Paid:</b> USD 1.00<br>
                                                        <b>Paid on:</b> 26-04-2023                                                            
                                                            <small>
                                                                03:38 PM                                                            </small></p>
                                                          
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="booking_id[]" value="20">
                                                            #0020                                                        </td>
                                                     <td>
                                                            <p><b>Tour :</b> Experience Taj Mahal and Agra on a Private Tour by Express Train<br><b>Option :</b> All Inclusive Tour</p></td>
                                                        <td>
                                                            <p><b>Booked On:</b> 26-04-2023                                                            <small>
                                                                03:38 PM                                                            </small>
                                                            <br><b>Travel On :</b> 26-04-2023                                                            <small>
                                                                12:00 AM                                                            </small><br />
                                                            <b>Packs:</b> 
                                                            1 Adult,
                                                            0 Child,
                                                            0 Infant
                                                            </p>
                                                        </td>
                                                        <td><p><b>Name:</b> John Doe<br>
                                                        <b>Phone:</b> 123456789<br>
                                                        <b>Email:</b> John@gmail.com<br></p>
                                                          </td>
                                                        <td>
                                                            19 Amira Ln<br>
                                                            New Jersey<br>
                                                          
                                                            United States                                                        </td>
                                                        <td class="text-center">
                                                            <p class="badge badge-success">
                                                                Confirmed                                                            </p>
                                                        </td>
                                                        <td class="text-right">
                                                            <p class="badge badge-danger">
                                                                Full Pay                                                            </p>
                                                            
                                                            <br />
                                                            <p><b>Cost:</b> USD 1.00<br>
                                                        <b>Paid:</b> USD 1.00<br>
                                                        <b>Paid on:</b> 26-04-2023                                                            
                                                            <small>
                                                                03:38 PM                                                            </small></p>
                                                          
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="booking_id[]" value="20">
                                                            #0020                                                        </td>
                                                     <td>
                                                            <p><b>Tour :</b> Experience Taj Mahal and Agra on a Private Tour by Express Train<br><b>Option :</b> All Inclusive Tour</p></td>
                                                        <td>
                                                            <p><b>Booked On:</b> 26-04-2023                                                            <small>
                                                                03:38 PM                                                            </small>
                                                            <br><b>Travel On :</b> 26-04-2023                                                            <small>
                                                                12:00 AM                                                            </small><br />
                                                            <b>Packs:</b> 
                                                            1 Adult,
                                                            0 Child,
                                                            0 Infant
                                                            </p>
                                                        </td>
                                                        <td><p><b>Name:</b> John Doe<br>
                                                        <b>Phone:</b> 123456789<br>
                                                        <b>Email:</b> John@gmail.com<br></p>
                                                          </td>
                                                        <td>
                                                            19 Amira Ln<br>
                                                            New Jersey<br>
                                                          
                                                            United States                                                        </td>
                                                        <td class="text-center">
                                                            <p class="badge badge-success">
                                                                Confirmed                                                            </p>
                                                        </td>
                                                        <td class="text-right">
                                                            <p class="badge badge-danger">
                                                                Full Pay                                                            </p>
                                                            
                                                            <br />
                                                            <p><b>Cost:</b> USD 1.00<br>
                                                        <b>Paid:</b> USD 1.00<br>
                                                        <b>Paid on:</b> 26-04-2023                                                            
                                                            <small>
                                                                03:38 PM                                                            </small></p>
                                                          
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="booking_id[]" value="20">
                                                            #0020                                                        </td>
                                                     <td>
                                                            <p><b>Tour :</b> Experience Taj Mahal and Agra on a Private Tour by Express Train<br><b>Option :</b> All Inclusive Tour</p></td>
                                                        <td>
                                                            <p><b>Booked On:</b> 26-04-2023                                                            <small>
                                                                03:38 PM                                                            </small>
                                                            <br><b>Travel On :</b> 26-04-2023                                                            <small>
                                                                12:00 AM                                                            </small><br />
                                                            <b>Packs:</b> 
                                                            1 Adult,
                                                            0 Child,
                                                            0 Infant
                                                            </p>
                                                        </td>
                                                        <td><p><b>Name:</b> John Doe<br>
                                                        <b>Phone:</b> 123456789<br>
                                                        <b>Email:</b> John@gmail.com<br></p>
                                                          </td>
                                                        <td>
                                                            19 Amira Ln<br>
                                                            New Jersey<br>
                                                          
                                                            United States                                                        </td>
                                                        <td class="text-center">
                                                            <p class="badge badge-success">
                                                                Confirmed                                                            </p>
                                                        </td>
                                                        <td class="text-right">
                                                            <p class="badge badge-danger">
                                                                Full Pay                                                            </p>
                                                            
                                                            <br />
                                                            <p><b>Cost:</b> USD 1.00<br>
                                                        <b>Paid:</b> USD 1.00<br>
                                                        <b>Paid on:</b> 26-04-2023                                                            
                                                            <small>
                                                                03:38 PM                                                            </small></p>
                                                          
                                                        </td>
                                                    </tr>
                                                                

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