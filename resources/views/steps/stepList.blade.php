@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('steps'))

@section('title', 'STEP一覧')

@section('main')
    <!-- メインカラム -->
    <div class="l-row__col12--sm l-row__col08--tab l-row__col08--pc">
        <!-- ページタイトル -->
        <h1 class="c-title--normal u-mb--5l">STEP一覧</h1>
        @if (count($parentSteps) === 0)
            <p class="u-text--center u-fontsize--l">
                STEPがありません
            </p>
        @else
            <!-- STEP一覧 -->
            <div class="l-row p-step-list">
                @foreach ($parentSteps as $parentStep)
                    <step-list-component
                        :parent-step="{{ $parentStep }}"
                        :child-steps="{{ $parentStep->childSteps }}"  
                        :category="{{ $parentStep->category }}"
                    >
                    </step-list-component>
                @endforeach
            </div>
        @endif
        <!-- ページネーション  -->
        {{ $parentSteps->appends(request()->input())->links('pagination::default') }}
    </div>
@endsection

@section('sidebar')
<div class="l-row__col12--sm l-row__col04--tab l-row__col04--pc">
    <div class="c-sidebar">
        <!-- STEP登録ボタン -->
         @component('components.registStepBtn')
         @endcomponent
        <!-- キーワード検索欄 -->
        <div class="c-sidebar__group">
            <h2 class="c-sidebar__head">
                <span class="c-sidebar__title">
                    <i class="fas fa-search c-sidebar__icn"></i>探す
                </span>
            </h2>
            <div class="c-sidebar__body">
                <form method="GET" action="/steps/">
                    <input type="text" class="c-sidebar__input" name="keyword" value="{{ $keyword }}">
                </form>
            </div>
        </div>
        <!-- カテゴリー検索欄 -->
        <div class="c-sidebar__group"> 
            <h2 class="c-sidebar__head"><span class="c-sidebar__title"><i class="fas fa-list c-sidebar__icn"></i>カテゴリー</span></h2>
            <div class="c-sidebar__body">
                <ul class="c-sidebar__list">
                    <li class="c-sidebar__list-item @if(empty($c_id))c-sidebar__list-item--active @endif">
                        <a class="c-sidebar__label"  href="/steps/?c_id=0">
                            すべて
                        </a>
                    </li>
                    @foreach ($categories as $category)
                    <li class="c-sidebar__list-item @if($c_id ===$category->id) c-sidebar__list-item--active @endif">
                        <a class="c-sidebar__label" href="{{ '/steps/?c_id='.$category->id}}">
                                {{ $category->name }}
                        </a> 
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
