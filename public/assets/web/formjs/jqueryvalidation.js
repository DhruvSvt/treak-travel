jn = jQuery.noConflict(true);
jn.validator.addMethod("gname", function(e, r) {
    return "Your Name" != jn("#gname").val() ? !0 : !1
}, "Please enter name"), 
jn.validator.addMethod("gcountry", function(e, r) {
    return "Country Name" != jn("#gcountry").val() ? !0 : !1
}, "Please enter country name"), 
jn.validator.addMethod("gquery", function(e, r) {
    return "Query" != jn("#gquery").val() ? !0 : !1
}, "Please enter query"), 
jn.validator.addMethod("gdates", function(e, r) {
    return "Date of Arrival" != jn("#gdates").val() ? !0 : !1
}, "Please enter date"), 
jn.validator.addMethod("gperson", function(e, r) {
    return "No of Person" != jn("#gperson").val() ? !0 : !1
}, "Please enter no of person"), 
 jn.validator.addMethod("gstay1", function(e, r) {
    return "Your Name" != jn("#gstay1").val() ? !0 : !1
}, "Please enter no of duration"),
jn().ready(function() {
    jn("#tmiform").validate({
        rules: {
            gname: {
                required: !0,
                gname: !0
            },

              gcountry: {
                required: !0,
                gcountry: !0
            },
            gemail: {
                required: !0,
                email: !0
                
            },

               gquery: {
                required: !0,
                gquery: !0
                
            },
            gno: {
                required: !0,
                number: !0,
                minlength: 10
            },
          
            gdates: {
                required: !0,
                gdates: !0
            },
            gperson: {
                required: !0,
                number: !0,
                gperson: !0
            },
            gstay: {
                required: !0,
                number: !0,
               
            },
         
            captcha: {
                required: !0,
                remote: "process.php"
            }
        },
        messages: {
            gname: {
                required: "Please enter name"
            },
            gemail: {
                required: "Please enter email id",
                email: "Please enter valid email id"
            },
           gcontact: {
                required: "Please enter contact number",
                number: "Please enter valid contact number",
                minlength: "Please enter atleast 10 digits"
            },
            gcountry: {
                required: "Please enter country name"
            },
            guery: {
                required: "Please enter query",
                minlength: "Please tell us your holiday requirement in detailed"
            },
            captcha: {
                required: "Please enter security code",
                remote: "Please enter valid security code"
            }
        },

        errorPlacement: function(error, element) {
        // don't add the error labels
        return true;
    }
    })
       
});

