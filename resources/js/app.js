import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

//const valueInputImage = document.querySelector('[name="image"]').value || ''

const dropzone = new Dropzone('#dropzone', {
  dictDefaultMessage: 'Sube aquí tu imagen',
  acceptedFiles: '.jpg, .jpeg, .png, .gif',
  addRemoveLinks: true,
  dictRemoveFile: 'Borrar archivo',
  maxFiles: 1,
  uploadMultiple: false,

  init: function() {
    if (document.querySelector('[name="image"]').value.trim()) {
      const imagePublish = {};
      imagePublish.size = 1234;
      imagePublish.name = document.querySelector('[name="image"]').value;

      this.options.addedfile.call(this, imagePublish);
      this.options.thumbnail.call(this, imagePublish, `/uploads/${imagePublish.name}`);
      imagePublish.previewElement.classList.add('dz-success', 'dz-complete');
    }
  }
});

dropzone.on('removedfile', function() {
  document.querySelector('[name="image"]').value = ''
});

dropzone.on('success', function(file, response) {
  document.querySelector('[name="image"]').value = response.image;
});
