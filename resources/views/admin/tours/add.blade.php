<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .btn_remove_area {
            position: absolute;
            top: 16px;
            right: 10px;
            padding: 1px 4px;
            font-size: 13px;
        }
    </style>
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
                    <h1>Add Tours</h1>
                    <ul>
                        <li><a href="/">Dashboard</a></li>
                        <li>Add Tours</li>
                    </ul>
                </div>

                <div class="separator-breadcrumb border-top"></div>


                <div class="row">


                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">

                                <form method="POST" enctype="multipart/form-data" action="{{ route('create-tour') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="title">Tour Title</label>
                                            <input name="tourName" id="tourName" class="form-control" type="text"
                                                required />
                                        </div>
                                        <input type="hidden" id="ismegamenu" name="ismegamenu" /> 
                                        <input type="hidden" value="Highlights" name="destination_cover" />
                                        <div class="form-group col-sm-6">
                                            <label for="title">Select inclusion</label>
                                            <select class="form-control select2" required name="tourSelectInclusion[]" multiple="multiple">
                                                <option value="Highlights">Highlights</option>
                                                <option value="Flights">Flights</option>
                                                <option value="Hotels">Hotels</option>
                                                <option value="Sightseeing">Sightseeing</option>
                                                <option value="Visa">Visa</option>
                                                <option value="Meals">Meals</option>
                                                <option value="Transfer">Transfer</option>
                                                <option value="Accommodation">Accommodation</option>
                                                <option value="Tickets">Tickets</option>
                                            </select>
                                        </div>
                                       
                                        <div class="form-group col-sm-6">
                                            <label for="title">Select tour type</label>
                                            <select class="form-control select2" required name="tour_type">
                                                <option value="Standard">Standard</option>
                                                <option value="Deluxe">Deluxe</option>
                                                <option value="Premium">Premium</option>
                                            </select>
                                        </div>
                                     
                                        <div class="form-group col-sm-6">
                                            <label for="title">Tour Slug</label>
                                            <input name="tourUrl" id="tourUrl" class="form-control" type="text"
                                                required />
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="title">Tour Price (Per Person)</label>
                                            <input name="tourPrice" class="form-control" type="text" required />
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="title">Tour Duration</label>
                                            <input name="tourDuration" class="form-control" type="text" required />
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="short_description">Short Description</label>
                                            <textarea name="tourShortDescription" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="form-label">Banner</label>
                                            <input type="file" name="tourBanner" accept="image/*"
                                                class="form-control" required />
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="form-label">Gallery</label>
                                            <input type="file" id="gallery" name="tourGallery[]"
                                                accept="image/*" class="form-control" multiple="multiple"
                                                max="4" required />
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="title">Select Destinations</label>
                                            <select class="form-control select2" required name="tourDestinations[]"
                                                multiple="multiple">
                                                @foreach ($destinationResponse as $response)
                                                    <option value="{{ $response->destination_id }}">
                                                        {{ $response->destination_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="title">Select Hotels</label>
                                            <select class="form-control select2" name="tourHotels[]"
                                                multiple="multiple">
                                                @foreach ($hotelResponse as $response)
                                                    <option value="{{ $response->id }}">
                                                        {{ $response->hotel_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group col-sm-6">
                                            <label for="title">Select Category</label>
                                            <select class="form-control select2" id="tourCategory" required
                                                name="tourCategory">
                                                <option value="">Select Category</option>
                                                @foreach ($categoryResponse as $response)
                                                    <option value="{{ $response->id }}">
                                                        {{ $response->tour_category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="title">Select Subcategory</label>
                                            <select class="form-control select2" id="tourSubCategory" required
                                                name="tourSubCategory">
                                                <option value="">Select Subcategory</option>

                                            </select>
                                        </div>

                                        <hr />
                                        <div class="form-group col-sm-6">
                                            <label for="text">Overview</label>
                                            <textarea id="overview" rows="5" name="tourOverview" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="text">Inclusion</label>
                                            <textarea id="inclusion" name="tourInclusion" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="text">Exclusion</label>
                                            <textarea id="exclusion" name="tourExclusion" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="text">Disclaimer</label>
                                            <textarea id="disclaimer" name="tourDisclaimer" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <div style="border: 1px solid #ddd;background: #f2f2f2;padding:5px">
                                                <label for="email">Tour Plan &nbsp; <a href="javascript:void(0)"
                                                        id="addcustom_adultprice" class="btn btn-sm btn-primary">
                                                        ++Add More</a></label>
                                                <div id="contain_addcustom_adultprice">
                                                    <div class="row">
                                                        <div class="form-group col-sm-12">
                                                            <input name="plan_title[]" class="form-control "
                                                                type="text" required placeholder="Tour Plan Title">
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <textarea id="plan_desc" name="plan_desc[]" rows="2" class="form-control " placeholder="Tour Plan Detail"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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

    {{-- <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('#tourCategory').on('change', e => {
                $('#tourSubCategory').empty()

                $.ajax({
                    url: `/admin/getTourSubcategory/${e.target.value}`,
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    success: data => {
                        $('#tourSubCategory').append(
                            `<option value="">Select SubCategory</option>`)
                        data.data.forEach(subcategory =>
                            $('#tourSubCategory').append(
                                `<option value="${subcategory.tour_subcategories_id}">${subcategory.tour_subcategory_name}</option>`
                            )
                        )
                    }
                })
            });

            $("input#gallery[type='file']").change(function() {
                var $fileUpload = $("input#gallery[type='file']");
                if (parseInt($fileUpload.get(0).files.length) > 4) {
                    alert("You can only upload a maximum of 4 files");
                    $("#gallery").val(null);
                    return false;
                }

            });

            $("#tourName").on('change', function() {
                var slug = $(this).val();
                let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                //remove multiple space to single
                finalSlug = slug.replace(/  +/g, ' ');
                // remove all white spaces single or multiple spaces
                finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                $('#tourUrl').val(finalSlug);
            });
        });
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#overview'), {
                ckfinder: {
                    uploadUrl: '{{ route('image.upload') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#inclusion'), {
                ckfinder: {
                    uploadUrl: '{{ route('image.upload') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#exclusion'), {
                ckfinder: {
                    uploadUrl: '{{ route('image.upload') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#disclaimer'), {
                ckfinder: {
                    uploadUrl: '{{ route('image.upload') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#plan_desc'), {
                ckfinder: {
                    uploadUrl: '{{ route('image.upload') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        var k = 1;
        $('#addcustom_adultprice').click(function() {
            $('#contain_addcustom_adultprice').append('<div class="row customarea' + k +
                '"><div class="form-group col-sm-12"><input name="plan_title[]" class="form-control "  type="text"  required placeholder="Tour Plan Title"></div><div class="form-group col-sm-12"><textarea id="plan_desc'+k+'" name="plan_desc[]" rows="2" class="form-control" placeholder="Tour Plan Detail"></textarea><button type="button"  id="' +
                k + '" class="btn btn-danger btn_remove_area"> X </button></div></div>');

            ClassicEditor
            .create(document.querySelector('#plan_desc'+k), {
                ckfinder: {
                    uploadUrl: '{{ route('image.upload') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {
                console.error(error);
            });
            k++;
        });




        $(document).on('click', '.btn_remove_area', function() {
            var button_id = $(this).attr("id");
            $('.customarea' + button_id + '').remove();
        });
    </script>

</body>

</html>
