@props(['item'=>null,'size'=>70, 'float'=>''])

<img src="{{$item->imagenes ? url('storage/'.$item->imagenes->url): asset('no-image.png')  }}" class="rounded {{$float}}" width='{{$size}}'>


