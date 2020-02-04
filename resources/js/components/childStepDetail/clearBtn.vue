<template>
    <button class="c-btn c-btn--small c-btn--warning c-btn--right u-pt--l u-pb--l" @click="onClickClearBtn" :disabled="isPush">
        クリア！
    </button>
</template>

<script>
    import Mixin from '../mixins/mixin';
    export default {
        props: ['parentStepId'],
        data: function() {
            return {
                isPush: false
            }
        },
        mixins: [Mixin],
        methods: {
            // クリア処理
            onClickClearBtn: function() {
                this.isPush = !this.isPush;
                // csrfトークンを保存
                let data = { _token: $('meta[name="csrf-token"]').attr('content')}
                // axios通信
                axios.post('/challenge/' + this.parentStepId + '/clear', data)
                .then(res => {
                    // 通信成功の場合
                    if(res.data.nextStepId === null) { // 次のSTEPがない場合
                        // マイページへ遷移
                        location.href = '/users/mypage';
                    }else{ // それ以外
                        // 次のSTEPへ遷移
                        location.href = '/steps/' + this.parentStepId + '/' + res.data.nextStepId;
                    }
                })
                .catch(error => {
                    // 通信失敗の場合
                    // エラー処理
                    this.errorHandling(error); 
                });
            },

        }
    }
</script>

<style>

</style>