<li class="{{ Request::is('generals*') ? 'active' : '' }}">
    <a href="{{ route('generals.index') }}"><i class="fa fa-edit"></i><span>Generals</span></a>
</li>

<li class="{{ Request::is('grupos*') ? 'active' : '' }}">
    <a href="{{ route('grupos.index') }}"><i class="fa fa-edit"></i><span>Grupos</span></a>
</li>

<li class="{{ Request::is('musicos*') ? 'active' : '' }}">
    <a href="{{ route('musicos.index') }}"><i class="fa fa-edit"></i><span>Musicos</span></a>
</li>

