<ul>
@if($folder == 'dir_/')
    @if($items)
    <li>
        <ul class="file-list">
            @foreach($items as $key => $item)
            <li><i class="far fa-file"></i> {{$item['name']}} / {{$item['size']}}</li>
            @endforeach
        </ul>
    </li>
    @endif        
@else
    <li><i class="far fa-folder-open"></i> {{str_replace('dir_', '', $folder)}}</li>
    @foreach($items as $key => $item)
        @include('showstorage::item', ['folder' => $key, 'items' => $item])
    @endforeach
@endif
</ul>