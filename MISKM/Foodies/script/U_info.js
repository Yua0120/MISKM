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
        // エラーがない場合、既存のニックネームを確認してからフォームを送信
        this.checkNicenameAndSubmit();
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
    checkNicenameAndSubmit: function () {
      // ここに既存のニックネームを確認する処理を追加
      // 仮に、既存のニックネームを確認する関数が checkExistingNicename という名前であると仮定
      if (this.checkExistingNicename()) {
        // 既存のニックネームが存在する場合はエラーメッセージを表示
        this.isNicenameError = true;
      } else {
        // 既存のニックネームが存在しない場合はフォームを送信
        document.querySelector('form').submit();
      }
    },
    checkExistingNicename: function () {
      // ここに既存のニックネームが存在するかどうかを確認する処理を追加
      // 仮に、既存のニックネームを取得する関数が getExistingNicename という名前であると仮定
      const existingNicename = this.getExistingNicename();
      return existingNicename === this.nicename.trim();
    },
    getExistingNicename: function () {
      // ここに既存のニックネームをデータベースから取得する処理を追加
      // 仮に、データベースからニックネームを取得する関数が getNicenameFromDatabase という名前であると仮定
      // 実際の処理は使用しているデータベースにより異なります
      return getNicenameFromDatabase();
    },
    validatePhoneNumber: function (phoneNumber) {
      // 仮の電話番号のバリデーション
      // ここに正確な電話番号のバリデーションを追加
      return phoneNumber.trim() !== '';
    },
    validatePostCode: function (postCode) {
      // 仮の郵便番号のバリデーション
      // ここに正確な郵便番号のバリデーションを追加
      return postCode.trim() !== '';
    }
  }
});