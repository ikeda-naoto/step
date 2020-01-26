<template>
<div class="p-regist-step__child">
    <h2 class="p-regist-step__num">STEP{{ index + 1 }}</h2>
    <div class="c-form">
        <!-- 子STEPタイトル -->
        <div class="l-row c-form__group">
            <div class="l-row__col12--sm l-row__col04--tab l-row__col04--pc">
                <label for="child_title" class="c-form__label">タイトル</label>
                <span class="c-form__require">必須</span>
            </div>
            <div class="l-row__col12--sm l-row__col08--tab l-row__col08--pc">
                <input id="child_title" type="text" class="c-input c-input--full" v-model="title">
            </div>
        </div>
        <!-- 子STEP終了時間 -->
        <div class="l-row c-form__group">
            <div class="l-row__col12--sm l-row__col04--tab l-row__col04--pc">
                <label for="time" class="c-form__label">目安達成時間</label>
                <span class="c-form__require">必須</span>
            </div>
            <div class="l-row__col12--sm l-row__col08--tab l-row__col08--pc">
                <label class="c-form__icn--select">
                    <select name="" id="time" class="c-select c-select--half-pc c-select--full-sm" v-model="time_value">
                        <option v-for="time in times" :key="time.minute" :value="time.minute">{{ time.text }}</option>
                    </select>
                </label>
            </div>
        </div>
        <!-- 子STEP内容 -->
        <div class="l-row c-form__group">
            <div class="l-row__col12--sm l-row__col04--tab l-row__col04--pc">
                <label for="child_content" class="c-form__label">STEP1の内容</label>
                <span class="c-form__require">必須</span>
            </div>
            <div class="l-row__col12--sm l-row__col08--tab l-row__col08--pc">
                <textarea class="c-textarea c-textarea--high c-textarea--full" name="" id="child_content" v-model="content"></textarea>
            </div>
        </div>
    </div>
</div>
</template>
<script>
    export default {
        props: ['index', 'value'],
        data: function() {
            return {
                title: '',
                time_value: '',
                content: '',
                times: [
                    { minute: '', text: '選択してください' },
                    { minute: 15, text: '15分' },
                    { minute: 30, text: '30分' },
                    { minute: 60, text: '1時間' },
                    { minute: 90, text: '1時間半' },
                    { minute: 120, text: '2時間' },
                    { minute: 150, text: '2時間半' },
                    { minute: 180, text: '3時間' },
                    { minute: 210, text: '3時間半' },
                    { minute: 240, text: '4時間' },
                    { minute: 270, text: '4時間半' },
                    { minute: 300, text: '5時間' },
                    { minute: 330, text: '5時間半' },
                    { minute: 360, text: '6時間' },
                    { minute: 390, text: '6時間半' },
                    { minute: 420, text: '7時間' },
                    { minute: 450, text: '7時間半' },
                    { minute: 480, text: '8時間' },
                    { minute: 510, text: '8時間半' },
                    { minute: 540, text: '9時間' },
                    { minute: 570, text: '9時間半' },
                    { minute: 600, text: '10時間' },
                ]
            }
        },
        mounted: function() {
             this.title = this.value.title;
             this.time_value = this.value.time;
             this.content = this.value.content;
        },
        // 親コンポーネントのデータを更新する
        updated: function() {
            this.$emit('input', {
                title: this.title,
                time: this.time_value,
                content: this.content
            });
        },        
    }

</script>