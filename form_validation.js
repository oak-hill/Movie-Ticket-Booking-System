const patterns = {
    email: /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(.[a-z]{2,8})?$/,
    emailSign: /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(.[a-z]{2,8})?$/,
    name: /\w{3,}$/,
    password: /[\w@-]{8,20}$/i,
    passwordSign: /[\w@-]{8,20}$/i,
    mobile: /^[7-9]\d{9}$/,
};
const inputs = document.querySelectorAll("input");
// console.log(inputs);
for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('keyup', (e) => {
        validate(e.target, patterns[e.target.attributes.name.value]);
    });
}

function validate(field, regex) {
    if (regex.test(field.value)) {
        field.className = "valid";
    } else {
        field.className = "invalid";
    }
};