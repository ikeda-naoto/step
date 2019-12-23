<template>
<div class="p-regist-step__child">
    <h2 class="p-regist-step__num">STEP{{ index + 1 }}</h2>
    <div class="p-regist-step__group">
        <!-- 子STEPタイトル -->
        <div class="l-row c-form__group">
            <div class="l-row__col04-pc">
                <label for="name" class="p-prof-edit__label">タイトル</label>
            </div>
            <div class="l-row__col08-pc">
                <input id="name" type="text" class="c-input c-input--full" v-model="title">
            </div>
        </div>
        <!-- {{-- <div class="l-row c-form__group">
            <div class="l-row__col04-pc">
                <label for="intro" class="p-prof-edit__label">難易度</label>
            </div>
            <div class="l-row__col08-pc">
                <select name="" id="" class="c-select c-select--half">
                    <option value="">入門</option>
                    <option value="">基礎</option>
                </select>
            </div>
        </div>
        <div class="l-row c-form__group">
            <div class="l-row__col04-pc">
                <label for="img" class="p-prof-edit__label">クリア条件</label>
            </div>
            <div class="l-row__col08-pc">
                <input id="name" type="text" class="c-input c-input--full">
            </div>
        </div> --}} -->
        <!-- 子STEP終了時間 -->
        <div class="l-row c-form__group">
            <div class="l-row__col04-pc">
                <label for="img" class="p-prof-edit__label">終了目安時間</label>
            </div>
            <div class="l-row__col08-pc">
                <select name="" id="" class="c-select c-select--half" v-model="time_id">
                    <option value="">選択してください</option>
                    <option v-for="time in times" :key="time.id" :value="time.id">{{ time.time }}</option>
                </select>
            </div>
        </div>
        <!-- 子STEP内容 -->
        <div class="l-row c-form__group">
            <div class="l-row__col04-pc">
                <label for="email" class="p-prof-edit__label">STEP1の内容</label>
            </div>
            <div class="l-row__col08-pc">
                <textarea class="c-textarea c-textarea--high c-textarea--full" name="" id="intro" v-model="content"></textarea>
            </div>
        </div>
    </div>
</div>
</template>
<script>
    export default {
        //props: ['index', 'childStep'],
        // props: {
        //         value: {
        //         type: Object,
        //     required: true,
        // },
        props: ['index', 'value', 'times'],
        data: function() {
            return {
                title: '',
                time_id: '',
                content: '',
                
            }
        },
        mounted: function() {
             this.title = this.value.child_title;
             this.time_id   = this.value.time_id;
             this.content = this.value.child_content;
        },
        updated: function() {
            this.$emit('input', {
                child_title: this.title,
                time_id: this.time_id,
                child_content: this.content
            });
        },
        
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