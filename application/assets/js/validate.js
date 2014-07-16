    $(document).ready(function () {

    $('#login').validate({ // initialize the plugin
        rules: {
            username: {
                required: true,
            },
            password: {
                required: true,
            }
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });