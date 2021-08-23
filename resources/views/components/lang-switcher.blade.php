<li class="nav-item dropdown" style="margin-top: 12px; font-size: 27px; border:none">
    <a class="nav-link" data-toggle="dropdown" href="#" style=" font-size: 27px; border:none;">
    <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
       <ul>
       @foreach ($langs as $code => $name)
        <li>
        <a href="{{URL::Current()}}?lang={{$code}}" class="dropdown-item" style="color:black;">
            {{ $name }}
        </a>
        </li>
        @endforeach
        </ul>
    </div>
</li>
