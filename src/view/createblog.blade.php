<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="{{ asset('vendor/belara/ckeditor.js') }}"></script>
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }

        .btn-file input[type="file"] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        input[readonly] {
            background-color: white !important;
            cursor: text !important;
        }

        /* this is only due to codepen display don't use this outside of codepen */
        .container {
            padding-top: 20px;
        }

        @if(config('belara.blockLinks'))
        .ck-editor__editable_inline {
            height: 150px;
        }

        @else
        .ck-editor__editable_inline {
            height: 400px;
        }
        @endif
    </style>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="post" role="form" action="{{ route('blog.create') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="title">{{ __('title')}}</label>
                    <input type="text" id="title" class="form-control" name="title" value="{{old('title')}}"
                           placeholder="Title"/>
                </div>

                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-group">
                    <label for="slug">{{__('slug')}}</label>
                    <input type="text" id="slug" class="form-control" name="slug" value="{{old('slug')}}"
                           placeholder="slug"/>
                    @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="mt-2 "> {{__('image')}} </label>
                    <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-primary btn-file">
                                    Browse <input type="file" name="image">
                                </span>
                            </span>
                        <input type="text" class="form-control" readonly>

                    </div>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">{{__('description')}}</label>
                    <input type="text" id="description" value="{{old('description')}}" class="form-control"
                           name="description"
                           placeholder="description"/>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="metas">{{__('metas')}}</label>
                    <input type="text" id="metas" class="form-control" name="metas" value="{{old('metas')}}"
                           placeholder="metas ,"/>
                    @error('metas')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category_id">{{__('category')}}</label>
                    <select class=" form-control" name="category_id" id="">
                        <option value="">-------</option>
                        @foreach ($categores as $item )

                            <option @if($item->id ==old('category_id')) selected
                                    @endif value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div>

                </div>
                @if (config('belara.author'))
                    <div class="form-group">
                        <label for="author">{{__('author')}}</label>
                        <select class=" form-control" name="author" id="author">
                            <option value="">-------</option>
                            @foreach ($users as $item )
                                <option @if($item->id ==old('author')) selected
                                        @endif value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="form-group">
                        <label for="author">{{__('author')}}</label>
                        <input type="text" id="author" class="form-control" value="{{old('author')}}" name="author"
                               placeholder="author"/>
                    </div>
                @endif
                @error('author')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="body">{{__('body')}}</label>
                <textarea name="body" id="body" cols="30" rows="10">{{old('body')}}</textarea>

                @error('body')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                @if(config('belara.blockLinks'))

                    <label for="links">{{__('links')}}</label>
                    <div>
                        <textarea name="links" id="links" cols="10" rows="2">{{old('links')}}</textarea>

                    </div>
                    @error('links')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                @endif


                <div class="form-group">
                    <label for="is_published">{{__(' is publish ')}}</label>
                    <div class="input-group">
                        no
                        <label>
                            <input type="radio" @if(old('is_published') ==0) checked @endif id="is_published" value="0"
                                   name="is_published"
                                   class="form-check">
                        </label>
                        yes
                        <label>
                            <input id="is_published" @if(old('is_published') ==1) checked @endif  type="radio" value="1"
                                   name="is_published" class="form-check">
                        </label>
                    </div>
                </div>
                @error('is_published')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-group">
                    <input type="submit" name="Submit" value="Publish" class="btn btn-primary form-control"/>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

    ClassicEditor
        .create(document.querySelector('#body'),
            {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload',['_token'=>csrf_token()]) }}",
                }
            }
        )
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#links'),
            {
                toolbar: {
                    items: [
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'blockQuote', 'codeBlock', 'htmlEmbed', '|',
                    ],
                    shouldNotGroupWhenFull: true
                },
            }
        )
        .catch(error => {
            console.error(error);
        });

    const titleField = document.getElementById('title');
    const slugField = document.getElementById('slug');

    function slug(titleStr) {
        titleStr = titleStr.replace(/^\s+|\s+$/g, '');
        titleStr = titleStr.toLowerCase();
        //persian support
        titleStr = titleStr.replace(/[^a-z0-9_\s-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/, '')
            // Collapse whitespace and replace by -
            .replace(/\s+/g, '-')
            // Collapse dashes
            .replace(/-+/g, '-');
        return titleStr;
    };
    titleField.addEventListener('input', function () {
        const title = titleField.value;
        slugField.value = slug(title);
    });
</script>
</body>

</html>
