
let deleteBtn = document.getElementById('delete');
let form = document.getElementById('deleteForm');


deleteBtn.addEventListener('click', (e)=> {
    e.preventDefault();
    if ( confirm('Are you sure?') ) {
        form.submit();
    }
});