<template>
    <div class="container">
        <div class="row justify-content-center mt-5" v-if="$gate.isAdmin()">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Registered Courses</h3>

                        <div class="card-tools">
                            <button class="btn btn-success" @click="newModal">Add New Course <i class="fas fa-user-plus fa-fw"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Code</th>
                                <th>Title</th>
                                <th>Unit</th>
                                <th>Prerequisite</th>
                                <th>Group</th>
                                <th>Dept.</th>
                                <th>Level</th>
                                <th>Semester</th>
                                <th>Description</th>
                                <th>Reg. Count</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='course in courses.data' :key="course.id">
                                <td>{{course.id}}</td>
                                <td>{{course.course_code}}</td>
                                <td><span class="tag tag-danger">{{course.course_title | upText}}</span></td>
                                <td>{{course.unit}}</td>
                                <td>{{course.prerequisite}}</td>
                                <td>{{course.group.name}}</td>
                                <td>{{course.option ? course.option.department : ""}}</td>
                                <td>{{course.part.level}}</td>
                                <td>{{course.session.semester}}</td>
                                <td>{{course.description}}</td>
                                <td>{{course.reg_count}}</td>
                                <td>{{course.created_at | humanDate}}</td>
                                <td>{{course.updated_at }}</td>
                                <!-- <td>{{course.group}}</td> -->
                                <td>
                                    <a href="#">
                                        <i class="fa fa-edit blue" @click="editModal(course)"></i>
                                    </a>
                                    /
                                    <a href="#" @click="deleteCourse(course.id)">
                                        <i class="fa fa-trash red"></i>
                                    </a>
                                
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <!-- Pagination function -->
                    <div class="card-footer">
                        <pagination :data="courses" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div >
        <div v-if="!$gate.isAdmin()">
            <not-found></not-found>
        </div>
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New Course</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Course</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form @submit.prevent="editmode ? updateCourse() : createCourse()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" v-model='form.course_code' name="course_code" placeholder="Course Code" class="form-control" :class="{ 'is-invalid':form.errors.has('course_code')}">
                                <has-error :form="form" field="course_code  "></has-error>
                            </div>
                            <div class="form-group">
                                <input type="text" v-model='form.course_title' name="course_title" placeholder="course_title" class="form-control" :class="{ 'is-invalid':form.errors.has('course_title')}">
                                <has-error :form="form" field="course_title"></has-error>
                            </div>
                            <div class="form-group">
                                <input type="number" v-model='form.unit' name="unit" placeholder="Unit" min="1" max="6" class="form-control" :class="{ 'is-invalid':form.errors.has('unit')}">
                                <has-error :form="form" field="unit"></has-error>
                            </div>
                            <div class="form-group">
                                <input type="text" name="prerequisite" v-model='form.prerequisite' placeholder="Prerequisite" class="form-control" :class="{ 'is-invalid':form.errors.has('prerequisite')}">
                                <has-error :form="form" field="prerequisite"></has-error>
                            </div>
                            <div class="form-group">
                                <select name="group_id" id='group_id' v-model='form.group_id' class="form-control" :class="{ 'is-invalid':form.errors.has('group_id')}">
                                    <option value="">--Select Course Group--</option>
                                    <option value="1">Special Elective (SE)</option>
                                    <option value="2">Restricted Elective (RE)</option>
                                    <option value="3">Core (C)</option>
                                </select>
                                <has-error :form="form" field="group_id"></has-error>
                            </div>
                            <div class="form-group">
                                <select name="option_id" id='option_id' v-model='form.option_id' class="form-control" :class="{ 'is-invalid':form.errors.has('option_id')}">
                                    <option value="">--Select Department Option--</option>
                                    <option value="1">Computer Engineering</option>
                                    <option value="2">Computer science with maths</option>
                                    <option value="3">Computer science with economics</option>
                                    <option value="4">General</option>
                                     <option value="5">with math and economics</option>
                                     <option value="6">with engineering and economics</option>
                                     <option value="7">with engineering and math</option>
                                </select>
                                <has-error :form="form" field="option_id"></has-error>
                            </div>

                            <div class="form-group">
                                <select name="part_id" id='part_id' v-model='form.part_id' class="form-control" :class="{ 'is-invalid':form.errors.has('part_id')}">
                                    <option value="">--Select Level--</option>
                                    <option value="1">Part 1</option>
                                    <option value="2">Part 2</option>
                                    <option value="3">Part 3</option>
                                    <option value="4">Part 4</option>
                                    <option value="5">Part 5</option>
                                </select>
                                <has-error :form="form" field="part_id"></has-error>
                            </div>
                            <div class="form-group">
                                <select name="session_id" id='session_id' v-model='form.session_id' class="form-control" :class="{ 'is-invalid':form.errors.has('session_id')}">
                                    <option value="">--Select The Semester--</option>
                                    <option value="1">Harmattan</option>
                                    <option value="2">Rain</option>
                                </select>
                                <has-error :form="form" field="session_id"></has-error>
                            </div>
                            <div class="form-group">
                                <input type="text" name="description" v-model='form.description' placeholder="Description" class="form-control" :class="{ 'is-invalid':form.errors.has('description')}">
                                <has-error :form="form" field="description"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmode" type="submit" class="btn btn-success">Update course</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Create course</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                editmode: false,
                courses : {},
                form: new Form({
                    id: '',
                    course_code : '',
                    course_title : '',
                    prerequisite : '',
                    unit : '',
                    group_id : '',
                    option_id : '',
                    part_id : '',
                    session_id : '',
                    description : '',
                })
            }
        },
        methods: {
            //pagination
            getResults(page = 1) {
                axios.get('api/course?page=' + page)
                .then(response => {
                    this.courses = response.data;
                });
            },
            editModal(course) {
                this.editmode = true;
                this.form.errors.clear();
                this.form.reset();
                $('#addNew').modal('show');
                console.log(this.form.session_id);    
                this.form.fill(course);
                
            },
            newModal() {
                this.editmode = false,
                this.form.reset();
                $('#addNew').modal('show')
            },
            createCourse() {
                this.$Progress.start();
                this.form.post('api/course')
                .then(()=> {
                    Fire.$emit('AfterCreate')
                    $('#addNew').modal('hide')
                    toast.fire({
                        icon: 'success',
                        title: 'course Data successfully created'
                    });
                    this.$Progress.finish();
                })
                .catch(()=>{
                    this.$Progress.fail();
                })
            },
            updateCourse() {
                this.$Progress.start();
                console.log(this.form.id)
                this.form.put('api/course/' + this.form.id)
                .then(() => {
                    $('#addNew').modal('hide')
                    swal.fire(
                        'Course Updated',
                        'Course Data has been Updated.',
                        'success'
                    )
                    Fire.$emit('AfterCreate');
                    this.$Progress.finish();
                })
                .catch (()=>{
                    this.$Progress.fail();
                })
            },
            deleteCourse(id) {
                swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    this.$Progress.start();
                    // send request to the server
                    if(result.value) {
                        this.form.delete('api/course/'+id).then(()=>{
                            swal.fire(
                                'Deleted',
                                'Course has been sucessfuly removed from your database',
                                'success'
                            )
                            this.$Progress.fail();
                            Fire.$emit('AfterCreate')
                        }).catch(()=>{
                            swal.fire("failed", "There was something wrong.", "warning");
                            this.$Progress.fail();
                        })
                    }
                })
            },
            loadCourses() {
                if(this.$gate.isAdmin()) {
                    axios.get('api/course').then(({ data }) => {
                        this.courses = data;
                        // console.log(this.courses[0].group);
                    });
                }
            },
        },
        created() {
            this.loadCourses();
            Fire.$on('AfterCreate', () => {
                this.loadCourses();
            });
            // setInterval(() => this.loadCourses(), 3000);
        },
        
    }
</script>

