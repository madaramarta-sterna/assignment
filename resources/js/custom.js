window.toggleCommentForm = function () {
    let classList = document.getElementById('commentForm').classList;
        classList.toggle('visibleForm');
}

window.togglePassword = function() {
    let element = document.getElementById('password');
    if(element.type==='password') { element.type='text'; return }
    element.type='password';
}

