    <template>
    <main id="quiz" class="l-section__wide">
        <article id="question" class="p-quiz">
            <section>
                <ul>
                    <li v-for="(word,key) in words" :key="key">{{ word }}</li>
                </ul>
                <br>
                <p>words:{{ words }}</p>
                <p>wordsLength:{{ wordsLength }}</p>
                <p>random:{{ random }}</p>
                <!-- <p>correct_id:{{ correct_id }}</p>
                <p>correct_title:{{ correct_title}}</p>
                <p>correct_translation:{{correct_translation }}</p> -->
                <p>correct:{{ correct }}</p>
                <!-- <p> wordsLengthLatest:{{ wordsLengthLatest }}</p>
                <p>randomLatest:{{ randomLatest}}</p> -->
                <p>incorrect:{{ incorrect}}</p>
                <!-- <p>incorrect_id:{{ incorrect_id }}</p>
                <p>incorrect_title:{{ incorrect_title }}</p>
                <p>incorrect_translation:{{ incorrect_translation }}</p> -->
                <p>incorrect2:{{ incorrect2}}</p>
                <!-- <p>incorrect_id2:{{ incorrect_id2 }}</p>
                <p>incorrect_title2:{{ incorrect_title2 }}</p>
                <p>incorrect_translation2:{{ incorrect_translation2 }}</p> -->
                <p>aChoice:{{ aChoice }}</p>
                <p>wordsLengthLatest2:{{ wordsLengthLatest2 }}</p>
                <p>randomLatest2:{{ randomLatest2 }}</p>
                <p>quizzes[0]:{{ quizzes[0] }}</p>
                <p>quizzes[1]:{{ quizzes[1] }}</p>
                <p>quizzes[this.quizNum - 1].correct.translation:{{ quizzes[this.quizNum - 1].correct.translation }}</p>

                <br>
                <br>
                <br>
                <div v-if="hidden">
                    <h1 class="c-bar c-bar--large c-bar--pink">問題 {{ quizNum }}：「{{ quizzes[quizNum - 1].correct.title }}」の和訳は次の3つのうちどれ？？</h1>
                    <div v-if="showQuiz">
                        <!-- <div v-if="quizzes[quizNum - 1].image_name">
                                <div class="p-quiz__img">
                                    <img :src="quizzes[quizNum - 1].image_name" alt="クイズ画像">
                                </div>
                            </div> -->
                        <div class="p-quiz__choice">
                            <ul v-for="(choice,key) in aChoice" :key="key">
                                <li class="c-bar c-bar--gray" @click="showAnswer(choice)">{{ choice }}</li>
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
                    <p>
                            <strong>解説：</strong>
                            {{ quizzes[quizNum - 1].explain_sentence }}
                        </p>
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

        <quiz-result ref="result" :totalCorrectNum="totalCorrectNum"></quiz-result>
    </main>
</template>

    <script>
    import QuizResult from "./QuizResult/QuizResult";
export default {
    name: "QuizContents",
    components: {
        QuizResult
    },
    data: function () {
        return {
            quizNum: 1,
            totalCorrectNum: 0,
            words: [],
            aChoice: [],
            quizzes: [
                {
                    correct: "",
            // correct_id: "",
            // correct_title: "",
            // correct_translation: "",
                    incorrect: "",
                    incorrect2: ""
                }
            ],
            showQuiz: true,
            showExplain: false,
            existImage: false,
            hidden: false,
            alertMsg: false,
            judgment: "",
            axiosUrl: "/axios",
            wordsLength: "",
            random: "",
            wordsLengthLatest: "",
            randomLatest: ""
        };
    },
    created() {
        //DOM構築前にクイズデータをaxiosで取得(そうしないとエラーでる↓)
        //"TypeError: Cannot read property 'title' of undefined"
        this.getQuizzes();
    },
    methods: {
        getQuizzes: function () {
            axios
                .get(this.axiosUrl)
                .then(res => {
                    this.words = res.data;
                    this.wordsLength = this.words.length;
                    //クイズがある時はDOMを表示しクイズがない場合は無いですメッセージを表示
                    if (this.quizzes) {
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
        shuffleAry: function (array) {
            const ary = array.slice();
            for (let i = ary.Length - 1; 0 < i; i--) {
                let r = Math.floor(Math.random() * (i + 1));
                [ary[i], ary[r]] = [ary[r], ary[i]];
            }
            return ary;
        },
        getChoice: function (index) {
            this.random = Math.floor(Math.random() * this.wordsLength);

            this.quizzes[index].correct = this.words[this.random];
            // this.correct_id = this.words[this.random].id;
            // this.correct_title = this.words[this.random].title;
            // this.correct_translation = this.words[this.random].translation;

            this.words.splice(this.random, 1);
            this.wordsLengthLatest = this.words.length;
            this.randomLatest = Math.floor(Math.random() * this.wordsLengthLatest);
            this.quizzes[index].incorrect = this.words[this.randomLatest];
            // this.incorrect_id = this.words[this.randomLatest].id;
            // this.incorrect_title = this.words[this.randomLatest].title;
            // this.incorrect_translation = this.words[this.randomLatest].translation;

            this.words.splice(this.randomLatest, 1);
            this.wordsLengthLatest2 = this.words.length;
            this.randomLatest2 = Math.floor(Math.random() * this.wordsLengthLatest2);
            this.quizzes[index].incorrect2 = this.words[this.randomLatest2];
            // this.incorrect_id2 = this.words[this.randomLatest2].id;
            // this.incorrect_title2 = this.words[this.randomLatest2].title;
            // this.incorrect_translation2 = this.words[this.randomLatest2].translation;

            this.aChoice = [];
            this.aChoice.push(
                this.quizzes[index].correct.translation,
                this.quizzes[index].incorrect.translation,
                this.quizzes[index].incorrect2.translation
            );
            this.aChoice = this.shuffleAry(this.aChoice);
        },
        showAnswer: function (choice) {
            this.showQuiz = !this.showQuiz; //false
            this.showExplain = !this.showExplain; //true

            let answer = this.quizzes[this.quizNum - 1].correct.translation;
            if (choice === answer) {
                this.judgment = true;
                this.totalCorrectNum++;
                this.$refs.totalCorrectNum;
            } else {
                this.judgment = false;
            }
        },
        next: function () {
            if (this.quizNum < this.totalQuizNum) {
                this.showQuiz = true;
                this.showExplain = false;
                this.quizNum++;
                this.nextCounter++;
                this.getChoice(this.quizNum - 1);
            } else {
                this.$refs.result.showResult();
            }
        }
    }
};
    </script>

    <style scoped>
    </style>
