document.addEventListener('DOMContentLoaded', function () {
    new Vue({
        el: '#app',
        data: {
            email: '',
            password1: '',
            password2: '',
            question: '',
            isEmailError: false,
            isLengthError: false,
            isMatchError: false,
            isQuestionError: false
        },
        methods: {
            validateForm: function () {
                this.isEmailError = !this.validateEmail(this.email);
                this.isLengthError = this.password1.length < 8 || this.password1.length > 16;
                this.isMatchError = this.password1 !== this.password2;
                this.isQuestionError = this.question.trim() === '';

                if (!this.isEmailError && !this.isLengthError && !this.isMatchError && !this.isQuestionError) {
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