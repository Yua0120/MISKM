new Vue({
  el: '#app',
  data: {
    name: '',
    nickname: '',
    phoneNumber: '',
    postCode: '',
    address: '',
    isNameError: false,
    isNicknameError: false,
    isPhoneNumberError: false,
    isPostCodeError: false,
    isAddressError: false
  },
  methods: {
    validateForm: function () {
      this.isNameError = this.name.trim() === '';
      this.isNicknameError = this.nickname.trim() === '';
      this.isPhoneNumberError = !this.validatePhoneNumber(this.phoneNumber);
      this.isPostCodeError = !this.validatePostCode(this.postCode);
      this.isAddressError = this.address.trim() === '';

      // エラーがないかどうかを返す
      return !(this.isNameError || this.isNicknameError || this.isPhoneNumberError || this.isPostCodeError || this.isAddressError);
    },
    validatePhoneNumber: function (phoneNumber) {
      // 仮の電話番号のバリデーション
      // ここに正確な電話番号のバリデーションを追加
      return phoneNumber.trim() !== '';
    },
    validatePostCode: function (postCode) {
      // 郵便番号のバリデーション（正確に7桁であること）
      return /^\d{7}$/.test(postCode.trim());
    }
  }
});