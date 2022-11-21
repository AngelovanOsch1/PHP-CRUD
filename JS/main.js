// const dropdownToggle = document.getElementById("dropdownToggle");
// const dropdown = document.getElementById("dropdown");

// dropdownToggle.addEventListener("click", () => {
//   console.log(dropdown.style.display);

//   if (dropdown.style.display !== "flex") {
//     dropdown.style.display = "flex";
//   } else {
//     dropdown.style.display = "none";
//   }
// });

const dropdownQuestionToggle = document.querySelector(".tooltip-icon");
const dropdownQuestion = document.querySelector(".tooltip-body");

dropdownQuestionToggle.addEventListener("click", () => {
  if (dropdownQuestion.style.display !== "flex") {
    dropdownQuestion.style.display = "flex";
  } else {
    dropdownQuestion.style.display = "none";
  }
});

const inputForms = document.querySelectorAll(".input");
const profileText = document.querySelector("#profileText");
const JSvalid = document.querySelectorAll(".succes-js");
const JSinvalid = document.querySelectorAll(".error-js");
const ajaxMessage = document.getElementById("ajax-message");

const regex = /^[a-zA-Z0-9_\-.]*$/;
const regextelephoneNumber = /^[0-9]*$/;
const regexEmail = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
const regexPostalCode = /^[0-9]{4}[a-zA-Z]{2}$/;
const regexDate = /^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/;

var textError = document.querySelectorAll(".text-error");
  console.log(textError);

inputForms.forEach((inputForm) => {
  inputForm.addEventListener("input", validate);
});

profileText.addEventListener("keyup", letterCount);

function validate(e) {
  const target = e.target;

  var password = document.getElementById("password").value.trim();
  var confirmPassword = document.getElementById("repeatPassword").value.trim();

  if (target.name === "username") {
    if (target.value.length >= 10 || !target.value.trim().length || !regex.test(target.value)) {
      JSinvalid[0].style.display = "block";
      JSvalid[0].style.display = "none";
    } else {
      JSinvalid[0].style.display = "none";
      JSvalid[0].style.display = "block";
    }
  }

  if (target.name === "password") {
    if (
      target.value.length >= 10   ||
      target.value.length <= 4    ||
      !target.value.trim().length ||
      !regex.test(target.value)
    ) {
      JSinvalid[1].style.display = "block";
      JSvalid[1].style.display = "none";
    } else {
      JSinvalid[1].style.display = "none";
      JSvalid[1].style.display = "block";
    }
  }

  if (target.name === "repeatPassword") {
    if (password != confirmPassword) {
      JSinvalid[2].style.display = "block";
      JSvalid[2].style.display = "none";
      JSinvalid[1].style.display = "block";
      JSvalid[1].style.display = "none";
      textError[2].innerHTML = "Password does not match";
    } else {
      JSinvalid[2].style.display = "none";
      JSvalid[2].style.display = "block";
      JSinvalid[1].style.display = "none";
      JSvalid[1].style.display = "block";
      textError[2].innerHTML = "";
    }
  }

  if (target.name === "email") {
    if (!regexEmail.test(target.value)) {
      $("#ajax-message").text("");
      JSinvalid[3].style.display = "block";
      JSvalid[3].style.display = "none";
    } else {
      JSinvalid[3].style.display = "none";
      JSvalid[3].style.display = "block";

      emailValue = $(".checkEmailJS").val();
      $.ajax({
        type: "POST",
        url: "PHP/ajax_handler.php",
        data: {
          email_id: emailValue,
        },
        datatype: "text",
        success: function (response) {
          $("#ajax-message").text(response);
          if (response.includes("Email available")) {
             ajaxMessage.style.color = "#00FF00";
             JSinvalid[3].style.display = "none";
             JSvalid[3].style.display = "block";  
          } else {
             ajaxMessage.style.color = "#eb0400";
             JSinvalid[3].style.display = "block";
             JSvalid[3].style.display = "none";
          }
        },
      });
    }
  }

  if (target.name === "firstName") {
    if (!target.value.trim().length) {
      JSinvalid[4].style.display = "block";
      JSvalid[4].style.display = "none";
      textError[4].innerHTML = "Field cannot be empty";
    } else {
      JSinvalid[4].style.display = "none";
      JSvalid[4].style.display = "block";
      textError[4].innerHTML = "";
    }
  }

  if (target.name === "lastName") {
    if (!target.value.length) {
      JSinvalid[5].style.display = "block";
      JSvalid[5].style.display = "none";
      textError[5].innerHTML = "Field cannot be empty";
    } else {
      JSinvalid[5].style.display = "none";
      JSvalid[5].style.display = "block";
      textError[5].innerHTML = "";
    }
  }

  if (target.name === "dateOfBirth") {
    if (!regexDate.test(target.value) || !target.value.length) {
      JSinvalid[6].style.display = "block";
      JSvalid[6].style.display = "none";
    } else {
      JSinvalid[6].style.display = "none";
      JSvalid[6].style.display = "block";
    }
  }

  if (target.name === "postalcode") {
    if (!regexPostalCode.test(target.value) || !target.value.length) {
      JSinvalid[7].style.display = "block";
      JSvalid[7].style.display = "none";
    } else {
      JSinvalid[7].style.display = "none";
      JSvalid[7].style.display = "block";
    }
  }

  if (target.name === "city") {
    if (!target.value.trim().length) {
      JSinvalid[8].style.display = "block";
      JSvalid[8].style.display = "none";
      textError[8].innerHTML = "Field cannot be empty";
    } else {
      JSinvalid[8].style.display = "none";
      JSvalid[8].style.display = "block";
      textError[8].innerHTML = "";
    }
  }

  if (target.name === "streetName") {
    if (!target.value.length) {
      JSinvalid[9].style.display = "block";
      JSvalid[9].style.display = "none";
      textError[9].innerHTML = "Field cannot be empty";
    } else {
      JSinvalid[9].style.display = "none";
      JSvalid[9].style.display = "block";
      textError[9].innerHTML = "";
    }
  }

  if (target.name === "telephoneNumber") {
    if (target.value.length < 12 || target.value.length > 15) {
      JSinvalid[10].style.display = "block";
      JSvalid[10].style.display = "none";
    } else {
      if (!regextelephoneNumber.test(target.value)) {
        JSinvalid[10].style.display = "block";
        JSvalid[10].style.display = "none";
      } else {
        JSinvalid[10].style.display = "none";
        JSvalid[10].style.display = "block";
      }
    }
  }

  if (target.name === "school") {
    if (!target.value.length) {
      JSinvalid[11].style.display = "block";
      JSvalid[11].style.display = "none";
      textError[11].innerHTML = "Field cannot be empty";
    } else {
      JSinvalid[11].style.display = "none";
      JSvalid[11].style.display = "block";
      textError[11].innerHTML = "";
    }
  }

  if (target.name === "study") {
    if (!target.value.length) {
      JSinvalid[12].style.display = "block";
      JSvalid[12].style.display = "none";
      textError[12].innerHTML = "Field cannot be empty";
    } else {
      JSinvalid[12].style.display = "none";
      JSvalid[12].style.display = "block";
      textError[12].innerHTML = "";
    }
  }
}

function letterCount() {
  document.getElementById("letterCount").innerHTML =
    profileText.value.length + "/500";

  if (profileText.value.length >= 500) {
    JSinvalid[13].style.display = "block";
  } else {
    JSinvalid[13].style.display = "none";
  }
}
