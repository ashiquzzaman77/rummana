@extends('admin.admin_dashboard')
@section('admin')
    {{-- Validation --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="card">
            <div class="card-body p-4">

                <h5 class="card-title">Edit Project</h5>

                <hr />

                <form action="{{ route('update.project') }}" id="myForm" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="id" value="{{ $project->id }}">
                    <input type="hidden" name="old_image" value="{{ $project->image }}">

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Name</label>
                                        <input type="text" name="project_name" class="form-control"
                                            value="{{ $project->project_name }}" autocomplete="off">

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Short Descp</label>
                                        <textarea name="short_descp" class="form-control" rows="3">{{ $project->short_descp }}</textarea>

                                    </div>

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Long Descp</label>
                                        <textarea id="mytextarea" class="form-control" name="long_descp">{{ $project->long_descp }}</textarea>

                                    </div>

                                    <div class="row">

                                        <div class="col-12">
                                            <div class="mb-3">

                                                <label class="form-label">Image</label>

                                                <input type="file" autocomplete="off" id="image" name="image"
                                                    class="form-control mb-2 @error('image') is-invalid @enderror">

                                                @error('image')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror

                                                <br>

                                                <img src="{{ asset($project->image) }}" alt="banner" class="rounded-0"
                                                    id="showImage" width="70" height="70">
                                            </div>
                                        </div>

                                        {{-- <div class="col-6">
                                            <div class="mb-3">

                                                <label class="form-label">Multi Image</label>
                                                <input type="file" autocomplete="off" class="form-control" id="multiImg"
                                                    name="multi_img[]" multiple="">

                                                <div class="row mt-3" id="preview_img"></div>

                                            </div>
                                        </div> --}}

                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary px-4">Update Project</button>
                                    </div>


                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </form>

            </div>
        </div>

        {{-- /// Add Multi Image //// --}}

        <div class="card">
            <div class="card-body p-4">

                <a id="addRoomNo" onclick="addRoomNo()" class="btn btn-dark">Add Gallery Image</a>

                <hr />

                <div class="roomnoHide" id="roomnoHide">
                    <form action="{{ route('store.gallery.image') }}" id="myForm" method="POST" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="imgId" value="{{$project->id}}">

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Add Gallery Image</h5>
                                    <div class="border border-3 p-4 rounded">

                                        <div class="row">

                                            <div class="col-8">
                                                <input type="file" autocomplete="off" class="form-control" name="multi_img">
                                            </div>

                                            <div class="col-4">
                                                <button type="submit" class="btn btn-warning">Upload Image</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </form>
                </div>

            </div>
        </div>

        {{-- /// view Multi Image //// --}}

        <div id="roomview">
            <div class="card">
                <div class="card-body ">
    
                    <h5>Total Multi Image <span class="badge bg-danger">{{ count($multimg) }}</span></h5>
    
                    <div class="border border-3 p-4 rounded">
                        <table class="table mb-0 table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Sl No</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
    
                            <tbody>
                                <form action="{{route('update.gallery.image')}}" method="post" enctype="multipart/form-data">

                                    @csrf
                                    @foreach ($multimg as $key => $img)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($img->photo) }}" style="width: 100px" alt="">
                                        </td>
                                        <td>
                                            <input type="file" class="form-control" name="multi_img[{{$img->id}}]">
                                        </td>
                                        <td>
                                            <button class="btn btn-success btn-sm">Update</button>
    
                                            <a href="{{route('delete.gallery.image',$img->id)}}" class="btn btn-danger btn-sm" title="Delete" id="delete"><i
                                                    class="fadeIn animated bx bx-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </form>
                            </tbody>
    
                        </table>
                    </div>
    
    
                </div>
            </div>
        </div>

    </div>

    {{-- Image --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    {{-- multi image  --}}
    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(100)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>

    {{-- validate code  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                project_name: {
                    description: {
                        required: true,
                    },
                },
                messages: {
                    project_name: {
                        required: 'Enter Project Name',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
    {{-- start room Number --}}

    <script>
        $('#roomnoHide').hide();
        $('#roomview').show();

        function addRoomNo() {
            $('#roomnoHide').show();
            $('#roomview').hide();
            $('#addRoomNo').hide();
        }
    </script>
@endsection
