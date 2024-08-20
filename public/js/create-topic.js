$(document).ready(function() {
    var $categoriesList = [];
    $(document).on('click', '#addCategory' ,function(e) {
        $('#selectMenuDiv').removeClass("hidden");
    });

    $(document).on('click', '#addConfirm', function(e) {
        if($('#selectMenu').val() != 0) {
            var $newCategory = '<div class="category flex row"><div class="text">' + $('#selectMenu option:selected').text() + '</div><button name="delete" class="deleteCategory" type="button" class="px-2">&times;</button></div>';
            $('#selectedCategories').append($newCategory);
            $categoriesList.push($('#selectMenu').val());
            $("#selectMenu option[value='" + $('#selectMenu').val() + "']").remove();
            
            $('#selectMenuDiv').addClass("hidden");
        }
    });

    $(document).on('click', '.deleteCategory', function(e) {
        var $categories = $('.category'); // Getting all elements with the category class
        var $categoryText = $(this).closest('.category').find('.text').text().trim(); // Getting the text of the element without the 'x'

        var $index = $categories.filter(function() {
            return $(this).find('.text').text().trim() === $categoryText;
        }).index(); // Finding the position of the category in the selections

        var $value = $categoriesList[$index]; // value of the category to be closed 

        var $newOption = '<option value="' + $value + '">' + $categoryText + '</option>';

        var $select = $('#selectMenu').find('option'); // getting all options from the dropdown

        $select.eq($value).before($newOption); // placing the option back

        $categoriesList.splice($index, 1); // deleting it from the categories array

        $(this).closest('.category').remove(); // removing the element
    });
});