$(document).ready(() => {
    $('#signup-submit').click(e => {
        e.preventDefault();
        let fname = $('#signup-fname').val(), lname = $('#signup-lname').val(), 
        email = $('#signup-email').val(), role = $('#signup-role').val(), 
        pass = $('#signup-password').val(), pass2 = $('#signup-pass2').val(),
        validation = fname == "" || lname == "" || email == "" || role == "none" || pass == "" || pass2 == "" || pass !== pass2;

        if(validation){
          alert("All fields are require and passwords must match");
        }
        else{
            $('#signup-submit').submit();
        }
    });
});