<template>
    <div class="p-regist-step__parent">
        <div class="c-form">
            <h1 class="c-title--normal u-mb--5l">STEP {{ !editFlg ? '登録' : '編集' }}</h1>
            <div class="l-row c-form__group">
                <div class="l-row__col12--sm l-row__col04--tab l-row__col04--pc">
                    <label for="parent_title" class="c-form__label">タイトル</label>
                    <span class="c-form__require">必須</span>
                </div>
                <div class="l-row__col12--sm l-row__col08--tab l-row__col08--pc">
                    <input id="parent_title" type="text" class="c-input c-input--full" :class="title.length > 30 ? 'c-input--err' : ''" v-model="title">
                    <span class="u-fontcolor--err" v-if="title.length > 30">
                        タイトルは30文字以下にしてください。
                    </span>
                </div>
            </div>
            <div class="l-row c-form__group">
                <div class="l-row__col12--sm l-row__col04--tab l-row__col04--pc">
                    <label for="category" class="c-form__label">カテゴリー</label>
                    <span class="c-form__require">必須</span>
                </div>
                <div class="l-row__col12--sm l-row__col08--tab l-row__col08--pc">
                    <label class="c-form__icn--select">
                        <select name="" id="category" class="c-select c-select--half-pc c-select--full-sm" v-model="category_id">
                            <option value="">選択してください</option>
                            <option v-for="category in categories" :key="category.id" :value="category.id">
                                {{ category.name }}
                            </option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="l-row c-form__group">
                <div class="l-row__col12--sm l-row__col04--tab l-row__col04--pc">
                    <label for="parent_content" class="c-form__label">STEPの内容</label>
                    <span class="c-form__require">必須</span>
                </div>
                <div class="l-row__col12--sm l-row__col08--tab l-row__col08--pc">
                    <textarea class="c-textarea c-textarea--high c-textarea--full" name="" id="parent_content" v-model="content"></textarea>
                </div>
            </div>
            <inputFileComponent
                text="STEP画像"
                :pic="pic"
                @updatePic="updatePic"
            ></inputFileComponent>
        </div>
    </div>
</template>
<script>
    import inputFileComponent from '../inputFileComponent';
    export default {
        components: {
            inputFileComponent,
        },
        props: ['value', 'categories', 'editFlg'],
        data: function() {
            return {
                title: '',
                category_id: '',
                content: '',
                pic: ''
            }
        },
        mounted: function() {
             this.title = this.value.title;
             this.category_id = this.value.category_id;
             this.content = this.value.content;
             this.pic = this.value.pic;
        },
        // 親STEPの情報が入力されたら
        updated: function() {
            this.updateParentData();
        },
        methods: {
            // 親ステップの各情報を更新する（v-modelと同じ動き）
            updateParentData: function() {
                this.$emit('input', {
                    title: this.title,
                    category_id: this.category_id,
                    content: this.content,
                    pic: this.pic
                });
            },
            // 画像情報が入力されたら親STEPの情報を更新する（画像はフォームバインディングできないため別途で行う）
            updatePic: function(val) {
                this.pic = val;
                this.updateParentData();
            }
        }
    }

</script>