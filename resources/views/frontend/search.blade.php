
@foreach($data as $item)
<a href="{{route('detailproduct',[$item->slug])}}">
	<img src_dt="{{asset('upload/images/products/thumb/'.$item->thumb)}}" alt="{{$item->name}}"  >
	<span class="info">
		<span style="color: var(--text);">{{$item->name}}</span>
		@if(empty($item->price_onsale))
		<span style="color: var(--highlight);">{{number_format($item->price)}} @lang('lang.Currencyunit') </span> 
		@else
		<span style="color: var(--highlight);">{{number_format($item->price_onsale)}} @lang('lang.Currencyunit') (-{{$item->onsale}}%) </span> 
		@endif

</a>
@endforeach