new Vue({
  el: '#app',
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
    async submitForm() {
      // エラーチェック
      if (!this.isLengthError && !this.isMatchError) {
        try {
          // フォームデータの作成
          const formData = new FormData();
          formData.append('new_pass', this.password);

          // フォーム送信の処理
          const response = await fetch('newpass-output.php', {
            method: 'POST',
            body: formData
          });

          if (response.ok) {
            // パスワード保存が成功した場合
            const result = await response.text();
            // alert(result);
            window.location.href('Top.php');

            // リダイレクト等の追加処理があればここに追加
          } else {
            // サーバーからエラーレスポンスが返ってきた場合の処理
            alert('エラーが発生しました。');
          }
        } catch (error) {
          console.error('エラー:', error);
        }
      }
    }
  }
});