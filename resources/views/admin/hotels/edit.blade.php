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
                    <h1>Edit Hotels</h1>
                    <ul>
                        <li><a href="/">Dashboard</a></li>
                        <li>Edit Hotels</li>
                    </ul>
                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">


                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">

                                <form method="POST" enctype="multipart/form-data" action="{{ route('update-hotel', ['id' => $hotels->id]) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="title">Hotels Title</label>
                                            <input name="hotel_name" value="{{ $hotels->hotel_name }}"
                                                class="form-control" type="text" required />
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="title">Hotels Location</label>
                                            <input name="hotel_location" value="{{ $hotels->hotel_location }}"
                                                class="form-control" type="text" required />
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="title">Rate the Hotel</label>
                                            <input name="hotel_rate" value="{{$hotels->hotel_rate}}" oninput="onRateChangeHandler(this)" id="hotel_rate"
                                                class="form-control" type="number" inputmode="numeric" max="7"
                                                min="1" required />
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label class="form-label">Banner</label>
                                            <input type="file" name="hotel_image" accept="image/*"
                                                class="form-control" />
                                            {{-- <img class="img-thumbnail" style="width:200px;"
                                                        src="{{ Storage::url( $hotels->hotel_banner) }}" /> --}}
                                        </div>


                                        <div class="form-group col-sm-12 text-right">
                                            <a href="" class="btn btn-default">
                                                Cancel
                                            </a>
                                            <button type="submit" class="btn btn-primary">Update</button>
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

    <script>

        function onRateChangeHandler(e) {
            if (e.value <= 0 || e.value > 7) {
                alert("You can only enter value between 1 to 7");
                $("#hotel_rate").val(null);
                return false;
            }
        }
    </script>


</body>

</html>
