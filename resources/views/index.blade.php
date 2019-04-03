<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <style type="text/css">
        ul {
            list-style: none;
            margin: 0;
            padding: 0;
            padding-left: 15px;
        }
        ul.file-list {
            padding-left: 0;
        }
    </style>
    <body>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    List files
                </div>
                <div class="card-body">
                    <h5 class="card-title">Show all your files</h5>
                        @foreach($files as $key => $item)
                        @include('showstorage::item', ['folder' => $key, 'items' => $item])
                        @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
