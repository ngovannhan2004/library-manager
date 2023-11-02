@extends('admin.layouts.main')
@section('title_page')
    Edit Blog - Admin - {{$blog->title}}
@endsection
@section('name_user')
    Nam 077
@endsection
@section('css_custom')
    <link href="{{asset('/admin/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>

@endsection
@section('js_custom')
    <script src="{{asset('/admin/assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/jbtl59mg1cy9ucbkg1klu08mvj1ywhzd3usvxtv59j6kj7ug/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>

    <script>
        var input = document.querySelector("#kt_tagify_6");
        new Tagify(input, {
            whitelist: ["Ada", "Adenine", "Agda", "Agilent VEE"],
            maxTags: 10,
            dropdown: {
                maxItems: 20,
                classname: "",
                enabled: 0,
                closeOnSelect: false
            }
        });
        $(".tag2").select2({
            tags: true,
            tokenSeparators: [',']
        })
        var editor_config = {
            path_absolute: "/",
            selector: 'textarea.my-editor',
            relative_urls: false,

            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern autoresize"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback: function (callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };
        tinymce.init(editor_config);
    </script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script !src="">
        //

        $('#lfm').filemanager('image');

    </script>
@endsection
@section('menu')
    @php
        $menu_parent = 'blog';
        $menu_child = 'edit';
    @endphp
@endsection
@section('title_component')
    Blog
@endsection
@section('title_layout')
    Edit Blog [ {{$blog->title}} ]
@endsection
@section('actions_layout')
    <a href="{{route('admin.blogs.create')}}" class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
        <i class="fa fa-list"></i> List Blog
    </a>
@endsection
@section('title_card')
    Edit Blog [{{$blog->title}} ]
@endsection
@section('content_card')
    <form action="{{route('admin.blogs.update', $blog -> id)}}" method="post" class="form-control-sm">
        @csrf
        <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Title</label>
            <input name="title" type="text" class="form-control form-control-solid"
                   placeholder="Enter title" value="{{$blog->title}}">
        </div>
        <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Category</label>
            <select class="form-select form-select-solid" data-control="select2"
                    data-placeholder="Select category" data-select2-id="1" name="id_category">
                @foreach($categories as $category)
                    <option @if($blog->id_category == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-10">
            <div class="input-group">
                <span class="input-group-btn"><a id="lfm" data-input="thumbnail" data-preview="holder"
                                                 class="btn btn-primary"><i
                            class="fa fa-picture-o"></i> Choose</a></span>
                <input name="image_path" id="thumbnail" class="form-control" type="text" name="filepath" value="{{$blog->image_path}}">
            </div>
            <img id="holder" style="margin-top:15px;max-height:100px;">
        </div>
        <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Status</label>
            <select class="form-select form-select-solid" data-control="select2"
                    data-placeholder="Select status" data-select2-id="1" name="status">
                <option value="1" @if($blog->status == 1) selected @endif>Publish</option>
                <option value="0" @if($blog->status == 0) selected @endif>Draft</option>
                <option value="2" @if($blog->status == 2) selected @endif>Private</option>
                <option value="3" @if($blog->status == 3) selected @endif>Trash</option>
            </select>
        </div>
        <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Tag</label>
            <select class="form-select form-select-solid tag2 "
                    data-placeholder="Select an option" data-allow-clear="true" multiple="multiple" name="tags[]">
                @foreach($tags as $tag)
                    <option @if(in_array($tag->id, $blog->tags->pluck('id')->toArray())) selected @endif value="{{$tag->name}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Description</label>
            <textarea name="description" class="form-control form-control-solid " rows="10"
                      placeholder="Enter description">{{$blog->description}}</textarea>
        </div>
        <div class="mb-10">
            @php
            @endphp
            <label for="exampleFormControlInput1" class="required form-label">Content</label>
            <textarea name="content" class="form-control form-control-solid my-editor"
                      placeholder="Enter content">{{$blog->content}}</textarea>
        </div>

        <div class="mb-10">
            <button class="btn btn-primary btn-sm mr-2 mb-2 mb-lg-0">
                <i class="fa fa-save"></i> Save
            </button>
        </div>

    </form>
@endsection
@section('footer_card')

@endsection
@section('content_layout')
    <!--begin::Card-->
    <div class="card shadow-sm card-bordered">
        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
             data-bs-target="#kt_docs_card_collapsible">
            <h3 class="card-title">@yield('title_card')</h3>
            <div class="card-toolbar rotate-180">
                <span class="svg-icon svg-icon-1">
                   <i class="fa fa-angle-down"></i>
                </span>
            </div>
        </div>
        <div id="kt_docs_card_collapsible" class="collapse show">
            <div class="card-body">
                @yield('content_card')
            </div>
            <div class="card-footer">
                @yield('footer_card')
            </div>
        </div>
    </div>
    <!--end::Card-->
@endsection

