$(document).ready(function () {
    $(document).find('.edit-post').hide();

    $(document).on('click', '.edit', function (e) { 
        let container = $(this).closest('.post-container');
        let content = container.find('.post-content').text();

        container.find('.post-edit-text').val(content);

        container.find('.post').hide();
        container.find('.edit-post').show();
    });

    $(document).on('click', '.cancel', function (e) {
        let container = $(this).closest('.post-container');

        container.find('.post').show();
        container.find('.edit-post').hide();
    });

    $(document).on('submit', 'form.delete-form', function(e) {
        let form = this;
        e.preventDefault();
    
        if(confirm('Are you sure you want to delete this post?')) {
            form.submit();
        }
    });
});