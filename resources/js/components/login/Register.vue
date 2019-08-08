<template>
  <v-container grid-list-xl class="register-component">
    <v-layout wrap>
      <v-flex md8 offset-md2>
        <v-card class="register-container" outlined>
          <div class="register-title">Register</div>
          <!-- alert container -->
          <div class="alert-container" v-show="alertMessage">
            <v-alert type="error" transition="scale-transition">{{ alertMessage }}</v-alert>
          </div>
          <!-- /alert container -->

          <v-form ref="form" v-model="valid" lazy-validation>
            <!-- name input field  -->
            <v-text-field
              v-model="formData.name"
              label="Full Name"
              outlined
              required
              @keydown="errorName = ''; alertMessage= ''"
              :error-messages="errorName ? errorName : ''"
            ></v-text-field>
            <!--/name input field  -->

            <!-- email input field  -->
            <v-text-field
              v-model="formData.email"
              label="Email Address"
              outlined
              required
              @keydown="errorEmail = ''; alertMessage= ''"
              :error-messages="errorEmail ? errorEmail : ''"
            ></v-text-field>
            <!--/email input field  -->

            <!-- passwpord input field -->
            <v-text-field
              v-model="formData.password"
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

            <!-- confirm passwpord input field -->
            <v-text-field
              v-model="formData.confimPassword"
              :append-icon="show ? 'visibility' : 'visibility_off'"
              :type="show ? 'text' : 'password'"
              outlined
              label="Confirm password"
              required
              @keydown="errorPassword = ''; alertMessage= ''"
              :error-messages="errorPassword ? errorPassword : ''"
              @click:append="show = !show"
            ></v-text-field>
            <!-- /confirm passwpord input field -->

            <div class="btn-container">
              <!-- login button -->
              <v-btn
                class="mr-4"
                rounded
                :loading="loading"
                color="primary"
                dark
                @click="submit"
              >Register</v-btn>
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
    formData: {
      name: "",
      email: "",
      password: "",
      confimPassword: ""
    },
    show: false,
    errorName: "",
    errorEmail: "",
    errorPassword: "",
    alertMessage: "",
    loading: false
  }),

  methods: {
    submit() {
      this.loading = true;
      User.register(this.formData)
        .then((response) => {

          //check for successful user creation
          if(response.status === 200){
            //redirect to the dashboard page
          }
          this.loading = false;
          console.log(response);

        }).catch((error) => {
          //check for validation errors
          this.errorName = error.response.data.errors.name || "";
          this.errorEmail = error.response.data.errors.email || "";
          this.errorPassword = error.response.data.errors.password || "";
          this.loading = false;
        });
    },
    clear() {
      this.alertMessage = "";
      this.errorName = "";
      this.errorEmail = "";
      this.errorPassword = "";
      this.errorConfirmPassword = "";
      this.$refs.form.reset();
    }
  },
  mounted() {
    console.log("Register component mounted.");
  }
};
</script>


<style>
.register-component {
  margin-top: 50px;
}

.register-title {
  text-align: left;
  padding-bottom: 5px;
  text-transform: uppercase;
  font-size: 17px;
}
.register-container {
  padding: 20px 10px;
}

.btn-container {
  text-align: end;
}
</style>