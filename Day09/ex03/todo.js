$('document').ready(function () {

  var button = $('#new');
  var lst = $('#ft_list');
  loadItems();

  button.click(function() {
    item = addTodo(prompt('Enter new thing to do'));
		if (item !== false)
    	insertItem(item);
  });

  function removeDiv(item) {
    if (confirm('Do you really want to delete this itement?')) {
      item.remove();
      deleteItem(item);
    }
  }

  function addTodo(todo, id = null) {
    if (todo === null || todo == '')
      return false;
    var div = $('<div id='+ id +'>'+todo+'</div>');
    var idLast = parseInt(lst.children(':first').attr('id'));
    div.click(function() {
      removeDiv(div);
    });
		if (id !== null)
			div.attr('id', id);
    else if (!isNaN(idLast))
      div.attr('id', idLast + 1);
    else
      div.attr('id', 1);
    div.prependTo(lst);
		return div;
  }

  function insertItem(todo) {
    $.ajax({
		  type: 'GET',
	 		url: 'insert.php',
			data : {
				id : todo.attr('id'),
				txt : todo.html()
			}
		});
  }

  function deleteItem(item) {
    $.ajax({
		  type: 'GET',
	 		url: 'delete.php',
			data: {
				id: item.attr('id'),
			}
		});
  }

  function loadItems() {
    $.ajax({
		  type: 'GET',
	 		url: 'select.php',
			data: {
				action: 'select'
			},
			success: function(data) {
				for (i in data)
					addTodo(data[i][1], data[i][0]);
			},
			dataType:'json'
		});
  }
});
