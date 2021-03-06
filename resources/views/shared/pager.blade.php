@if(!empty($count) && !empty($page) && !empty($total) && !empty($routeName))
  <?php $page_count = intval(ceil($total / $count)); ?>
  <div class="form-group row">
    <div class="col-md-12">
      <ul class="pagination float-left">
        <li class="page-item {{ intval($page) === 1 ? 'disabled' : '' }}">
          <a class="page-link" href="{{ route($routeName, ['count' => $count, 'page' => $page - 1]) }}" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        @for($i=1; $i <= $page_count; $i++)
          @if($i == intval($page))
          
            {{-- current page always visible --}}
            <li class="page-item active">
              <span class="page-link">{{ $i }}</span>
            </li>
          
          @elseif(($i === 1) || ($i === $page_count))
          
            {{-- first and last page always visible --}}
            <li class="page-item">
              <a class="page-link" href="{{ route($routeName, ['count' => $count, 'page' => $i]) }}">{{ $i }}</a>
            </li>
          
          @elseif((intval($page) - 1 === $i) || ($i === intval($page) + 1))
          
            {{-- 1 pages before/after --}}
            <li class="page-item">
              <a class="page-link" href="{{ route($routeName, ['count' => $count, 'page' => $i]) }}">{{ $i }}</a>
            </li>
          
          @elseif((intval($page) - 2 === $i) || ($i === intval($page) + 2))
          
            {{-- 2 pages before/after --}}
            <li class="page-item hidden-md-down">
              <a class="page-link" href="{{ route($routeName, ['count' => $count, 'page' => $i]) }}">{{ $i }}</a>
            </li>
            
          @elseif(intval($page) - 3 === $i)
          
            {{-- 3 pages before --}}
            <li class="page-item">
              <a class="page-link" href>...</a>
            </li>
            <li class="page-item hidden-lg-down">
              <a class="page-link" href="{{ route($routeName, ['count' => $count, 'page' => $i]) }}">{{ $i }}</a>
            </li>
            
          @elseif($i === intval($page) + 3)
          
            {{-- 3 pages after --}}
            <li class="page-item hidden-lg-down">
              <a class="page-link" href="{{ route($routeName, ['count' => $count, 'page' => $i]) }}">{{ $i }}</a>
            </li>
            <li class="page-item">
              <a class="page-link" href>...</a>
            </li>
            
          @else
          
            <li class="page-item hidden-xl-down">
              <a class="page-link" href="{{ route($routeName, ['count' => $count, 'page' => $i]) }}">{{ $i }}</a>
            </li>
            
          @endif
          
          
        @endfor
        <li class="page-item {{ intval($page) === $page_count ? 'disabled' : '' }}">
          <a class="page-link" href="{{ route($routeName, ['count' => $count, 'page' => $page + 1]) }}" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
      <ul class="pagination float-right">
          @foreach([10,20,50] as $per_page)
              @if($per_page == intval($count))
                  <li class="page-item active">
                      <span class="page-link">{{ $per_page }}</span>
                  </li>
              @else
                  <li class="page-item">
                      <a class="page-link" href="{{ route($routeName, ['count' => $per_page, 'page' => 1]) }}">{{ $per_page }}</a>
                  </li>
              @endif
          @endforeach
      </ul>
    </div>
  </div>
@endif