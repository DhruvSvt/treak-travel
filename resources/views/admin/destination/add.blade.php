<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')

    <style>
        .ck-editor__editable_inline {
            min-height: 400px;
        }
    </style>

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
                    <h1>Add Destination</h1>
                    <ul>
                        <li><a href="/">Dashboard</a></li>
                        <li>Add Destination</li>
                    </ul>
                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">


                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">

                                <form method="POST" enctype="multipart/form-data"
                                    action="{{ route('create-destination') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="title">Destination Name</label>
                                            <input name="destinationName" id="destinationName" class="form-control"
                                                type="text" required />
                                        </div>
                                        @if ($isTrendingShow)
                                            <div class="form-group col-sm-12">
                                                <input type="checkbox" id="istrending" name="istrending" />
                                                <label for="scales">isTrending</label>
                                            </div>
                                        @endif

                                        <div class="form-group col-sm-6">
                                            <label for="title">Page URL</label>
                                            <input name="destionationSlug" id="slug" class="form-control"
                                                type="text" required />
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="title">Destination Type </label>
                                            <select name="destinationType" class="form-control" required="true">
                                                {{-- <option>None</option> --}}
                                                @foreach ($destinationTypeResponse as $response)
                                                    <option value="{{ $response->id }}">
                                                        {{ $response->destionation_type_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group col-sm-6">
                                            <label for="short_description">Starting Price</label>
                                            <input name="destinationPrice" class="form-control" type="text"
                                                required />
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="form-label">Banner</label>
                                            <input type="file" name="destinationBanner" accept="image/*,video/*"
                                                class="form-control" required />
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="form-label">Card Image</label>
                                            <input type="file" name="destionationCard" accept="image/*,video/*"
                                                class="form-control" required />
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="text">Description</label>
                                            <textarea id="destinationSeo" rows="5" name="destinationSeo" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group col-sm-12 text-right">
                                            <a href="" class="btn btn-default">
                                                Cancel
                                            </a>
                                            <button type="submit" class="btn btn-primary">Add</button>
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

    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    <script>
        $("#destinationName").on('change', function() {
            var slug = $(this).val();
            let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
            //remove multiple space to single
            finalSlug = slug.replace(/  +/g, ' ');
            // remove all white spaces single or multiple spaces
            finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
            $('#slug').val(finalSlug);
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#destinationSeo'), {
                ckfinder: {
                    uploadUrl: '{{ route('image.upload') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>
