document.addEventListener('DOMContentLoaded', function () {
    new Vue({
        el: '#app',
        data: {
            name: '',
            nicename: '',
            phoneNumber: '',
            postCode: '',
            address: '',
            errors: []
        },
        methods: {
            submitForm: function () {
                this.errors = [];

                // 各フィールドのバリデーションを行う（必要に応じて追加）

                if (this.name.trim() === '') {
                    this.errors.push('名前は必須です');
                }

                // 他のフィールドのバリデーションも同様に実装

                if (this.errors.length === 0) {
                    // エラーがない場合、フォームを送信
                    document.querySelector('form').submit();
                } else {
                    // エラーがある場合、コンソールにエラーメッセージを表示
                    console.error('Validation failed:', this.errors);
                }
            }
            // 他のメソッドやバリデーション関数があればここに追加
        }
    });
});