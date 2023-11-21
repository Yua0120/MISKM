document.addEventListener('DOMContentLoaded', function () {
    new Vue({
        el: '#app',
        data: {
            email: '',
            password1: '',
            password2: '',
            question: '',
            errors: []
        },
        methods: {
            validateForm: function () {
                this.errors = [];

                // メールの形式を検証
                if (!this.validateEmail(this.email)) {
                    this.errors.push('無効なメール形式です');
                }

                // パスワードの長さを検証
                if (this.password1.length < 8 || this.password1.length > 16) {
                    this.errors.push('パスワードは8文字から16文字である必要があります');
                }

                // パスワードの一致を検証
                if (this.password1 !== this.password2) {
                    this.errors.push('パスワードが一致しません');
                }

                // 秘密の質問が提供されているかを検証
                if (this.question.trim() === '') {
                    this.errors.push('秘密の質問が必要です');
                }

                if (this.errors.length === 0) {
                    // エラーがない場合、フォームを送信
                    document.querySelector('form').submit();
                }
            },
            validateEmail: function (email) {
                // 基本的なメールのバリデーションのための正規表現
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
        }
    });
});