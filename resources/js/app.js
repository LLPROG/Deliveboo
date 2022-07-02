

require('./bootstrap');
window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});

const alertWindow = document.getElementById("alert-window");
const alertScreen = document.getElementById("alert-screen");
const deleteButton = document.getElementById("delete-button");
const confirmationForm = document.getElementById("confirmation-form");
const cancelButton = document.getElementById("cancel-button");
const deleteButtonList = document.querySelectorAll(".delete-button");

if (deleteButton) {
    deleteButton.addEventListener("click", switchAlert);
    cancelButton.addEventListener("click", switchAlert);
}

if (deleteButtonList) {
    deleteButtonList.forEach((button) =>
        button.addEventListener("click", switchAlertAndSetFormAction)
    );
}

function switchAlertAndSetFormAction() {
    switchAlert();
    confirmationForm.action =
        confirmationForm.dataset.base + "/" + this.dataset.id;
    cancelButton.addEventListener("click", switchAlert);
}

function switchAlert() {
    alertWindow.classList.toggle("d-none");
    alertScreen.classList.toggle("d-none");
}

$('.form-element-input').change(function() {
  if($(this).val()) {
    $(this).addClass('hasValue');
  } else {
    $(this).removeClass('hasValue');
  }
});