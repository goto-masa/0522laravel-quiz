    <template>
        <main id="quiz" class="l-section__wide">
            <article id="question" class="p-quiz">
                <section>
                    <ul>
                        <li v-for="(word,key) in words" :key="key">{{ word }}</li>
                    </ul>
                    <p>words:{{ words }}</p>
                    <p>totalCorrectNum:{{ totalCorrectNum }}</p>
                    <p>totalquizNum:{{ totalquizNum }}</p>
                    <p> quizNum - 1:{{ quizNum - 1 }}</p>
                    <p>wordsLength:{{ wordsLength }}</p>
                    <p>random:{{ random }}</p>
                    <!-- <p>pre_choice_debag:{{ pre_choice_debag }}</p> -->
                    <p>correct:{{ correct }}</p>
                    <p>incorrect:{{ incorrect }}</p>
                    <p>incorrect2:{{ incorrect2 }}</p>
                    <p>correct_title:{{ correct_title }}</p>
                    <p>aChoice:{{ aChoice }}</p>
                    <p>pre_aChoice:{{ pre_aChoice }}</p>
                    <p>index:{{ index }}</p>
                    <br>
                    <div v-if="hidden">
                        <h1 class="c-bar c-bar--large c-bar--pink">問題 {{ totalquizNum + 1 }} ：
                                                            「{{ this.correct_title[this.index] }}」の和訳は次の3つのうちどれ？？
                                                            </h1>
                        <div v-if="showQuiz">
                            <div class="p-quiz__choice">
                                <ul>
                                    <li v-for="(pre_choice,index) in aChoice" :key="index" class="c-bar c-bar--gray" @click="showAnswer(pre_choice)">{{ pre_choice }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="p-quiz__explain" v-if="showExplain">
                        <h2 class="is-correct" v-if="judgment">
                                                                <i class="far fa-circle mr-4"></i>正解！
                                                            </h2>
                        <h2 class="is-uncorrect" v-else>
                                                                <i class="fas fa-times mr-4"></i>不正解
                                                            </h2>
                        <button @click="next()" type="button" class="btn btn-default">次へ</button>
                    </div>
                </section>
                <section class="p-quiz__empty-msg" v-if="alertMsg">
                    <p>
                                                            <i class="far mr-2 fa-lg fa-tired"></i>クイズはまだ登録されていません。
                                                            <i class="far fa-lg fa-tired"></i>
                                                        </p>
                    <a href="/quiz">クイズTOPへ</a>
                </section>
            </article>
            <quiz-result ref="result" :totalquizNum="totalquizNum" :totalCorrectNum="totalCorrectNum" @parentFunc="parentRetry">
            </quiz-result>
        </main>
    </template>
    <script>
    import QuizResult from "./QuizResult/QuizResult.vue";
    export default {
    name: "QuizContents",
    components: {
        QuizResult
    },
    data: function () {
        return {
            quizNum: 1,
            totalquizNum: 0,
            totalCorrectNum: 0,
            words: [],
            aChoice: [],
            showQuiz: true,
            showExplain: false,
            existImage: false,
            hidden: false,
            alertMsg: false,
            judgment: "",
            axiosUrl: "/axios",
            random: "",
            wordsLength: [],
            wordsLengthLatest: "",
            wordsLengthLatest2: "",
            randomLatest: "",
            randomLatest2: "",
            // dev
            answer: "",
            choice: "",
            correct: { '0': '', '1': '', '2': '', '3': '', '4': '', },
            correct_title: { '0': '', '1': '', '2': '', '3': '', '4': '', },
            incorrect: {'0': '','1': '', '2': '','3': '', '4': '',},
            incorrect2: {'0': '', '1': '', '2': '','3': '', '4': '',},
            pre_aChoice: [],
            pre_aChoice2: "",
            pre_choice_debag: "",
            index: [],
            array: ""
        };
    },
    created() {
        //DOM構築前にクイズデータをaxiosで取得(そうしないとエラーでる↓)
        // "TypeError: Cannot read property 'title' of undefined"
        this.getQuizzes();
    },
    methods: {
        getQuizzes: function () {
            axios
                .get(this.axiosUrl)
                .then(res => {
                    // this.words = res.data;
                    this.words.splice(0, this.words.length, ...res.data);
                    this.wordsLength = this.words.length;
                    //クイズがある時はDOMを表示しクイズがない場合は無いですメッセージを表示
                    if (this.wordsLength > 2) {
                        this.hidden = true;

                    } else {
                        this.alertMsg = true;
                    }
                    this.getChoice(this.quizNum - 1);
                }
                    )
                    .catch(error => {
                        console.log(error);
                    });
        },
        getChoice: function (index) {
            // this.index = index;
            this.$set(this.index, 0,index);
            this.random = Math.floor(Math.random() * this.wordsLength);
            // this.correct[index] = this.words[this.random].translation;
            this.$set(this.correct, this.index, this.words[this.random].translation);
            // this.correct_title = this.words[this.random].title;
            this.$set(this.correct_title, this.index, this.words[this.random].title);

            this.words.splice(this.random, 1);
            this.wordsLengthLatest = this.words.length;
            this.randomLatest = Math.floor(Math.random() * this.wordsLengthLatest);
            // this.incorrect[index] = this.words[this.randomLatest].translation;
            this.$set(this.incorrect, this.index, this.words[this.randomLatest].translation);

            this.words.splice(this.randomLatest, 1);
            this.wordsLengthLatest2 = this.words.length;
            this.randomLatest2 = Math.floor(Math.random() * this.wordsLengthLatest2);
            // this.incorrect2[index] = this.words[this.randomLatest2].translation;
            this.$set(this.incorrect2, this.index, this.words[this.randomLatest2].translation);

            this.words.splice(this.randomLatest2, 1);

            this.aChoice = [];
            if (this.index < 1) {
                this.pre_aChoice.push(
                    this.correct[index],
                    this.incorrect[index],
                    this.incorrect2[index]);
                this.aChoice = this.shuffleAry(this.pre_aChoice);
                this.aChoice.splice();
            } else {
                this.pre_aChoice.pop();
                this.pre_aChoice.pop();
                this.pre_aChoice.pop();
                this.pre_aChoice.push(
                    this.correct[index],
                    this.incorrect[index],
                    this.incorrect2[index]);
                this.aChoice = this.shuffleAry(this.pre_aChoice);
                this.aChoice.splice();
            }
            // this.aChoice = this.shuffleAry(this.pre_aChoice);
        },
        shuffleAry: function (array) {
            const ary = array.slice();
            for (let i = ary.Length - 1; 0 < i; i--) {
                let r = Math.floor(Math.random() * (i + 1));
                var tmp = ary[i];
                ary[i] = ary[r];
                ary[r] = tmp;
            }
            return ary
        },
        showAnswer: function (pre_choice) {
            this.showQuiz = !this.showQuiz; //false
            this.showExplain = !this.showExplain; //true
            // this.pre_choice_debag = pre_choice;
            if (this.correct[this.index] === pre_choice) {
                this.judgment = true;
                this.totalCorrectNum++;
            } else {
                this.judgment = false;
            }
        },
        next: function () {
            // if (this.totalquizNum < 6 && this.wordsLength > 2) {
            if (this.totalquizNum < 1) {
                this.showQuiz = true;
                this.showExplain = false;
                this.quizNum++;
                this.totalquizNum++;

                this.getChoice(this.totalquizNum);
            } else {
                this.showExplain = false;
                this.executeFromChild();
            }
        },
        executeFromChild: function(){
            this.$refs.result.showResult();
        },
        parentRetry:function() {
            this.hidden2 = false;
            this.showQuiz = true;
            this.showExplain = false;
            this.quizNum = 1;
            this.totalquizNum = 0;
            this.totalCorrectNum = 0;
            this.correct = [];
            this.incorrect = [];
            this.incorrect2 = [];
            this.pre_aChoice = [];
            this.getQuizzes();

        }
    }
};
    </script>

    <style scoped>
    </style>
