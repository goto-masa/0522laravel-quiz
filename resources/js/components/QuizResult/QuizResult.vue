<template>
    <div v-if="hidden2">
    <!-- <div> -->
        正解数は{{ totalquizNum + 1 }}門中、{{ totalCorrectNum}}門でした！！
        <button @click="retryQuiz" type="button" class="btn btn-default">リトライ</button>
    </div>
</template>
<script>
export default {
    name: 'QuizResult',
    props: {
        'totalquizNum': {
            type: Number,
            default: ''
        },
        'totalCorrectNum': {
            type: Number,
            default: ''
        }
    },
    data: function () {
        return {
            hidden2: false,
        };
    },
    methods: {
        showResult: function () {
            this.hidden2 = true;

        },
        retryQuiz: function () {
            this.hidden2 = false;
            this.$emit('parentFunc');
        }
    }
};
</script>
