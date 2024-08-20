$(document).ready(function() {
    let $categoriesList = [];
    $(document).on('click', '#addCategory' ,function(e) {
        $('#selectMenuDiv').removeClass("hidden");
    });

    $(document).on('click', '#addConfirm', function(e) {
        if($('#selectMenu').val() != 0) {
            let $newCategory = '<div class="category flex row"><div class="text"><input type="hidden" name="categories[]" value="' + $('#selectMenu').val() +'">' + $('#selectMenu option:selected').text() + '</div><button name="delete" class="deleteCategory" type="button" class="px-2">&times;</button></div>';
            $('#selectedCategories').append($newCategory);
            $categoriesList.push($('#selectMenu').val());
            $("#selectMenu option[value='" + $('#selectMenu').val() + "']").remove();
            
            $('#selectMenuDiv').addClass("hidden");
        }
    });

    $(document).on('click', '.deleteCategory', function(e) {
        let $categories = $('.category'); // Getting all elements with the category class
        let $categoryText = $(this).closest('.category').find('.text').text().trim(); // Getting the text of the element without the 'x'

        let $index = $categories.filter(function() {
            return $(this).find('.text').text().trim() === $categoryText;
        }).index(); // Finding the position of the category in the selections

        let $value = $categoriesList[$index]; // value of the category to be closed 

        let $newOption = '<option value="' + $value + '">' + $categoryText + '</option>';

        let $select = $('#selectMenu').find('option'); // getting all options from the dropdown

        let insertIndex = $select.filter(function() {
            return parseInt($(this).val(), 10) > $value; // findIndex returns the index of the first result that satisfies this condition
        }).index();                                      // in this case, the value being higher than the value of the deleted option

        $($newOption).insertBefore($select.eq(insertIndex));

        $categoriesList.splice($index, 1); // deleting it from the categories array

        $(this).closest('.category').remove(); // removing the element
    });
});