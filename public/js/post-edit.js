$(document).ready(function () {
    $(document).on('click', '.edit', function (e) { 
        let content = $(this).closest('.post-container').find('.post-content').text();
        $(this).closest('.post-container').find('.post-edit-text').val(content);

        $(this).closest('.post-container').find('.post').removeClass('visible');
        $(this).closest('.post-container').find('.post').addClass('hidden');

        $(this).closest('.post-container').find('.edit-post').removeClass('hidden');
        $(this).closest('.post-container').find('.edit-post').addClass('visible');
    });

    $(document).on('click', '.cancel', function (e) {
        $(this).closest('.post-container').find('.post').removeClass('hidden');
        $(this).closest('.post-container').find('.post').addClass('visible');

        $(this).closest('.post-container').find('.edit-post').removeClass('visible');
        $(this).closest('.post-container').find('.edit-post').addClass('hidden');
    });

    $(document).on('submit', 'form.delete-form', function(e) {
        let form = this;
        e.preventDefault();
    
        if(confirm('Are you sure you want to delete this post?')) {
            form.submit();
        }
    });
});