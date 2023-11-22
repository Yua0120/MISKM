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
                // バリデーションが通過した場合、Vue Routerを使用してページ遷移
                this.$router.push('/U_info.php'); // '/U_info.php' は実際の遷移先に合わせて変更してください
            }
        },
        validateEmail: function (email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    }
});