@foreach($items as $item)
	<li @if($item->hasChildren()) class="nav-parent" @endif>
		@if($item->hasChildren())
			<a href="#">
		@else
			<a href="{!! $item->url() !!}">
		@endif
			<i class="{!! $item->attributes["class"] !!}"></i>
			<span>{!! $item->title !!}</span>
		</a>
		@if($item->hasChildren())
		<span class="toggler">
			<span class="glyphicon glyphicon-chevron-down"></span>
		</span>
		@endif
		@if($item->hasChildren())
		<ul class="nav nav-children">
		      @include('backend.partial.custom_menu_items', array('items' => $item->children()))
		</ul> 
		@endif
	</li>
@endforeach