// Function to select an element by its selector
function select(selector) {
  return document.querySelector(selector);
}

// Select the preloader element
let preloader = select('#preloader');

// If preloader exists, remove it once the window loads
if (preloader) {
  window.addEventListener('load', () => {
    preloader.remove();
  });
}

document.addEventListener('DOMContentLoaded', function () {
  var toastElement = document.getElementById('myToast');
  var toastTrigger = document.getElementById('showToastButton');
  var toast = new bootstrap.Toast(toastElement, {
      autohide: false // Disable auto-hide
  });

  // Ensure the toast is hidden on page load
  toastElement.classList.add('d-none');

  // Show the toast when the button is clicked
  toastTrigger.addEventListener('click', function () {
      toastElement.classList.remove('d-none'); // Show the toast
      toast.show();
  });

  // Handle the close button properly
  var closeButton = toastElement.querySelector('.btn-close');
  closeButton.addEventListener('click', function () {
      toast.hide();
      toastElement.classList.add('d-none'); // Hide the toast completely after closing
  });
});

$('.alert').alert();