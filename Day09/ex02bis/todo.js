$('document').ready(function () {

  var button = $('#new');
  var lst = $('#ft_list');
  loadCookie();

  button.click(function() {
    addTodo(prompt('Enter new thing to do'));
  });

  function removeDiv(elem) {
    if (confirm('Do you really want to delete this element?')) {
      elem.remove();
      createCookie();
    }
  }

  function addTodo(todo) {
    if (todo === null || todo == '')
      return false;
    var div = $('<div id='+ id +'>'+todo+'</div>');
    var id = parseInt(lst.children(':first').attr('id'));
    div.click(function() {
      removeDiv(div);
    });
    if (!isNaN(id))
      div.attr('id', id + 1);
    else
      div.attr('id', 1);
    div.prependTo(lst);
    createCookie(todo);
  }

  function createCookie() {
    var str = '';
	lst.find('*').each(function () {
      str = $(this).html() + '\\' + str;
	});
    document.cookie = 'todo=' + str + '; expires=Fri, 31 Dec 9999 23:59:59 GMT path=/;';
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

});
