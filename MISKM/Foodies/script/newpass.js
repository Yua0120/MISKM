new Vue({
    el:'#app',
    data() {
        return {
          password: '',
          confirmPassword: '',
          isLengthError: false,
          isPasswordError: false
        };
      },
      methods: {
        checkInputLength() {
          const length = this.password.length;
          this.isLengthError = length < 8 || length > 16;
          this.checkPasswordMatch();
        },
        checkPasswordMatch() {
          this.isPasswordError = this.password !== this.confirmPassword;
        }
      }
});