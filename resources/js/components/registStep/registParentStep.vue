<template>
    <div class="p-regist-step__parent">
        <div class="p-regist-step__group">
            <div class="l-row c-form__group">
                <div class="l-row__col12 l-row__col04-pc">
                    <label for="parent_title" class="p-prof-edit__label">タイトル</label>
                    <span class="c-form__require">必須</span>
                </div>
                <div class="l-row__col12 l-row__col08-pc">
                    <input id="parent_title" type="text" class="c-input c-input--full" v-model="title">
                </div>
            </div>
            <div class="l-row c-form__group">
                <div class="l-row__col12 l-row__col04-pc">
                    <label for="category" class="p-prof-edit__label">カテゴリー</label>
                    <span class="c-form__require">必須</span>
                </div>
                <div class="l-row__col12 l-row__col08-pc">
                    <select name="" id="category" class="c-select c-select--half-pc c-select--full-sm" v-model="category_id">
                        <option value="">選択してください</option>
                        <option v-for="category in categories" :key="category.id" :value="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="l-row c-form__group">
                <div class="l-row__col12 l-row__col04-pc">
                    <label for="parent_title" class="p-prof-edit__label">STEPの内容</label>
                    <span class="c-form__require">必須</span>
                </div>
                <div class="l-row__col12 l-row__col08-pc">
                    <textarea class="c-textarea c-textarea--high c-textarea--full" name="" id="parent_title" v-model="content"></textarea>
                </div>
            </div>
            <inputFile
                text="STEP画像"
                :pic="pic"
                @updatePic="updatePic"
            ></inputFile>
        </div>
    </div>
</template>
<script>
    import inputFile from '../inputFile';
    export default {
        components: {
            inputFile,
        },
        props: ['value', 'categories'],
        data: function() {
            return {
                title: '',
                category_id: 0,
                content: '',
                pic: ''
            }
        },
        mounted: function() {
             this.title = this.value.parent_title;
             this.category_id = this.value.category_id;
             this.content = this.value.parent_title;
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
                    parent_title: this.title,
                    category_id: this.category_id,
                    parent_content: this.content,
                    pic: this.pic
                });
            },
            // 画像情報が入力されたら（画像はフォームバインディングできないため別途で行う）
            updatePic: function(val) {
                this.pic = val;
                this.updateParentData();
            }
        }
    }

</script>