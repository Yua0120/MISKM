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
        // フォーム送信前にバリデーションを行う
        if (this.validateForm()) {
          // エラーがない場合、フォームを送信
          document.querySelector('form').submit();
        }
      },
      validateForm: function () {
        // 各フィールドのバリデーションを行う
        const isNameValid = this.name.trim() !== '';
        const isNicenameValid = this.nicename.trim() !== '';
        const isPhoneNumberValid = this.validatePhoneNumber(this.phoneNumber);
        const isPostCodeValid = this.validatePostCode(this.postCode);
        const isAddressValid = this.address.trim() !== '';
  
        // 各フィールドのバリデーション結果に基づいてエラーメッセージを表示・非表示を切り替える
        return isNameValid && isNicenameValid && isPhoneNumberValid && isPostCodeValid && isAddressValid;
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