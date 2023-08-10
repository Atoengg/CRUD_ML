// show hide password

const passwordInput = document.querySelector("#password");
const eye = document.querySelector("#eye");

eye.addEventListener("click", function () {
  this.classList.toggle("bi-eye-slash-fill");
  const type =
    passwordInput.getAttribute("type") === "password" ? "text" : "password";
  passwordInput.setAttribute("type", type);
});

const password = document.querySelector("#password2");
const eye2 = document.querySelector("#eye2");

eye2.addEventListener("click", function () {
  this.classList.toggle("bi-eye-slash-fill");
  const type =
    password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);
});

//password validation

let passwordValid = document.querySelector(".password");

let helperText = {
  charLength: document.querySelector(".helper-text .length"),
  lowerCase: document.querySelector(".helper-text .lowercase"),
  upperCase: document.querySelector(".helper-text .Uppercase"),
  spesial: document.querySelector(".helper-text .spesial"),
};

passwordValid.addEventListener("keyup", function () {
  patternTest(pattern.charLength(), helperText.charLength);
  patternTest(pattern.lowerCase(), helperText.lowerCase);
  patternTest(pattern.upperCase(), helperText.upperCase);
  patternTest(pattern.spesial(), helperText.spesial);

  if (
    hasClass(helperText.charLength, "valid") &&
    hasClass(helperText.lowerCase, "valid") &&
    hasClass(helperText.upperCase, "valid") &&
    hasClass(helperText.spesial, "valid")
  ) {
    addClass(passwordValid.parentElement, "valid");
  } else {
    removeClass(passwordValid.parentElement, "valid");
  }
});

let pattern = {
  charLength: function () {
    if (passwordValid.value.length >= 8) {
      return true;
    }
  },
  lowerCase: function () {
    // lowercase
    let regex = /^(?=.*[a-z]).+$/;

    if (regex.test(passwordValid.value)) {
      return true;
    }
  },

  upperCase: function () {
    //upercase
    let regex = /^(?=.*[A-Z]).+$/;

    if (regex.test(passwordValid.value)) {
      return true;
    }
  },

  spesial: function () {
    let regex = /^(?=.*[0-9_\W]).+$/;

    if (regex.test(passwordValid.value)) {
      return true;
    }
  },
};

function removeClass(el, className) {
  if (el.classList) el.classList.remove(className);
  else
    el.className = el.className.replace(
      new RegExp("(^|\\b)" + className.split(" ").join("|") + "(\\b|$)", "gi"),
      " "
    );
}

function hasClass(el, className) {
  if (el.classList) {
    console.log(el.classList);
    return el.classList.contains(className);
  } else {
    new RegExp("(^| )" + className + "( |$)", "gi").test(el.className);
  }
}

function patternTest(pattern, response) {
  if (pattern) {
    addClass(response, "valid");
  } else {
    removeClass(response, "valid");
  }
}

function addClass(el, className) {
  if (el.classList) {
    el.classList.add(className);
  } else {
    el.className += " " + className;
  }
}
