<template>
    <button class="c-btn c-btn--warning c-btn--right u-pt--l u-pb--l" @click="onClickChallengeBtn">
        STEPにチャレンジする
    </button>
</template>

<script>
    import Mixin from './mixins/mixin';
    export default {
        props: ['parentStepId', 'firstChildStepId'],
        data: function() {
            return {
                isPush: false
            }
        },
        mixins: [Mixin],
        methods: {
            // チャレンジ処理
            onClickChallengeBtn: function() {
                this.isPush = !this.isPush
                let data = { 
                    _token: $('meta[name="csrf-token"]').attr('content'),　// csrfトークンを保存
                    parent_step_id : this.parentStepId,
                    clear_num: 0
                }
                // axios通信
                axios.post('/challenge', data)
                .then(res => {
                    // STEP１へ遷移
                    location.href = '/steps/' + this.parentStepId + '/' + this.firstChildStepId;
                 })
                .catch(error => {
                    // 通信失敗の場合
                    // エラー処理
                    this.errorHandling(error); 
                });
            } 
        }
    }
</script>