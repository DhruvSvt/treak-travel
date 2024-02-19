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
                    <h1>Edit Client Feedback</h1>
                    <ul>
                        <li><a href="/">Dashboard</a></li>
                        <li>Edit Client Feedback</li>
                    </ul>
                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">


                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">

                                <form method="POST" action="{{ route('update-job', ['id' => $job->id]) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="title">Title</label>
                                            <input name="title" value="{{ $job->title }}"
                                                class="form-control" type="text" required />
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="short_description">Sub title</label>
                                            <input name="sub_title"
                                                value="{{ $job->sub_title }}" class="form-control"
                                                type="text" required />
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label for="email">Description</label>
                                            <textarea id="efditor" name="description" class="form-control" required>{{ $job->description }}</textarea>
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

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
</body>

</html>
