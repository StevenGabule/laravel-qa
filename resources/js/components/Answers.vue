<template>

    <div class="row mt-3" v-cloak v-if="count">

        <div class="col-md-12">

            <div class="card">

                <div class="card-body">

                    <div class="card-title">

                        <h2>{{ title }}</h2>

                    </div>

                    <hr>

                    <answer v-for="answer in answers" :answer="answer" :key="answer.id"></answer>

                </div><!-- end of card body -->

            </div><!-- end of card -->

        </div><!-- end of col-md-12 -->

    </div><!-- end of row -->

</template>


<script>
import Answer from './Answer.vue';

export default {
    props: ['answers', 'count'],
    computed: {
        title() {
            return this.count + " " + (this.count > 1 ? 'Answers' : 'Answer'); 
        }
    },
    components: { Answer}
}
</script>
