/*
 Project Name: UltraForm
 Project URI: http://wp.alithemes.com/html/ultraform/demos
 Description: UltraForm - Bootstrap 5 Multi-Purpose Form Templates
 Author: alithemes.com
 Author URI: http://alithemes.com
 Version: 1.0
 License: GNU General Public License v2 or later
 License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

(function ($) {
    "use strict";

    // Added AutoComplete Attribute Turned Off
    let disableAutoComplete = function () {
        var formControl = $(".ultraform .form-group .form-control");
        formControl.attr("autocomplete", "off");
    };

    // Email Validation
    let checkEmailInput = function () {
        var ultraformEmail = $("#uf-email");
        $.fn.ultraformEmailValidate = function () {
            var emailRegexp =
                /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return emailRegexp.test(String($(this).val()));
        };
        ultraformEmail.on("keyup", function () {
            var emailInputValue = $(this).val().trim();

            if (emailInputValue.length > 0) {
                let validate = $(this).ultraformEmailValidate();

                if (!validate === true) {
                    $(this)
                        .parent()
                        .find("span")
                        .removeClass("success")
                        .addClass("error");
                } else {
                    $(this)
                        .parent()
                        .find("span")
                        .removeClass("error")
                        .addClass("success");
                }
            } else {
                $(this).parent().find("span").removeAttr("class");
            }
        });
    };

    // Phone Validation
    let checkPhoneInput = function () {
        var ultraformPhone = $("#uf-phone");
        $.fn.ultraformPhoneValidate = function () {
            //var phoneRegexp = /^[0-9]+$/;
            var phoneRegexp =
                /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
            return phoneRegexp.test($(this).val());
        };
        ultraformPhone.on("keyup", function () {
            var phoneInputValue = $(this).val().trim();

            if (phoneInputValue.length > 0) {
                let validate = $(this).ultraformPhoneValidate();

                if (!validate === true) {
                    $(this)
                        .parent()
                        .find("span")
                        .removeClass("success")
                        .addClass("error");
                } else {
                    $(this)
                        .parent()
                        .find("span")
                        .removeClass("error")
                        .addClass("success");
                }
            } else {
                $(this).parent().find("span").removeAttr("class");
                $(this).parent().find("span").addClass("error");
            }
        });
    };

    // Check Empty Input
    let checkEmptyInput = function () {
        $(".form-control.not-empty").on("keyup", function () {
            var formInputValue = $(this).val().trim();

            if (formInputValue.length > 0) {
                $(this)
                    .parent()
                    .find("span")
                    .removeClass("error")
                    .addClass("success");
            } else {
                $(this).parent().find("span").removeAttr("class");
                $(this).parent().find("span").addClass("error");
            }
        });
    };

    // Check Compare Password
    let checkComparePassword = function () {
        //  password Variables
        let password1 = $("#uf-password");
        let password2 = $("#uf-retype-password");

        let comparePassword = function () {
            let pw1 = password1.val();
            let pw2 = password2.val();
            if (pw1 !== "" && pw1 == pw2) {
                return true;
            } else {
                return false;
            }
        };

        // Form Conttrol Captcha Validate
        password2.on("keyup", function () {
            if (comparePassword() == true) {
                $(this)
                    .parent()
                    .find("span")
                    .removeClass("error")
                    .addClass("success");
            } else {
                $(this).parent().find("span").removeAttr("class");
                $(this).parent().find("span").addClass("error");
            }
        });
    };

    //captCha
    let checkcaptCha = function () {
        //  Captcha Variables
        let textCaptcha = $("#txtCaptcha");
        let textCaptchaSpan = $("#txtCaptchaSpan");
        let textInput = $("#txtInput");

        // Generates the Random number function
        function randomNumber() {
            let num1 = Math.ceil(Math.random() * 9) + "",
                num2 = Math.ceil(Math.random() * 9) + "",
                num3 = Math.ceil(Math.random() * 9) + "",
                num4 = Math.ceil(Math.random() * 9) + "",
                num5 = Math.ceil(Math.random() * 9) + "",
                num6 = Math.ceil(Math.random() * 9) + "",
                code = num1 + num2 + num3 + num4 + num5 + num6;
            textCaptcha.val(code);
            textCaptchaSpan.html(code);
        }

        // // Called random number function
        randomNumber();

        // Validate the Entered input aganist the generated security code function
        function validateCaptcha() {
            let str1 = textCaptcha.val();
            let str2 = textInput.val();
            if (str1 == str2) {
                return true;
            } else {
                return false;
            }
        }

        // Form Conttrol Captcha Validate
        textInput.on("keyup", function () {
            if (validateCaptcha() == true) {
                $(this)
                    .parent()
                    .find("span")
                    .removeClass("error")
                    .addClass("success");
                $(":submit").removeAttr("disabled");
            } else {
                $(":submit").attr("disabled", true);
                $(this).parent().find("span").removeAttr("class");
                $(this).parent().find("span").addClass("error");
            }
        });
    };

    //Check On Register Submit
    let checkOnRegisterSubmit = function () {
        $("#ultraFormRegister").on("submit", function (event) {
            $(".form-alert").fadeOut("slow");
            $("html,body").scrollTop(0);
            let $this = $(this);
            let password1 = $("#uf-password").val();
            let password2 = $("#uf-retype-password").val();
            let textCaptcha = $("#txtCaptcha").val();
            let textInput = $("#txtInput").val();
            let termsCheckBox = $("#termsCheckBox").prop("checked");
            let inputNotEmpty = $(".form-control.not-empty").val().trim();
            let validatePhone = $("#uf-phone").ultraformPhoneValidate();
            let validateEmail = $("#uf-email").ultraformEmailValidate();
            let textFieldEmpty = "Please fill required fields";
            let textInvalidateEmail = "Email is invalid";
            let textInvalidatePhone = "Phone number is invalid";
            let textEmptyPassword = "Password can not empty";
            let textInvalidatePassword = "Password not same";
            let textInvalidateCaptcha = "Captcha is wrong, type again.";
            let textAcceptTerm = "Please accept the terms";

            if (inputNotEmpty == "") {
                $(".form-alert span").text(textFieldEmpty);
                $(".form-alert").fadeIn("slow");
                $(this).parent().find(".field-required span").addClass("error");
            } else if (!validateEmail === true) {
                $(".form-alert span").text(textInvalidateEmail);
                $(".form-alert").fadeIn("slow");
                $(".form-group.uf-email").find("span").addClass("error");
            } else if (!validatePhone === true) {
                $(".form-alert span").text(textInvalidatePhone);
                $(".form-alert").fadeIn("slow");
                $(".form-group.uf-phone").find("span").addClass("error");
            } else if (password1 == "") {
                $(".form-alert span").text(textEmptyPassword);
                $(".form-alert").fadeIn("slow");
                $(".form-group.uf-password").find("span").addClass("error");
            } else if (password1 != password2) {
                $(".form-alert span").text(textInvalidatePassword);
                $(".form-alert").fadeIn("slow");
                $(".form-group.uf-password").find("span").addClass("error");
            } else if (textCaptcha != textInput) {
                $(".form-alert span").text(textInvalidateCaptcha);
                $(".form-alert").fadeIn("slow");
                $(".form-group.uf-captcha").find("span").addClass("error");
            } else if (termsCheckBox == false) {
                $(".form-alert span").text(textAcceptTerm);
                $(".form-alert").fadeIn("slow");
            } else {
                $(".form-alert-success").show();
                $this.hide();
            }

            event.preventDefault();
        });
    };

    // //Check On Login Submit
    // let checkOnLoginSubmit = function() {
    //     $("#ultraFormLogin").on("submit", function(event) {
    //         $('.form-alert').fadeOut('slow');
    //         $('html,body').scrollTop(0);

    //         let $this         = $(this);
    //         let password       = $("#uf-password").val();
    //         let textCaptcha     = $("#txtCaptcha").val();
    //         let textInput       = $('#txtInput').val();
    //         let inputNotEmpty   = $(".form-control.not-empty").val().trim();
    //         let textFieldEmpty          = "Please fill required fields";
    //         let textEmptyPassword       = "Password can not empty";
    //         let textInvalidateCaptcha   = "Captcha is wrong, type again.";

    //         if (inputNotEmpty =='') {
    //             $(".form-alert span").text(textFieldEmpty);
    //             $(".form-alert").fadeIn('slow');
    //             $(this).parent().find(".field-required span").addClass("error");
    //         }
    //         else if (password == '') {
    //             $(".form-alert span").text(textEmptyPassword);
    //             $(".form-alert").fadeIn('slow');
    //             $(".form-group.uf-password").find("span").addClass("error");
    //         }

    //         else if (textCaptcha != textInput) {
    //             $(".form-alert span").text(textInvalidateCaptcha);
    //             $(".form-alert").fadeIn('slow');
    //             $(".form-group.uf-captcha").find("span").addClass("error");
    //         }
    //         else {
    //             $(".form-alert-success").show();
    //             $this.hide();
    //         }
    //         event.preventDefault();
    //     });
    // }

    //Check On Forget Password Submit
    let checkOnForgetSubmit = function () {
        $("#ultraFormForget").on("submit", function (event) {
            $(".form-alert").fadeOut("slow");
            $("html,body").scrollTop(0);
            let $this = $(this);
            let validateEmail = $("#uf-email").ultraformEmailValidate();
            let textInvalidateEmail = "Email is invalid";

            if (!validateEmail === true) {
                $(".form-alert span").text(textInvalidateEmail);
                $(".form-alert").fadeIn("slow");
                $(".form-group.uf-email").find("span").addClass("error");
            } else {
                $(".form-alert-success").show();
                $this.hide();
            }
            event.preventDefault();
        });
    };

    //Check On Contact Submit
    let checkOnContactSubmit = function () {
        $("#ultraFormContact").on("submit", function (event) {
            $(".form-alert").fadeOut("slow");
            $("html,body").scrollTop(0);

            let $this = $(this);
            let textCaptcha = $("#txtCaptcha").val();
            let textInput = $("#txtInput").val();
            let inputNotEmpty = $(".form-control.not-empty").val().trim();
            let textareaNotEmpty = $("#uf-message").val().trim();
            let validateEmail = $("#uf-email").ultraformEmailValidate();
            let selected = $("#uf-select").val().trim();
            let selectedNull = $("#uf-select").find("option").eq(0).val();
            let textFieldEmpty = "Please fill required fields";
            let textTextareaEmpty = "Message can not empty";
            let textInvalidateEmail = "Email is invalid";
            let textNotSelected = "Please select a department";
            let textInvalidateCaptcha = "Captcha is wrong, type again.";

            if (inputNotEmpty == "") {
                $(".form-alert span").text(textFieldEmpty);
                $(".form-alert").fadeIn("slow");
                $(this).parent().find(".field-required span").addClass("error");
            } else if (!validateEmail === true) {
                $(".form-alert span").text(textInvalidateEmail);
                $(".form-alert").fadeIn("slow");
                $(".form-group.uf-email").find("span").addClass("error");
            } else if (selected == selectedNull) {
                $(".form-alert span").text(textNotSelected);
                $(".form-alert").fadeIn("slow");
            } else if (textareaNotEmpty == "") {
                $(".form-alert span").text(textTextareaEmpty);
                $(".form-alert").fadeIn("slow");
                $(this).parent().find(".field-required span").addClass("error");
            } else if (textCaptcha != textInput) {
                $(".form-alert span").text(textInvalidateCaptcha);
                $(".form-alert").fadeIn("slow");
                $(".form-group.uf-captcha").find("span").addClass("error");
            } else {
                $(".form-alert-success").show();
                $this.hide();
            }

            event.preventDefault();
        });
    };

    //Load functions
    $(document).ready(function () {
        disableAutoComplete();
        checkEmptyInput();
        checkEmailInput();
        checkPhoneInput();
        checkComparePassword();
        checkcaptCha();
        checkOnRegisterSubmit();
        checkOnLoginSubmit();
        checkOnForgetSubmit();
        checkOnContactSubmit();
    });
})(jQuery);
