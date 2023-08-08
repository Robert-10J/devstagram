import Dropzone  from 'dropzone'

Dropzone.autoDiscover = false

const inputValue = document.querySelector('[name="imagen"]')

const dropzone = new Dropzone('#dropzone', {
  dictDefaultMessage: 'Sube aquí tu imagen',
  acceptedFiles: '.png, .jpg, .jpeg, .gif',
  addRemoveLinks: true,
  dictRemoveFile: 'Borrar Archivo',
  maxFiles: 1,
  uploadMultiple: false,
  init: function () {
    if(inputValue.value.trim()) {
      const imgPublicada = {}
      imgPublicada.size = 1234
      imgPublicada.name = inputValue.value

      this.options.addedfile.call(this, imgPublicada)
      this.options.thumbnail.call(this, imgPublicada, `/uploads/${imgPublicada.name}`)
      imgPublicada.previewElement.classlist.add('dz-succes', 'dz-complete')
    }
  }
})

dropzone.on("success", function (file, response) {
  console.log(inputValue.value = response.imagen)
})

dropzone.on('removedfile', function () {
  inputValue.value = ''
})