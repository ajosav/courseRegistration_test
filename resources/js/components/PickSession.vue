<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <h3>Select an Option</h3>
                    <form class="form-vertical">
                        <div class="form-group">
                            <select name="semester" v-model="form.semester" id='group_id' class="form-control" :class="{ 'is-invalid':form.errors.has('semester')}">
                                <option value="">--Semester--</option>
                                <option v-for="session in session" :key="session.id" value="session.id">{{session.semester}}</option>
                            </select>
                            <has-error :form="form" field="semester"></has-error>
                        </div>
                        <div class="form-group">
                            <select name="option_id" v-model='form.level' id='option_id' class="form-control" :class="{ 'is-invalid':form.errors.has('option_id')}">
                                <option value="">--Level--</option>
                                <option v-for="level in level" :key="level.id" value="session.id">Part {{level.id}}</option>
                            </select>
                            <has-error :form="form" field="option_id"></has-error>
                        </div>
                        <div class="form-group">
                            <div class="float-right">
                                <button type="submit"  @click.prevent="recommend" class="btn btn-success">submit</button>
                            </div>
                        </div>

                    </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
        return {

            session : {},
            level : {},
            form: new Form({
                semester: '',
                level: ''
            })
        }
        },
        methods: {
            loadSession() {
                axios.get('api/courserec').then(({ data }) => {
                    this.session = data.session;
                    this.level = data.level;
                });
            },

            recommend() { 
                this.$Progress.start();
                this.form.post('api/courserec')
                .then((response)=> {
                    console.log(response.header);
                    this.$Progress.finish();
                })
                .catch((response)=>{
                    console.log(response);
                    this.$Progress.fail();
                })
            }
        },
         created() {
            this.loadSession();
        },
    }
</script>
