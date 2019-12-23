<template>
    <div class="p-regist-step__parent">
        <div class="p-regist-step__group">
            <div class="l-row c-form__group">
                <div class="l-row__col04-pc">
                    <label for="name" class="p-prof-edit__label">タイトル</label>
                </div>
                <div class="l-row__col08-pc">
                    <input id="name" type="text" class="c-input c-input--full" v-model="title">
                </div>
            </div>
            <div class="l-row c-form__group">
                <div class="l-row__col04-pc">
                    <label for="intro" class="p-prof-edit__label">カテゴリー</label>
                </div>
                <div class="l-row__col08-pc">
                    <select name="" id="" class="c-select c-select--half"  v-model="category_id">
                        <option value="">プログラミング</option>
                        <option value="">英語</option>
                    </select>
                </div>
            </div>
            <div class="l-row c-form__group">
                <div class="l-row__col04-pc">
                    <label for="email" class="p-prof-edit__label">STEPの内容</label>
                </div>
                <div class="l-row__col08-pc">
                    <textarea class="c-textarea c-textarea--high c-textarea--full" name="" id="intro" v-model="content"></textarea>
                </div>
            </div>
             <inputFileComponent></inputFileComponent>
        </div>
    </div>
</template>
<script>
    import inputFileComponent from './inputFileComponent';
    export default {
        components: {
            inputFileComponent,
        },
        //props: ['index', 'childStep'],
        // props: {
        //         value: {
        //         type: Object,
        //     required: true,
        // },
        props: ['value', 'categories'],
        data: function() {
            return {
                title: '',
                category_id: 0,
                content: '',
                file: ''
            }
        },
        mounted: function() {
             this.title = this.value.title;
             this.category_id = this.value.category_id;
             this.content = this.value.content;
        },
        updated: function() {
            this.$emit('input', {
                title: this.title,
                category_id: this.category_id,
                content: this.content,
            });
           
            //console.log('as')
        },
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