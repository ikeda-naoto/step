<template>
    <div class="l-row c-form__group">
        <div class="l-row__col04-pc">
            <label for="img" class="p-prof-edit__label" v-if="page==='users'">プロフィール画像</label>
            <label for="img" class="p-prof-edit__label" v-else>STEP画像</label>
        </div>
        <div class="l-row__col08-pc">
            <div class="l-row l-row--middle l-row--center c-file-upload">
                <img class="c-file-upload__img" :src="showImg" alt="">
                <div>
                    <input type="file" id="img" class="c-file-upload__input-file" accept="" @change="onFileChange">
                    <p class="c-file-upload__lead">画像をここにドラッグ&ドロップ<br>または</p>
                    <div class="c-file-upload__btn">ファイルを選択</div>
                </div>
            </div> 
        </div>
    </div>
</template>

<script>
    import Mixin from './mixins/mixin';
    export default {
        props: ['pic'],
        mixins: [Mixin],
        data: function() {
            return {
                uploadedImg: '',
                page: ''
            }
        },
        created: function() {
            let url = location.href.split('/');
            this.page = url[3];
        },
        computed: {
            showImg: function(){
                if(this.uploadedImg !== '') {
                    return this.uploadedImg;
                }else if(this.uploadedImg === '' && this.isset(this.pic)) {
                    return '/storage/img/' + this.pic;
                }else {
                    return '';
                }
            }
        },
        methods: {
            onFileChange: function(e) {
                let files = e.target.files || e.dataTransfer.files;
                // this.$parent.file = files[0];
                this.$emit('updatePic', files[0]);
                this.createImg(files[0]);
            },
            createImg: function(file) {
                let fileReader = new FileReader();
                fileReader.onload = (e) => {
                    this.uploadedImg = e.target.result;
                };
                fileReader.readAsDataURL(file);
            },
        }
    }
</script>