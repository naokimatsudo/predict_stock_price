<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form v-on:submit.prevent="submit">
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">Email</label>
                        <input type="text" class="col-sm-9 form-control" id="user_email" v-model="user.email">
                    </div>
                    <div class="form-group row">
                        <label for="person-in-charge" class="col-sm-3 col-form-label">Password</label>
                        <input type="password" class="col-sm-9 form-control" id="user_password" v-model="user.password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
      data: function () {
          return {
              user: {}
          }
      },
      methods: {
          submit() {
              axios.post('/api/login', this.user)
                  .then((res) => {
                    //以下あとで直す
                    console.log(res);
                      this.$router.push({name: 'task.list'});
                  })
                  .catch((res) => {
                    console.log(res);
                    console.log('request fail');
                  });
          }
      }
  }
</script>