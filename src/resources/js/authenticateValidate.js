const { data } = require("autoprefixer");
const { default: axios } = require("axios");
const { result } = require("lodash");

new Vue({
    el: "#authenticateForm",
    data: {
        userName: "",
        registerEmail: "",
        loginEmail: "",
        password: "",
        passwordConfirm: "",
        userNameErrors: [],
        emailErrors: [],
        passwordErrors: [],
        passwordConfirmErrors: [],
        existsEmail: "",
        userNameValid: "",
        emailValid: "",
        passwordValid: "",
        passwordConfirmValid: "",
        registerButtonDisabled: true,
        loginButtonDisabled: true,
    },
    watch: {
        userName: function() {
            this.userNameErrors = [];
            this.userNameValid = "";
            maxValue = 225;

            if(!this.checkNotNull(this.userName)) {
                this.userNameErrors.push({
                    message: "名前は必ず入力してください。"
                })
            } else if(!this.checkMaxValue(this.userName, maxValue)) {
                this.userNameErrors.push({
                    message: "名前は、" + maxValue + "文字以下で入力してください。"
                });
            } else {
                this.userNameValid = "ok";
            }

            this.registerButtonJudge();
        },

        registerEmail: function() {
            this.emailValid = "";
            this.emailErrors = [];
            maxValue = 225;

            if(!this.checkNotNull(this.registerEmail)) {
                this.emailErrors.push({
                    message: "メールアドレスは必ず入力してください。"
                });
            } else if(!this.checkEmailFormat(this.registerEmail)) {
                this.emailErrors.push({
                    message: "メールアドレス形式で入力してください。"
                });
            } else if(!this.checkMaxValue(this.registerEmail, maxValue)) {
                this.emailErrors.push({
                    message: "メールアドレスは、" + maxValue + "文字以下で入力してください。"
                });
            } else if(this.emailErrors == 0) {
                // 　登録済みのメールアドレスかチェック
                axios.get('/api/check/userEmail/exists', {
                    params: {
                        email: this.registerEmail
                    }
                })
                .then(response => {
                    if(response.data == 1) {
                        this.emailErrors.push({
                            message: "このメールアドレスは、すでに登録されています。"
                        })
                    } else {
                        // 登録されていない場合は、submitを許可
                        this.emailValid = "ok";
                        this.registerButtonJudge();
                    }
                    console.log(response.data);
                })
            }

            this.registerButtonJudge();
        },

        loginEmail: function() {
            this.emailValid = "";
            this.emailErrors = [];
            maxValue = 225;

            if(!this.checkNotNull(this.email)) {
                this.emailErrors.push({
                    message: "メールアドレスは必ず入力してください。"
                });
            } else if(!this.checkEmailFormat(this.loginEmail)) {
                this.emailErrors.push({
                    message: "メールアドレス形式で入力してください。"
                });
            } else if(!this.checkMaxValue(this.loginEmail, maxValue)) {
                this.emailErrors.push({
                    message: "メールアドレスは、" + maxValue + "文字以下で入力してください。"
                });
            }  else {
                this.emailValid = "ok";
            }

            this.loginButtonJudge();
        },

        password: function() {
            this.passwordErrors = [];
            this.passwordValid = "";
            minValue = 8;

            if(!this.checkNotNull(this.password)) {
                this.passwordErrors.push({
                    message: "パスワードは、必ず入力してください。"
                });
            } else if(this.password.length > 0 && !this.checkMinValue(this.password, minValue)) {
                this.passwordErrors.push({
                    message: "パスワードは、" + minValue + "文字以上で入力してください。"
                });
            } else {
                this.passwordValid = "ok";
            }

            this.registerButtonJudge();
            this.loginButtonJudge();
        },

        passwordConfirm: function() {
            this.passwordConfirmErrors = [];
            this.passwordConfirmValid = "";

            if(!this.checkNotNull(this.passwordConfirm)) {
                this.passwordConfirmErrors.push({
                    message: "パスワード(確認確認用)は、必ず入力してください。"
                });
            } else if(this.passwordConfirm.length > 0 && !this.checkPasswordConfirm(this.passwordConfirm, this.password)) {
                this.passwordConfirmErrors.push({
                    message: "パスワードが一致しません。"
                });
            } else {
                this.passwordConfirmValid = "ok";
            }

            this.registerButtonJudge();
        }
    },
    methods : {
        // 入力必須のチェック
        checkNotNull: function (inputData) {
            var result = true;
            if (inputData == "") {
                result = false;
            }
            return result;
        },

        // メールアドレス形式のチェック
        checkEmailFormat: function (inputData) {
            var result = true;
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            result = re.test(inputData);
            return result;
        },

        // 最大文字数のチェック
        checkMaxValue: function(inputData, maxValue) {
            var result = true;

            if(inputData.length > maxValue) {
                result = false;
            }
            return result;
        },


        // 最低入力文字数チェック
        checkMinValue: function(inputData, minValue) {
            var result = true;

            if(inputData.length < minValue) {
                result = false;
            }
            return result;
        },

        // パスワード確認一致のチェック
        checkPasswordConfirm: function(inputData, password) {
            var result = true;

            if(inputData !== password) {
                result = false;
            }
            return result;
        },

        // register submit　button disable制御
        registerButtonJudge: function() {
            if(this.userNameValid == "ok" && this.emailValid == "ok" && this.passwordValid == "ok" && this.passwordConfirmValid == "ok") {
                this.registerButtonDisabled =  false;
            } else {
                this.registerButtonDisabled =  true;
            }
        },

        // login submit button disabled制御
        loginButtonJudge: function() {
            if(this.emailValid == "ok" && this.passwordValid == "ok") {
                this.loginButtonDisabled =  false;
            } else {
                this.loginButtonDisabled =  true;
            }
        },
    }
})
