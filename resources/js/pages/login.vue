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
                        v-model="email"
                        type="email"
                        label="E-mail Address"
                        class="mb-3"
                        :rules="[(v) => v && v.length > 0 || 'E-mail address is empty']"
                        :error="isInvalidLogin"
                        outline
                    />
                    <va-input
                        v-model="password"
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
                </div>
                <div class="mt-6 mb-6 ml-4 mr-4">
                    <va-button
                        @click="login"
                        :loading="isLoading"
                        block
                    >
                        Log in
                    </va-button>
                </div>
                <div class="flex justify-between">
                    <a href="#" class="va-link hover:underline ml-4 mr-4">Forgot password?</a>
                    <span class="text-right">
                        No account?
                        <a href="#" class="va-link hover:underline">Sign up now</a>
                    </span>
                </div>
                <div class="my-8 text-gray-400">
                    <va-divider orientation="center">
                        <span class="px-2">OR</span>
                    </va-divider>
                </div>
                
                <div class="mt-6 ml-4 mr-4">
                    <va-button
                        preset="secondary"
                        border-color="primary"
                        icon="facebook"
                        block
                       
                    >
                        Log in with Facebook
                    </va-button>
                </div>
            </div>
        </div>
    </div>
</template>



<script>
export default {
    data () {
        return {
            isPasswordVisible: false,
            isInvalidLogin: false,
            invalidLoginMessage: "Please check your e-mail/password and try again",
            isLoading: false,
            email: null,
            password: null,
            delay: 500,
            account: {}
        };
    },
    methods: {
        login() {
            this.isLoading = true;
            this.isInvalidLogin = false;

            axios({
                method: 'POST',
                type: 'JSON',
                url: '/login',
                data: {
                    email: this.email,
                    password: this.password,
                    user_type: this.account.user_type
                }
            }).then(response => {
                this.isLoading = false;

                if (response.data.status == 1) {
                    setTimeout(() => {
                        window.location = response.data.redirect;
                    }, this.delay);
                } else {
                    this.isInvalidLogin = true;
                    // this.$root.prompt(response.data.text);
                }
            }).catch(error => {
                this.isLoading = false;
                this.isInvalidLogin = true;

                // this.$root.prompt(error.response.data.message);
            });
        }
    }
}
</script>
