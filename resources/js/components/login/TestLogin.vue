<template>
  <v-container grid-list-xl text-center class="login-component">
    <v-layout wrap>
      <v-flex xs8 offset-xs2>
        <v-form ref="form" v-model="valid" lazy-validation>
          <v-text-field v-model="email" label="Email Address" outlined required></v-text-field>
        
          <v-text-field
            v-model="password"
            :append-icon="show ? 'visibility' : 'visibility_off'"
            :type="show ? 'text' : 'password'"
            :rules="inputRules"
            outlined
            label="Password"
            required
            @click:append="show = !show"
          ></v-text-field>

          <v-btn class="mr-4" @click="submit">submit</v-btn>
          <v-btn @click="clear">clear</v-btn>
        </v-form>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      valid: true,
      email: "",
      show: false,
      password: "",
      inputRules: [
        v => !!v || "This field is required",
        v => v.length >= 3 || "Minimum length is 3 characters"
      ]
    };
  },

  // data: () => ({
  //   valid: true,
  //   email: "",
  //   show: false,
  //   password: "",
  //   emailRules: [
  //     v => !!v || "E-mail is required",
  //     v => /.+@.+\..+/.test(v) || "E-mail must be valid"
  //   ],
  //   passwordRules: [
  //     v => !!v || "Password is required"
  //     //v => (v && v.length >= 6) || "Min 6 characters"
  //   ]
  // }),

  methods: {
    submit() {
      console.log("submited");
    },
    clear() {
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
</style>