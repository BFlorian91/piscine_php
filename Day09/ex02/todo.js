let button = document.getElementById("newTask");
let lst = document.getElementById("ft_list");
loadCookie();

button.onclick = () => { addTodo(prompt("Enter a new thing to do"))};

function createCookie() {
    let el = lst.firstChild;
    let str = '';
    while ((el !== null)) {
        if (typeof el.innerHTML !== 'undefined')
            str = el.innerHTML + '\\' + str;
        el = el.nextSibling;
    }
    document.cookie = 'todo=' + str + '; expires=Fri, 31 Dec 9999 23:59:59 GMT path=/;';
}

function removeDiv(el) {
    if (confirm("Do you really want to delete this element?")) {
        el.remove();
        createCookie();
    }
}

function addTodo(todo) {
    if (todo === null || todo == '')
        return false;
    let div = document.createElement('div');
    let id = parseInt(lst.firstChild.id);
    console.log(id);
    div.innerHTML = todo;
    div.onclick = () => { removeDiv(div); };
    if (!isNaN(id))
        div.id = id + 1;
    else
        div.id = 1;
    lst.insertBefore(div, lst.firstChild);
    createCookie(todo);
}

function loadCookie() {
    if (document.cookie.includes('todo=')) {
        let str = document.cookie.split(';');
        let cookie = str[0].split('=');
        if (cookie[0] == 'todo') {
            let todo = cookie[1].split('\\');
            for (i = 0; todo[i]; i++)
                addTodo(todo[i]);
        }
    }
}
