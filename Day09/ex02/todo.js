var button = document.getElementById('new');
var lst = document.getElementById('ft_list');
loadCookie();

button.onclick = function () {addTodo(prompt('Enter new thing to do'))};

function removeDiv(elem) {
  if (confirm('Do you really want to delete this element?')) {
    elem.remove();
    createCookie();
  }
}

function createCookie() {
  var elem = lst.firstChild;
  var str = '';
  while((elem) !== null) {
    if (typeof elem.innerHTML !== 'undefined')
      str = elem.innerHTML + '\\' + str;
    elem = elem.nextSibling
  }
  document.cookie = 'todo=' + str + '; expires=Fri, 31 Dec 9999 23:59:59 GMT path=/;';
}

function addTodo(todo) {
  if (todo === null || todo == '')
    return false;
  var div = document.createElement('div');
  var id = parseInt(lst.firstChild.id);
  div.innerHTML = todo;
  div.onclick = function() {
    removeDiv(div);
  };
  if (!isNaN(id)) {
    div.id = id + 1;
  } else {
    div.id = 1;
  }
  lst.insertBefore(div, lst.firstChild);
  createCookie(todo);
}

function loadCookie() {
  if (document.cookie.includes('todo=')) {
    var str = document.cookie.split(';');
    var cookie = str[0].split('=');
    if (cookie[0] == 'todo') {
      var todos = cookie[1].split('\\');
      for (i = 0; todos[i]; i++)
      addTodo(todos[i]);
    }
  }
}
