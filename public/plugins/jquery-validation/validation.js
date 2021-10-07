$(document).ready(function () {

    $('.validar').validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 8,
          maxlength: 16
        },
        terms: {
          required: true
        },
        name: {
          required: true,
          minlength: 3,
          maxlength: 25
        },
        surname: {
          required: true,
          minlength: 8,
          maxlength: 25
        },
        typeDocument: {
          required:true
        },
        document: {
          required: true,
          number: true,
          minlength: 8,
          maxlength: 10
        },
        birthdate: {
          required: true
        }
      },
      messages: {
        email: {
          required: "Debe digitar el correo electrónico",
          email: "Debe digitar un correo valido"
        },
        password: {
          required: "Debe digitar la contraseña",
          minlength: "Mínimo 8 caracteres",
          maxlength: "Máximo 16 caracteres"
        },
        name: {
          required: "Debe digitar el nombre",
          minlength: "Mínimo 3 caracteres",
          maxlength: "Máximo 25 caracteres"
        },
        surname: {
          required: "Debe digitar los apellidos",
          minlength: "Mínimo 8 caracteres",
          maxlength: "Máximo 25 caracteres"

        },
        typeDocument: {
          required: "Debe seleccionar el tipo de documento"
        },
        document: {
          required: "Debe digitar el número de documento",
          minlength: "Mínimo 8 dígitos",
          maxlength: "Máximo 10 digitos",
          number: "Solo puede digitar números"
        },
        birthdate: {
          required: "Debe introducir la fecha de nacimiento"
        },
        terms: "Por favor acepte los terminos y condiciones"
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });