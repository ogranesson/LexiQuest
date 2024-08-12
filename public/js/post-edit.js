$(document).ready(function () {
    $(document).on('submit', 'form.delete-form', function(e) {
        let form = this;
        e.preventDefault();
    
        if(confirm('Are you sure you want to delete this post?')) {
            form.submit();
        }
    });
});