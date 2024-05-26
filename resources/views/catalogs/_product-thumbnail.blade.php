<h3>{{$product->name}}</h3>
<style>
    .thumbnail img{
        width: 100%;
        max-width: 100%;
        min-width: 100%;
        height: 100%;
        max-height: 250px;
        min-height: 250px;
    }
</style>
<div class="thumbnail">
    <img src="{{$product->photo_path}}">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Kategori :
        @foreach($product->categories as $category)
            <span class="label label-warning">
                <i class="fas fa-btn fa-utensil-spoon animated infinite swing slower delay-5s"></i>
                {{$category->title}}
            </span>
            @endforeach
        </li>
        <li class="list-group-item">Harga : <strong>Rp {{number_format($product->price, 2)}}</strong></li>
        @include('layouts._customer-feature', ['partial_view'=>'catalogs._add-product-form', 'data'=>compact('product')])
    </ul>
</div>
