new Vue({
    el: '#app',
    data: {
      name: '',
      nicename: '',
      phoneNumber: '',
      postCode: '',
      address: '',
      isNameError: false,
      isNicenameError: false,
      isPhoneNumberError: false,
      isPostCodeError: false,
      isAddressError: false,
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
        this.isNameError = this.name.trim() === '';
        this.isNicenameError = this.nicename.trim() === '';
        this.isPhoneNumberError = !this.validatePhoneNumber(this.phoneNumber);
        this.isPostCodeError = !this.validatePostCode(this.postCode);
        this.isAddressError = this.address.trim() === '';
  
        // エラーがないかどうかを返す
        return !(this.isNameError || this.isNicenameError || this.isPhoneNumberError || this.isPostCodeError || this.isAddressError);
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
      },
      // 他に必要なメソッドやバリデーション関数があればここに追加してください
    },
  });