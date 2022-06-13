<template>
    <div v-if="hidden2">
        正解数は{{ quiznumber }}中、{{ totalCorrectNum }}門でした！！
        <button @click="retry()" type="button" class="btn btn-default">リトライ</button>
    </div>
</template>
<script>
export default {
    name: 'Quiz-result',
    props: ['val'],
    data: function () {
        return {
            hidden2: false,
            quiznumber:""
        };
    },
    methods: {
        showResult: function () {
            this.hidden2 = true;
            this.quiznumber = quizNum.length;
        },
        retry: function () {
            getQuizzes();
        }
    }
};
</script>
