import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
  dictDefaultMessage: 'Sube aquí tu imagen',
  acceptedFiles: '.jpg, .jpeg, .png, .gif',
  addRemoveLinks: true,
  dictRemoveFile: 'Borrar archivo',
  maxFiles: 1,
  uploadMultiple: false
});

dropzone.on('success', function(file, response) {
  document.querySelector('[name="image"]').nodeValue = response.image;
});

dropzone.on('error', function(file, message) {
  console.log(message);
});