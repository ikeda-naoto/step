<template>
    <!-- パンくずリスト -->
    <div class="l-bread-crumbs">
        <div class="p-bread-crumbs l-row l-row--middle">
            <ul class="l-site-width l-row p-bread-crumbs__list">
                <li><a href="" class="p-bread-crumbs__link">ホーム</a><i class="fas fa-angle-right p-bread-crumbs__icn"></i></li>
                <li v-for="(breadCrumbsItem, index) in breadCrumbsList">{{ breadCrumbsItem }}<i v-if="breadCrumbsList.length-1 !== index" class="fas fa-angle-right p-bread-crumbs__icn"></i></li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['breadCrumbsList']
    }
</script>