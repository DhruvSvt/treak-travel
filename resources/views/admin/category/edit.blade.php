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
                    <h1>Edit Tour Category</h1>
                    <ul>
                        <li><a href="/">Dashboard</a></li>
                        <li>Edit Tour Category</li>
                    </ul>
                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">


                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">

                                <form method="POST" action="{{ route('update-category', ['id' => $tourCategory->id]) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="title">Title</label>
                                            <input name="tour_category_name"
                                                value='{{ $tourCategory->tour_category_name }}' class="form-control"
                                                type="text" required />
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <input type="checkbox" id="inHeader" name="showInHeader"
                                            {{ $tourCategory->showinheader ? 'checked' : '' }}
                                            />
                                            <label for="scales">show in header</label>
                                        </div>


<input type="hidden" value="" name="ismegamenu" />
<input type="hidden" value="" name="url" />


                                         

                                        <div class="form-group col-sm-12 text-right">
                                            <a href="{{ url()->previous() }}" class="btn btn-default">
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

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>

    <script>

$(document).ready(function(){
    var cboxes = document.getElementById('ismegamenu');
            var cUrl = document.getElementById('divUrl');
            cboxes.checked==false ?cUrl.style.visibility='visible':cUrl.style.visibility='hidden'
       })


        $("#ismegamenu").on('change', function() {
            var cboxes = document.getElementById('ismegamenu');
            var cUrl = document.getElementById('divUrl');
            cboxes.checked==false ?cUrl.style.visibility='visible':cUrl.style.visibility='hidden'
        });
    </script>
</body>

</html>
