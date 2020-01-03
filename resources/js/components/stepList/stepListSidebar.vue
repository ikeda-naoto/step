<template>
<div class="l-row__col12 l-row__col04-pc">
                <div class="c-sidebar">
                        <registStepBtn></registStepBtn>
                        
                        <searchText></searchText>

                        <searchCategory
                            :categories="categories"
                        ></searchCategory>
                </div>
            </div>
</template>

<script>
    import searchText from './searchText';
    import searchCategory from './searchCategory';
    import registStepBtn from '../registStepBtn'
    export default {
        components: {
            searchText,
            searchCategory,
            registStepBtn
        },
        props: ['categories'],
    }
</script>