<template>
    <div class="l-row c-form__group">
        <div class="l-row__col12--sm l-row__col04--tab l-row__col04--pc">
            <label for="img" class="c-form__label">{{ text }}</label>
            <span class="c-form__option">任意</span>
        </div>
        <div class="l-row__col12--sm l-row__col08--tab l-row__col08--pc">
            <div class="l-row l-row--middle l-row--center c-file-upload" :class="isset(showImg) ? 'c-file-upload--active' : false">
                <img class="c-img__item--center c-file-upload__img" :src="showImg" alt="">
                <div class="c-file-upload__droparea" :class="isset(showImg) ? 'c-file-upload__droparea--active' : false">
                    <input type="file" id="img" class="c-file-upload__input-file" accept="" @change="onFileChange" accept="image/*">
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
        props: ['text', 'pic'],
        mixins: [Mixin],
        data: function() {
            return {
                uploadedImg: '',
            }
        },
        computed: {
            // 表示する画像のパスを返す
            showImg: function(){
                if(this.uploadedImg !== '') { // ファイルの入力があったら
                    return this.uploadedImg;
                }else if(this.uploadedImg === '' && this.isset(this.pic)) { // ファイルの入力はないが、すでに登録されている画像があったら
                    return '/storage/img/' + this.pic;
                }else { // ファイルの入力もなく、登録された画像もなかったら
                    return '';
                }
            }
        },
        methods: {
            // 画像プレビュー処理
            onFileChange: function(e) {
                let files = e.target.files || e.dataTransfer.files;
                // ファイル情報を親に渡す
                this.$emit('updatePic', files[0]);
                // this.createImg(files[0]);
                // プレビューする画像を読み込む
                let fileReader = new FileReader();
                fileReader.onload = (e) => {
                    this.uploadedImg = e.target.result;
                };
                fileReader.readAsDataURL(files[0]);
            },
        }
    }
</script>