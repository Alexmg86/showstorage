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
        ul.file-list, ul.file-list-items {
            list-style: none;
            margin: 0;
            padding: 0;
            padding-left: 30px;
        }
        ul.file-list, ul.file-list li {
            position: relative;
        }
        ul.file-list::before {
            content: '';
            height: 100%;
            width: 1px;
            background: #28a745;
            display: block;
            position: absolute;
            top: 0;
            left: 6px;
        }
        ul.file-list:last-child::before {
            height: 12px;
        }
        ul.file-list li::before {
            content: '';
            height: 1px;
            width: 8px;
            background: #28a745;
            display: block;
            position: absolute;
            top: 12px;
            left: -14px;
        }
        ul.file-list-items {
            padding-left: 0;
        }
        .fa-file {
            padding-right: 6px;
        }
        .form-check-input {
            position: absolute;
            left: -10px;
        }
    </style>
    <body>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <span class="align-middle">List files</span>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-outline-danger btn-sm float-right" onclick="deleteFiles()">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="files-box">
                    <h5 class="card-title">Show all your files</h5>
                    @foreach($files as $key => $item)
                    @include('showstorage::item', ['folder' => $key, 'items' => $item])
                    @endforeach
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        function deleteFiles() {
            var fileBox = document.getElementById('files-box');
            var inputs = fileBox.querySelectorAll('input:checked');
            inputs = Array.from(inputs);
            var items = {'file': [], 'folder': []};
            inputs.forEach(function(item) {
                items[item.dataset.type].push(item);
            });
            deleteItems(items['file'], 'file');
            deleteItems(items['folder'], 'folder');
            submitForDelete(items);
        }

        function deleteItems(items, type) {
            items.forEach(function(item) {
                var ulMain = item.closest('.file-list');
                var ulItem = item.closest('.file-list-items');
                item.closest('li').remove();
                if(ulItem) {
                    var li = ulItem.getElementsByTagName('li');
                }
                if(type == 'folder' || li.length < 1) {
                    ulMain.remove();
                }
            });
        }

        function selectFoder(event) {
            var inputs = event.target.closest('ul').getElementsByTagName('input');
            inputs = Array.from(inputs);
            inputs.forEach(function(item) {
                item.checked = event.target.checked ? true : false;
            });
        }

        function submitForDelete(items) {
            console.log(items);
            for(var k in items) {
                items[k].forEach(function(item) {
                    console.log(item.closest('li').dataset.path);
                });
            }
        }

    </script>
</html>
