document.addEventListener('DOMContentLoaded', function () {
    new Vue({
        el: '#app',
        data: {
            name: '',
            nicename: '',
            phoneNumber: '',
            postCode: '',
            address: ''
        },
        methods: {
            submitForm: function () {
                if (this.validateForm()) {
                    // エラーがない場合、フォームを送信
                    document.querySelector('form').submit();
                } else {
                    // エラーがある場合、コンソールにエラーメッセージを表示
                    console.error('Validation failed');
                }
            },
            validateForm: function () {
                return this.name.trim() !== '' &&
                       this.nicename.trim() !== '' &&
                       this.validatePhoneNumber(this.phoneNumber) &&
                       this.validatePostCode(this.postCode) &&
                       this.address.trim() !== '';
            },
            validatePhoneNumber: function (phoneNumber) {
                // 仮の電話番号のバリデーション
                // ここに正確な電話番号のバリデーションを追加してください
                return phoneNumber.trim() !== '';
            },
            validatePostCode: function (postCode) {
                // 仮の郵便番号のバリデーション
                // ここに正確な郵便番号のバリデーションを追加してください
                return postCode.trim() !== '';
            }
            // 他に必要なメソッドやバリデーション関数があればここに追加してください
        }
    });
});