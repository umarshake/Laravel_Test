<!-- Navigation -->
<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <a href="index.html">
                <img src="{{ asset('images/dummy.jpeg') }}" class="img-circle m-b" alt="logo">
            </a>

            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase">@if (Auth::check()) {{ Auth::user()->username }} @endif</span>
            </div>
        </div>
        
        <ul class="nav" id="side-menu">
             <li class=""><a href="{{ route('listdata')}}">{{ "List Data" }}</a></li>
             <li class=""><a href="{{ route('adddata')}}">{{ "Add Data" }}</a></li>

        </ul>
    </div>
</aside>
@push('scripts')

@endpush
