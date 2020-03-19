$(document).ready(function(){
var base_url= base_url;	
	/*-----Seccion Perfil-----*/
	
	$('#perfil_data').validate({
		errorElement: "span", // contain the error msg in a span tag
		errorClass: 'help-block',
		   rules: {
                first_name: {
                    minlength: 2,
                    required: true
                },
                last_name: {
                    minlength: 2,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
					validaPass:true,
                    minlength: 8,
                },
                password_confirmation: {
                    minlength: 8,
                    equalTo: "#password"
                },
				new_pass:"validaPass",
            },
            messages: {
                first_name: "El campo Nombre es obligatorio",
                last_name: "Los apellidos son obligatorios",
                email: {
                    required: "Email necesario para loguear & contacto",
                    email: "Tu correo debe tener el formato name@domain.com"
                },
                password:"Minimo 8 caracteres",
                password_confirmation:{
					minlength:"Minimo 8 caracteres",
					equalTo:"Las contraseñas deben coincidir"
				},
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function (form) {
                // submit form
                form.submit();
            }
	});
	
		
	$.validator.addMethod("validaPass", function(value) {
			if($('#password').val()!='' || $('#password_confirmation').val()!='' || $('#new_pass').val()!='')
				{
					return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
					   && /[a-z]/.test(value) // has a lowercase letter
					   && /[A-Z]/.test(value) //has an uppercase letter
					   && /\d/.test(value) || /~!@#$%^&*_-+=[]\{}|;':",.<> /.test(value)
						// has a digit or special char
				}else{ return true;}
		},'No cumple con los requisitos de seguridad: 8 caracteres minimo (1Mayuscula,1Minuscula & Numero)');
	
	/*-----Seccion Perfil-----*/
});