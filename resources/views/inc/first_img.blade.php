@if($product->images->count() > 0)
    <img src="{{ $product->images->first()->img }}" alt="a" class="admin_pr_img">
@else
    <img src="/public/storage/default/default_img.jpg" alt="a" class="admin_pr_img">
@endif
