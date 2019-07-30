<template>
  <v-container grid-list-xl class="login-component">
    <v-layout wrap>
      <v-flex md8 offset-md2>
        <v-card class="login-container" outlined>
          <div class="login-title">Login</div>
          <!-- alert container -->
          <div class="alert-container" v-show="alertMessage">
            <v-alert type="error" transition="scale-transition">{{ alertMessage }}</v-alert>
          </div>
          <!-- /alert container -->

          <v-form ref="form" v-model="valid" lazy-validation>
            <!-- email input field  -->
            <v-text-field
              v-model="email"
              label="Email Address"
              outlined
              required
              @keydown="errorEmail = ''; alertMessage= ''"
              :error-messages="errorEmail ? errorEmail : ''"
            ></v-text-field>
            <!--/email input field  -->

            <!-- passwpord input field -->
            <v-text-field
              v-model="password"
              :append-icon="show ? 'visibility' : 'visibility_off'"
              :type="show ? 'text' : 'password'"
              outlined
              label="Password"
              required
              @keydown="errorPassword = ''; alertMessage= ''"
              :error-messages="errorPassword ? errorPassword : ''"
              @click:append="show = !show"
            ></v-text-field>
            <!-- /passwpord input field -->

            <div class="btn-container">
              <!-- login button -->
              <v-btn
                class="mr-4"
                rounded
                :loading="loading"
                color="primary"
                dark
                @click="submit"
              >Login</v-btn>
              <!-- /login button -->

              <!-- reset button -->
              <v-btn @click="clear" rounded>Reset</v-btn>
              <!-- /reset button -->
            </div>
          </v-form>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  data: () => ({
    valid: true,
    email: "",
    show: false,
    password: "",
    errorEmail: "",
    loading: false,
    errorPassword: "",
    alertMessage: ""
  }),

  methods: {
    submit() {
      this.loading = true;
      User.login(this.email, this.password)
        .then(response => {
          //console.log(response);
          this.alertMessage = "";
          this.loading = false;
        })
        .catch(error => {
          //console.log(error.response.errors);
          this.errorEmail = error.response.data.errors
            ? error.response.data.errors.email || ""
            : "";
          this.errorPassword = error.response.data.errors
            ? error.response.data.errors.password || ""
            : "";

          if (error.response.status === 401) {
            this.alertMessage = "Invalid login details, Please try again!";
          } else {
            this.alertMessage = "";
          }

          this.loading = false;
        });
    },
    clear() {
      this.alertMessage = "";
      this.errorEmail = "";
      this.errorPassword = "";
      this.$refs.form.reset();
    }
  },
  mounted() {
    console.log("Login component mounted.");
  }
};
</script>


<style>
.login-component {
  margin-top: 50px;
}

.login-title{
  text-align: left;
  padding-bottom: 5px;
  text-transform: uppercase;
  font-size: 17px;
}
.login-container {
  padding: 20px 10px;
}

.btn-container {
  text-align: end;
}
</style>