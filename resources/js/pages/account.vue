<template>
    <div class="">
        <va-form
        class="w-[300px]"
        tag="form"
        @submit.prevent="handleSubmit"
        >
        <va-input
            v-model="username"
            label="Username"
        />
    
        <va-input
            v-model="password"
            class="mt-3"
            type="password"
            label="Password"
        />
    
        <va-select
            v-model="value"
            class="mt-3"
            label="Role"
            :options="options"
            clearable
        />
    
        <va-button
            type="submit"
            class="mt-3"
        >
            Login
        </va-button>
        </va-form>
    </div>
  </template>
  
  <script>
  import navmenu from '@/components/narbar.vue';
  export default {
    components: {
        navigation: navmenu
    }
    ,
    data() {
      return {
        username: "",
        password: "",
        value: "",
        options: ["admin", "user"],
      };
    },
    methods: {
      handleSubmit() {
        alert("-- form submit --");
      },
    },
  };
  </script>
  

