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
                        <h1>Edit Destination</h1>
                        <ul>
                            <li><a href="/">Dashboard</a></li>
                            <li>Edit Destination</li>
                        </ul>
                    </div>

                    <div class="separator-breadcrumb border-top"></div>


                    <div class="row">


                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-body">

                                    <form method="POST" enctype="multipart/form-data"
                                        action="{{ route('update-destination', ['id' => $destinationResponse->destination_id]) }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="title">Destination Name</label>
                                                <input name="destination_name"
                                                    value="{{ $destinationResponse->destination_name }}"
                                                    id="destinationName" class="form-control" type="text" required />
                                            </div>

                                                <div class="form-group col-sm-12">
                                                    <input type="checkbox" id="istrending" {{ $destinationResponse->istrending ? 'checked' : '' }} name="istrendingshow" />
                                                    <label for="scales">isTrending</label>
                                                </div>

                                            <div class="form-group col-sm-6">
                                                <label for="title">Page URL</label>
                                                <input name="destination_slug"
                                                    value="{{ $destinationResponse->destination_slug }}" id="slug"
                                                    class="form-control" type="text" required />
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="title">Destination Type </label>
                                                <select name="destination_type_id" class="form-control" required="true">
                                                    @foreach ($destinationTypeResponse as $response)
                                                        <option value="{{ $response->id }}"
                                                            {{ $response->id == $destinationResponse->destination_type_id ? 'selected' : null }}>
                                                            {{ $response->destionation_type_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="form-group col-sm-6">
                                                <label for="short_description">Starting Price</label>
                                                <input name="destination_starting_price"
                                                    value="{{ $destinationResponse->destination_starting_price }}"
                                                    class="form-control" type="text" required />
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label">Banner</label>
                                                <input type="file" name="destinationBanner"
                                                    value="{{ $destinationResponse->destination_banner_image }}"
                                                    accept="image/*" class="form-control" />
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label">Card Image</label>
                                                <input type="file" name="destionationCard"
                                                    value="{{ $destinationResponse->destination_card_image }}"
                                                    accept="image/*" class="form-control" />
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="text">Description</label>
                                                <textarea id="destinationSeo" rows="5" name="destination_seo_description" class="form-control">{{ $destinationResponse->destination_seo_description }}</textarea>
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

        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
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
