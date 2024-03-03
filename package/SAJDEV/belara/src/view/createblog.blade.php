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
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" role="form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Title" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="slug" placeholder="slug" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="description" placeholder="slug" />
                    </div>
                    <div id="editor"></div>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#editor' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                    <div class="form-group">
                        <label> Image </label>
                        <div class="input-group">

                            <span class="input-group-btn">
                                <span class="btn btn-primary btn-file">
                                    Browse <input type="file" name="bimgs" multiple>
                                </span>
                            </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control bcontent" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="Submit" value="Publish" class="btn btn-primary form-control" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
