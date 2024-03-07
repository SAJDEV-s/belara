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

        .ck-editor__editable_inline {
            height: 450px;
        }
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
                    <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Title"/>

                </div>
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                <div class="form-group">
                    <input type="text" class="form-control" name="slug" placeholder="slug"/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="description" placeholder="description"/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="metas" placeholder="metas ,"/>
                </div>
                <div class="form-group">
                    <select class=" form-control" name="category_id" id="">
                        <option value="">category</option>
                        @foreach ($categores as $item )
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>

                </div>
                @if (config('belara.author'))
                    <div class="form-group">
                        <label for=""></label><select class=" form-control" name="author" id="">
                            <option value="">-------</option>
                            @foreach ($users as $item )
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="form-group">
                        <input type="text" class="form-control" name="author" placeholder="author"/>
                    </div>
                @endif
                <label for="editor"></label><textarea name="body" id="editor" cols="30" rows="10"></textarea>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'),
                            {
                                ckfinder: {
                                    uploadUrl: "{{ route('ckeditor.upload',['_token'=>csrf_token()]) }}",
                                }
                            }
                        )
                        .catch(error => {
                            console.error(error);
                        });
                </script>
                <div class="form-group">
                    <label> Image </label>
                    <div class="input-group">

                            <span class="input-group-btn">
                                <span class="btn btn-primary btn-file">
                                    Browse <input type="file" name="image" multiple>
                                </span>
                            </span>
                        <input type="text" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label> is publish </label>
                    <div class="input-group">
                        no
                        <label>
                            <input type="radio" value="0" checked name="is_published" class="form-check">
                        </label>
                        yes
                        <label>
                            <input type="radio" value="1" name="is_published" class="form-check">
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="Submit" value="Publish" class="btn btn-primary form-control"/>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
