<template>
    <div class="h-screen">
      
        <va-navbar
        color="primary"
        style="position: sticky; top:0px; z-index: 1; padding-top: 19px; padding-bottom: 19px; height: 62px;"
        >
            <template #left>
                <va-navbar-item class="logo">
                    LOGO
                </va-navbar-item>
            </template>
        </va-navbar>
        <div class="mt-8 ml-8">
            <div class="" id="login-form-wrapper">
                <div>
                    <h5 class="va-text-primary flex-center">
                    Welcome, Wheels User!
                    </h5>
                </div>
                
                <h5 class="va-text-secondary flex-center mt-8">
                    Please sign in to continue
                </h5>
                <div class="flex-center ml-4 mr-4">
                    <va-input
                        v-model="account.email"
                        type="email"
                        label="E-mail Address"
                        class="mb-3"
                        :rules="[(v) => v && v.length > 0 || 'E-mail address is empty']"
                        :error="isInvalidLogin"
                        outline
                    />
                    <va-input
                        v-model="account.password"
                        :type="isPasswordVisible ? 'text' : 'password'"
                        label="Password"
                        class="mb-3 w-full"
                        :rules="[(v) => v && v.length > 0 || 'Password is empty']"
                        :error="isInvalidLogin"
                        :error-messages="invalidLoginMessage"
                        outline
                    >
                        <template #appendInner>
                            <va-icon
                                :name="isPasswordVisible ? 'visibility_off' : 'visibility'"
                                size="small"
                                color="--va-primary"
                                @click="isPasswordVisible = !isPasswordVisible"
                            />
                        </template>
                    </va-input>
                    <va-select
                        v-model="account.user_type"
                        class="mb-2 w-full"
                        :options="accountTypes"
                        outline
                        text-by="text"
                        value-by="value"
                    />
                </div>
                <div class="mt-6 mb-6 ml-4 mr-4">
                    <va-button
                        @click="login"
                        :loading="isLoading"
                        block
                    >
                        Create Account
                    </va-button>
                </div>
            </div>
    </div>
    </div>
</template>


<script>
import navmenu from '@/components/narbar.vue';
export default {
    components: {
        navigation: navmenu
    },
    data () {
        return {
            isPasswordVisible: false,
           
            isLoading: false,
            email: null,
            password: null,
            delay: 500,
            accountTypes: [
                { value: 0, text: "Student" },
                { value: 1, text: "Instructor" },
                { value: 2, text: "Secretary" },
                { value: 3, text: "Super Admin" }
            ],
            
            account: {}
        };
    },
    methods: {
        login() {
            this.isLoading = true;
            axios({
                method: 'POST',
                type: 'JSON',
                url: '/register/save',
                data: this.account
            }).then(response => {
                this.isEditLoading = false;
                if (response.data.status == 1) {
                    this.$root.prompt(response.data.text);
                    this.account = {};
                    this.isAccountVisible = false;
                    this.getAccounts();
                } else this.$root.prompt(response.data.text);
            }).catch(error => {
                this.isEditLoading = false;
                this.$root.prompt(error.response.data.message);
            });
        }
    }
}
</script>