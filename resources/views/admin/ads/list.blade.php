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
                    <h1>Ads</h1>
                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">


                    <div class="col-md-12 mb-3">
                        <div class="card text-left">

                            <div class="card-body">


                                @if (count($response) == 0)
                                    <form method="POST" enctype="multipart/form-data"
                                        action="{{ route('post_create_ads', ['id' => 'POPUP']) }}">
                                        @csrf
                                        <div class="row">

                                            <div class="form-group col-sm-6">
                                                <label class="form-label">POPUP ads</label>
                                                <input type="file" name="ads_image" accept="image/*"
                                                    class="form-control" required />
                                            </div>
                                            <div class="form-group col-sm-6 mt-4">
                                                <button type="submit" class="btn btn-primary">ADD</button>
                                            </div>

                                        </div>

                                    </form>
                                    <form method="POST" enctype="multipart/form-data"
                                        action="{{ route('post_create_ads', ['id' => 'SIDEBAR']) }}">
                                        @csrf
                                        <div class="row">

                                            <div class="form-group col-sm-6">
                                                <label class="form-label">SIDEBAR ads</label>
                                                <input type="file" name="ads_image" accept="image/*"
                                                    class="form-control" required />
                                            </div>


                                            <div class="form-group col-sm-6 mt-4">
                                                <button type="submit" class="btn btn-primary">ADD</button>
                                            </div>

                                        </div>

                                    </form>
                                @elseif (count($response) == 1)
                                    @foreach ($response as $data)
                                        @if ($data->type == 'SIDEBAR')
                                            <form method="POST" enctype="multipart/form-data"
                                                action="{{ route('post_create_ads', ['id' => 'POPUP']) }}">
                                                @csrf
                                                <div class="row">

                                                    <div class="form-group col-sm-6">
                                                        <label class="form-label">POPUP ads</label>
                                                        <input type="file" name="ads_image" accept="image/*"
                                                            class="form-control" required />
                                                    </div>

                                                    {{-- <div class="form-group col-sm-3 mt-4">
                                                        <img class="img-thumbnail" style="width:100px;"
                                                            src="{{ Storage::url($data->ads_image) }}" />
                                                    </div> --}}
                                                    <div class="form-group col-sm-3 mt-4">
                                                        <button type="submit" class="btn btn-primary">ADD</button>
                                                    </div>

                                                </div>

                                            </form>
                                        @else
                                            <form method="POST" enctype="multipart/form-data"
                                                action="{{ route('post_create_ads', ['id' => 'SIDEBAR']) }}">
                                                @csrf
                                                <div class="row">

                                                    <div class="form-group col-sm-6">
                                                        <label class="form-label">SIDEBAR ads</label>
                                                        <input type="file" name="ads_image" accept="image/*"
                                                            class="form-control" required />
                                                    </div>

                                                    {{-- <div class="form-group col-sm-3 mt-4">
                                                        <img class="img-thumbnail" style="width:100px;"
                                                            src="{{ Storage::url($data->ads_image) }}" />
                                                    </div> --}}
                                                    <div class="form-group col-sm-3 mt-4">
                                                        <button type="submit" class="btn btn-primary">ADD</button>
                                                    </div>

                                                </div>

                                            </form>
                                        @endif
                                        <form method="POST" enctype="multipart/form-data"
                                            action="{{ route('update-ads', ['id' => $data->id]) }}">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">POPUP ads</label>
                                                    <input type="file" name="adImage" accept="image/*"
                                                        class="form-control" required />
                                                </div>

                                                <div class="form-group col-sm-3 mt-4">
                                                    <img class="img-thumbnail" style="width:100px;"
                                                        src="{{ Storage::url($data->ads_image) }}" />
                                                </div>
                                                <div class="form-group col-sm-3 mt-4">
                                                    <button type="submit" class="btn btn-primary">UPDATE</button>
                                                </div>

                                            </div>

                                        </form>
                                    @endforeach
                                @else
                                    @foreach ($response as $data)
                                        <form method="POST" enctype="multipart/form-data"
                                            action="{{ route('update-ads', ['id' => $data->id]) }}">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                    <label class="form-label">{{ $data->type }} ads</label>
                                                    <input type="file" name="adImage" accept="image/*"
                                                        class="form-control" required />
                                                </div>

                                                <div class="form-group col-sm-3 mt-4">
                                                    <img class="img-thumbnail" style="width:100px;"
                                                        src="{{ Storage::url($data->ads_image) }}" />
                                                </div>
                                                <div class="form-group col-sm-3 mt-4">
                                                    <button type="submit" class="btn btn-primary">UPDATE</button>
                                                </div>

                                            </div>

                                        </form>
                                    @endforeach
                                @endif

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



</body>

</html>
