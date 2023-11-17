new Vue({
    el:'#app',
    data() {
        return {
          password: '',
          confirmPassword: '',
          isLengthError: false,
          isMatchError: false
        };
      },
    methods: {
        checkInput() {
          const passwordLength = this.password.length;
    
          // パスワードの長さに関するエラーチェック
          this.isLengthError = passwordLength < 8 || passwordLength > 16;
    
          // パスワードが一致しているかのエラーチェック
          this.isMatchError = this.password !== this.confirmPassword;
        },
        submitForm() {
            // エラーチェック
            if (!this.isLengthError && !this.isMatchError) {
              // フォーム送信の処理はformタグのaction属性に指定されたページ(newpass-output.php)に自動的にリダイレクトされる
              // この例では何も行わない
            }
          }
    }
});