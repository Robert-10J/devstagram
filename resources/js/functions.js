const buttonSharePost = document.getElementById('share-post')

buttonSharePost.addEventListener('click', async function () {
  return navigator.clipboard.writeText(window.location.href)
    .then(text => {
      return text
    })
    .catch(err => {
      alert('Error al copiar la direción', err)
    })
})