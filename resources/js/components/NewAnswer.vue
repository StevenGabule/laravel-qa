<template>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3>Your answer</h3>
                    </div>
                    <hr>
                    <form @submit.prevent="create">

                        <div class="form-group">

                        <textarea name="body" id="body" rows="7" class="form-control" required v-model="body"></textarea>

                        </div><!-- end of form-group --> 

                        <div class="form-group">
                            <button type="submit" :disabled="isInvalid" class="btn btn-lg btn-outline-primary">Submit</button>
                        </div>
                    </form><!-- end of form -->
                    
                </div><!-- end of card body -->
            </div><!-- end of card -->
        </div><!-- end of col-md-12 -->
    </div><!-- end of row -->
</template>


<script>
export default {
    
    props: ['questionId'],

    methods: {
        create() {
            axios.post(`/questions/${this.questionId}/answers`, {
                body: this.body
            })
            .catch(error => {
                this.$toast.error(error.response.data.message, "Error");
            })
            .then(({data}) => {
                this.$toast.success(data.message, "Success");
                this.body = '';
                this.$emit('created', data.answer);
            });
        }
    },

    data () {
        return {
            body: ''
        }
    },

    computed: {
        isInvalid() {
            return !this.signedIn || this.body.length < 10;
        }
    }

}
</script>
