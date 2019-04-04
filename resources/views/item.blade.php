@if($folder == 'dir_/')
    @if($items)
    <ul class="file-list">
        <li>
            <ul class="file-list-items">
                @foreach($items as $key => $item)
                <li><i class="far fa-file"></i> {{$item['name']}} <span class="badge badge-info">{{$item['size']}}</span></li>
                @endforeach
            </ul>
        </li>
    </ul>
    @endif        
@else
    <ul class="file-list">
        <li><i class="far fa-folder-open"></i> {{str_replace('dir_', '', $folder)}}</li>
        @foreach($items as $key => $item)
            @include('showstorage::item', ['folder' => $key, 'items' => $item])
        @endforeach
    </ul>
@endif