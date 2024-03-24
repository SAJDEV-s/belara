<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$blog->title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body dir="rtl">
<div class="container">
    <div class="row bg-light p-5">
        <div class="col-12 fs-1 text-center">
            {{ $blog->title }}
        </div>

        <div class="col-12 fs-4 text-center">
            {{ $blog->description }}
        </div>
        @if($blog->main_image !=null)
        <div class="col-12 fs-1  ">
            <div class="w-75 text-center">
                <img src="{{  asset('media/'.$blog->main_image) }}" class="w-100 " alt="">
            </div>
        </div>
        @endif
        <div class="col-5 mt-5 w-75">
                {!! $blog->body !!}
        </div>
    </div>
</div>
</body>
</html>
