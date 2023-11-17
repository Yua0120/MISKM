new Vue({
    el:'#app',
    data() {
        return {
          password: '',
          confirmPassword: '',
          isError: false,
          errorMessage: ''
        };
      },
      methods: {
        checkInput() {
          const passwordLength = this.password.length;
          const confirmPasswordLength = this.confirmPassword.length;
    
          this.isError = false;
          this.errorMessage = '';
    
          if (passwordLength < 8 || passwordLength > 16) {
            this.isError = true;
            this.errorMessage = 'パスワードは8文字以上16文字以下で入力してください。';
          } else if (this.password !== this.confirmPassword) {
            this.isError = true;
            this.errorMessage = 'パスワードが一致しません。';
          }
        }
    }
});