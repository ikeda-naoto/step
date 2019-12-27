<template>
<div>
    <breadCrumbsComponent
    :breadCrumbsList="breadCrumbsList"></breadCrumbsComponent>
    <!-- メインコンテンツ -->
    <div class="l-container u-bg-light">
        <div class="l-row l-site-width">
            <!-- メインカラム -->
            <div class="l-row__col12 l-row__col08-pc">
                <section class="p-parent">
                    <!-- 親STEP詳細 -->
                    <parentStepDetailMainComponent
                    :parentStep="parentStep"></parentStepDetailMainComponent>
                    <!-- 子STEPインデックス -->
                    <childStepIndexComponent
                    :childSteps="childSteps"></childStepIndexComponent>
                    <challengeBtnComponent></challengeBtnComponent>
                </section>
            </div>
            <!-- サブカラム（サイドバー） -->
            <div class="l-row__col12 l-row__col04-pc">
                <div class=" c-sidebar">
                    <div class="c-sidebar__group">
                        <a href="" class="c-btn c-btn--warning c-sidebar__btn--full">STEPを作る</a>
                    </div>
                    <div class="c-sidebar__group">
                        <h2 class="c-sidebar__head"><span class="c-sidebar__title"><i class="fas fa-user-alt c-sidebar__icn"></i>このSTEPを作った人</span></h2>
                        <div class="c-sidebar__body">
                            <div class="c-sidebar__img-container">
                                <img class="c-sidebar__prof-img" src="img/no-img.jpg" alt="">
                            </div>
                            <h3 class="c-sidebar__prof-name">なおちん</h3>
                            <div class="c-sidebar__prof-intro">
                                テキスト
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import breadCrumbsComponent from '../breadCrumbsComponent';
    import parentStepDetailMainComponent from '../parentStepDetail/parentStepDetailMainComponent';
    import childStepIndexComponent from '../parentStepDetail/childStepIndexComponent';
    import challengeBtnComponent from '../parentStepDetail/challengeBtnComponent';
    export default {
        components: {
            breadCrumbsComponent,
            parentStepDetailMainComponent,
            childStepIndexComponent,
            challengeBtnComponent,
        },
        props: ['parentStep', 'childSteps'],
        data: function() {
            return {
                breadCrumbsList: [this.parentStep.parent_title]
            }
        }
    }
</script>
