$("#reset-password-form").validate({
    rules: {
        password_confirmation: {
            equalTo: "#password"
        }
    },
    messages: {
        password_confirmation: {
            equalTo: "Please enter the same password."
        }
    }
});
