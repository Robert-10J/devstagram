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