<li><a class="heart fa fa-star" href="{{route('favorite',Auth::user()->id ?? '0')}}">&nbsp;{{$totalLikes}}</a></li>
