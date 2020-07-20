<template>
    <div class="container">
        <div class="row justify-content-center mt-5" v-if="$gate.isAdmin()">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Registered Users</h3>

                        <div class="card-tools">
                            <button class="btn btn-success" @click="newModal">Add New User <i class="fas fa-user-plus fa-fw"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Priviledge</th>
                                <th>Date Registered</th>
                                <th>Updated</th>
                                <th>Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='user in users.data' :key="user.id">
                                <td>{{user.id}}</td>
                                <td><img :src= "displayUser(user.photo)" class="img img-responsive" style="height: 50px"></td>
                                <td>{{user.name | upText}}</td>
                                <td><span class="tag tag-danger">{{user.username}}</span></td>
                                <td>{{user.email}}</td>
                                <td>{{user.category_id}}</td>
                                <td>{{user.created_at | humanDate}}</td>
                                <td>{{user.updated_at | humanDate}}</td>
                                <td>
                                    <a href="#">
                                        <i class="fa fa-edit blue" @click="editModal(user)"></i>
                                    </a>
                                    /
                                    <a href="#" @click="deleteUser(user.id)">
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
                        <pagination :data="users" @pagination-change-page="getResults"></pagination>
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
                        <h5 class="modal-title" v-show="!editmode" id="addNewLabel">New User</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form @submit.prevent="editmode ? updateUser() : createUser()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" v-model='form.name' name="name" placeholder="Name" class="form-control" :class="{ 'is-invalid':form.errors.has('name')}">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                            <div class="form-group">
                                <input type="text" v-model='form.username' name="username" placeholder="username" class="form-control" :class="{ 'is-invalid':form.errors.has('username')}">
                                <has-error :form="form" field="username"></has-error>
                            </div>
                            <div class="form-group">
                                <input type="email" v-model='form.email' name="email" placeholder="Email Address" class="form-control" :class="{ 'is-invalid':form.errors.has('email')}">
                                <has-error :form="form" field="email"></has-error>
                            </div>
                            <div class="form-group">
                                <input type="password" v-model='form.password' name="password" placeholder="Password" class="form-control" :class="{ 'is-invalid':form.errors.has('password')}">
                                <has-error :form="form" field="password"></has-error>
                            </div>
                            <div class="form-group">
                                <select name="option_id" id='option_id' v-model='form.option_id' class="form-control" :class="{ 'is-invalid':form.errors.has('option_id')}">
                                    <option value="">--Select Department Option--</option>
                                    <option value="1">Computer Engineering</option>
                                    <option value="2">Computer science with maths</option>
                                    <option value="3">Computer science with economics</option>
                                </select>
                                <has-error :form="form" field="option_id"></has-error>
                            </div>
                            <div class="form-group">
                                <select name="category_id" id='category_id' v-model='form.category_id' class="form-control" :class="{ 'is-invalid':form.errors.has('category_id')}">
                                    <option value="">--Select User Priviledge--</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Student</option>
                                </select>
                                <has-error :form="form" field="category_id"></has-error>
                            </div>
                            <div class="col-sm-9">
                              <input type="file" name='photo_id' class="form-control" id="photo_id" @change="createPhoto" placeholder="profile photo">
                              <has-error :form="form" field="photo_id"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmode" type="submit" class="btn btn-success">Update User</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Create User</button>
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
                photo: {},
                users : {},
                form: new Form({
                    id: '',
                    name : '',
                    username : '',
                    email : '',
                    option_id : '',
                    photo_id : '',
                    category_id : '',
                    password : '',
                })
            }
        },
        methods: {

            //pagination
            getResults(page = 1) {
                axios.get('api/user?page=' + page)
                .then(response => {
                    this.users = response.data;
                });
            },
            editModal(user) {
                this.editmode = true;
                this.form.errors.clear();
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
            },
            newModal() {
                this.editmode = false,
                this.form.reset();
                $('#addNew').modal('show')
            },
            createUser() {
                this.$Progress.start();
                this.form.post('api/user')
                .then(()=> {
                    Fire.$emit('AfterCreate')
                    $('#addNew').modal('hide')
                    toast.fire({
                        icon: 'success',
                        title: 'User Data successfully created'
                    });
                    this.$Progress.finish();
                })
                .catch(()=>{
                    this.$Progress.fail();
                })
            },
            createPhoto(e){
                let file = e.target.files[0];
                let reader = new FileReader();
                if (file['size'] < 2111775) {
                    reader.onloadend = (file) => {
                        // console.log('RESULT', reader.result)
                        this.form.photo = reader.result;
                    }
                    reader.readAsDataURL(file);
                } else {
                  swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'File size can\'t be more than 2MB'
                  })

                }
            },
            updateUser() {
                this.$Progress.start();
                this.form.put('api/user/' + this.form.id)
                .then(() => {
                    $('#addNew').modal('hide')
                    swal.fire(
                        'User Info Update',
                        'User Data has been Updated.',
                        'success'
                    )
                    Fire.$emit('AfterCreate');
                    this.$Progress.finish();
                })
                .catch (()=>{
                    this.$Progress.fail();
                })
            },
            deleteUser(id) {
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
                        this.form.delete('api/user/'+id).then(()=>{
                            swal.fire(
                                'Deleted',
                                'User Data has been deleted.',
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
            displayUser(name) {
                if(name) {
                    return name.file;
                } else {
                    return "";
                }
            },
            loadUsers() {
                if(this.$gate.isAdmin()) {
                    axios.get('api/user').then(({ data }) => {
                        this.users = data;
                    });
                }
            },
        },
        created() {
            this.loadUsers();
            Fire.$on('AfterCreate', () => {
                this.loadUsers();
            });
            // setInterval(() => this.loadUsers(), 3000);
        },
        
    }

    // meta: {
    //     progress: {
    //         func: [

    //             {call: 'color', modifier: 'temp', argument: 'rgb(143, 255, 199)'},
    //             {call: 'fail', modifier: 'temp', argument: '#6e0000'},
    //             {call: 'location', modifier: 'temp', argument: 'top'},
    //             {call: 'transition', modifier: 'temp', argument: {speed: '1.5s', opacity: '0.6s', termination: 422}}
    //         ]
    //     }
    // }
</script>
