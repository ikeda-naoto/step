<template>
    <div class="p-regist-step__parent">
        <div class="p-regist-step__group">
            <div class="l-row c-form__group">
                <div class="l-row__col12 l-row__col04-pc">
                    <label for="name" class="p-prof-edit__label">タイトル</label>
                </div>
                <div class="l-row__col12 l-row__col08-pc">
                    <input id="name" type="text" class="c-input c-input--full" v-model="title">
                </div>
            </div>
            <div class="l-row c-form__group">
                <div class="l-row__col12 l-row__col04-pc">
                    <label for="intro" class="p-prof-edit__label">カテゴリー</label>
                </div>
                <div class="l-row__col12 l-row__col08-pc">
                    <select name="" id="" class="c-select c-select--half" v-model="category_id">
                        <option value="">選択してください</option>
                        <option v-for="category in categories" :key="category.id" :value="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="l-row c-form__group">
                <div class="l-row__col12 l-row__col04-pc">
                    <label for="email" class="p-prof-edit__label">STEPの内容</label>
                </div>
                <div class="l-row__col12 l-row__col08-pc">
                    <textarea class="c-textarea c-textarea--high c-textarea--full" name="" id="intro" v-model="content"></textarea>
                </div>
            </div>
            <inputFile
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
        updated: function() {
            this.updateParentData();
        },
        methods: {
            updateParentData: function() {
                this.$emit('input', {
                    parent_title: this.title,
                    category_id: this.category_id,
                    parent_content: this.content,
                    pic: this.pic
                });
            },
            updatePic: function(val) {
                this.pic = val;
                this.updateParentData();
            }
        }
        // computed: {
        //     changeFile: function() {
        //         //this.file = val;
        //         console.log('aaa')
        //         this.$emit('changeFile', this.file);
        //     }
        // }
        // computed: {
        //     a: function() {
        //         console.log('as')
                 
                
        //     }
        // }
        // watch: {
        //     a: function() {
        //         this.$parent.file = this.file;
        //     }
        // }
        // props: [
        //     'index',
        //     {
        //         value: {
        //             type: Object,
        //             required: true,
        //         },
        //     },
        // ]
        
    }

</script>