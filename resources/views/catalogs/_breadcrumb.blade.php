<ol class="breadcrumb" style="color:white">
    @if(!is_null($current_category))
    <li>Kategori : <strong class="animated infinite flash slower delay-5s">{{$current_category->title}}</a></strong></li>
    @else
    <li>Pilih Menu yang Tersedia!</li>
    @endif
</ol>
