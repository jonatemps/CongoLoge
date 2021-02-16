<li><a class="heart fa fa-star text-center" href="{{route('favorite',Auth::user()->id ?? '0')}}">&nbsp;Favotri <span class="badge badge-success">{{$totalLikes}}</span></a></li>
