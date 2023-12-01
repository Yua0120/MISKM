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

            // 各フィールドがエラーでないかどうかを返す
            return !this.isEmailError && !this.isLengthError && !this.isMatchError && !this.isQuestionError;
        },
        submitForm: function () {
            if (this.validateForm()) {
                // バリデーションが通過した場合、通常のHTMLフォームの送信を行う
                document.getElementById('appForm').submit();
            }
        },
        validateEmail: function (email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    }
});