<div class="c-sidebar__group">
    <h2 class="c-sidebar__head"><span class="c-sidebar__title"><i class="fas fa-user-alt c-sidebar__icn"></i>{{ $title }}</span></h2>
    <div class="c-sidebar__body">
        <div class="c-img c-img--circle c-sidebar__prof-img">
            <img class="c-img__item--center" src="{{ isset($user->pic) ? '/storage/img/' . $user->pic : '/images/unknown.png'}}" alt="">
        </div>
        <h3 class="c-sidebar__prof-name">
            {{ isset($user->name) ? $user->name : '名無しさん' }}
        </h3>
        @if(isset($user->introduction))
        <div class="c-sidebar__prof-intro">
            {!! nl2br(e($user->introduction))!!}
        </div>
        @endif
    </div>
</div>