<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                      <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane" id="activity">
                        <!-- Post -->
                        <div class="post">
                          <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="" alt="user image">
                            <span class="username">
                              <a href="#">Jonathan Burke Jr.</a>
                              <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                            </span>
                            <span class="description">Shared publicly - 7:30 PM today</span>
                          </div>
                          <!-- /.user-block -->
                          <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                          </p>
    
                          <p>
                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                            <span class="float-right">
                              <a href="#" class="link-black text-sm">
                                <i class="far fa-comments mr-1"></i> Comments (5)
                              </a>
                            </span>
                          </p>
    
                          <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                        </div>
                        <!-- /.post -->
    
                      </div>
                      <!-- /.tab-pane -->
    


                      <div class="tab-pane active" id="settings">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="name" class="form-control" v-model="form.name" :class="{ 'is-invalid':form.errors.has('name')}" id="name" placeholder="Name">
                                    <has-error :form="form" field="name"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" v-model="form.username" :class="{ 'is-invalid':form.errors.has('username')}" id="username" placeholder="username">
                                <has-error :form="form" field="username"></has-error>
                                </div>
                            </div>
                          <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control" id="email" v-model="form.email" :class="{ 'is-invalid':form.errors.has('email')}" placeholder="Email">
                              <has-error :form="form" field="email"></has-error>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="option_id" class="col-sm-3 col-form-label">Department Option</label>
                            <div class="col-sm-9">
                                <select name="option_id" id='option_id' v-model='form.option_id' class="form-control" :class="{ 'is-invalid':form.errors.has('option_id')}">
                                    <option value="">--Select Department Option--</option>
                                    <option value="1">Computer Engineering</option>
                                    <option value="2">Computer science with maths</option>
                                    <option value="3">Computer science with economics</option>
                                </select>
                                <has-error :form="form" field="option_id"></has-error>
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="photo_id" class="col-sm-3 col-form-label">Profile Photo</label>
                            <div class="col-sm-9">
                              <input type="file" name='photo_id' class="form-control" id="photo_id" accept="image/*" @change="updatePhoto" placeholder="profile photo">
                              <has-error :form="form" field="photo_id"></has-error>
                            </div>
                          </div>
                          <!-- <div class="form-group row">
                            <label for="passport" class="col-sm-12 col-form-label">Passport (Please leave empty if not changing)</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="passport" placeholder="Passport">
                            </div>
                          </div> -->
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-9">
                              <button type="submit"  @click.prevent="updateInfo" class="btn btn-success">Update</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
              </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
          
          return {
            photo: {},
              form: new Form({
                  id: '',
                  name : '',
                  username : '',
                  email : '',
                  option_id : '',
                  photo_id : '',
                  password : ''
              })
          }
        },
        methods: {
          displayPhoto(){
            if(this.photo) {
              return this.photo.file;
            } else {
              return "";
            }
          },
            updateInfo() {
                this.$Progress.start();
                this.form.put('api/profile')
                .then(()=> {
                  toast.fire({
                    icon: 'success',
                    title: 'User Data successfully Updated'
                  });
                  Fire.$emit('AfterUpdate');
                  this.$Progress.finish();
                })
                .catch(() => {this.$Progress.fail();})
            },
            updatePhoto(e){
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
            loadProfile() {
              axios.get("api/profile").then(({ data }) => {
                this.form.fill(data);
                this.photo = data.photo;
              });
            }
        },
        created() {
            this.loadProfile();
            Fire.$on('AfterUpdate', () => {
              this.loadProfile();
            });
        },
        
    }


</script>
