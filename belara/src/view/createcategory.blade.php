<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
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
    </style>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="post" role="form" action="{{ route('blogCategory.create') }}">
                @csrf
                <div class="form-group">
                    <label for="title">{{__('title')}}</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}"
                           placeholder="Title"/>
                </div>
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-group">
                    <label for="slug">{{__('slug')}}</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="slug"
                           value="{{old('slug')}}"/>
                </div>
                @error('slug')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-group">
                    <label for="category">{{__('category')}}</label>
                    <select class=" form-control" name="category_id" id="category">
                        <option value="">_______</option>
                        @foreach  ($categores as $item )
                            <option @if(old('category_id') ==$item->id ) selected
                                    @endif value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-group">
                    <input type="submit" name="Submit" value="submit" class="btn btn-primary form-control"/>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
