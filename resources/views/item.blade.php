@if($folder == 'dir_/')
    @if($items['files'])
    <ul class="file-list">
        <li>
            <ul class="file-list-items">
                @foreach($items['files'] as $key => $item)
                <li data-path="{{$item['path']}}">
                    <input type="checkbox" class="form-check-input" data-type="file">
                    <i class="far fa-file"></i> {{$item['name']}} <span class="badge badge-info">{{$item['size']}}</span>
                </li>
                @endforeach
            </ul>
        </li>
    </ul>
    @endif
@else
    <ul class="file-list">
        <li data-path="{{$items['dir_/']['path']}}">
            <input type="checkbox" class="form-check-input" data-type="folder" onclick="selectFoder(event)">
            <i class="far fa-folder-open"></i> {{str_replace('dir_', '', $folder)}}
        </li>
        @foreach($items as $key => $item)
            @include('showstorage::item', ['folder' => $key, 'items' => $item])
        @endforeach
    </ul>
@endif