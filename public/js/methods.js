document.addEventListener('DOMContentLoaded', function () {
  const deleteButton = document.querySelector('#deleteButton');
  if (deleteButton) {
    deleteButton.addEventListener('click', setDeleteMethod);
  }
});

function setDeleteMethod(event) {
  event.preventDefault();

  const methodElement = document.querySelector('#method');
  methodElement.setAttribute('value', 'DELETE');

  const formElement = event.target.closest('form');
  formElement.setAttribute('action', formElement.action.replace('update', 'destroy'));

  formElement.submit();
}
