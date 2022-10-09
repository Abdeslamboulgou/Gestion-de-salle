<template>
    
    <div class="p-2 w-full">
         <label for="email">Your e-mail</label>
         <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none 
         focus:border-indigo-500 text-base px-4 py-2" placeholder="Email" type="email"
         v-model="form.email">
     </div>
        <div class="p-2 w-full">
         <label for="password">Password</label>
         <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none 
         focus:border-indigo-500 text-base px-4 py-2" placeholder="Password" type="password"
         v-model="form.password" name="password">
    </div>
    <div class="p-2 w-full mt-4">
           <button @click.prevent="loginUser" type="submit">Login</button>
    </div>
</template>
<script>
export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      errors: [],
    };
  },
  methods: {
    loginUser() {
      axios
        .post("/api/login", this.form)
        .then(() => {
          this.$router.push({ name: "home" });
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
};
</script>
