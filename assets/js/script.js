$(function() {

    $('#button-search').hide();

    $('#keyword').on('keyup', function() {
        
        $('#blog-container').load('../ajax/blog.php?keyword=' + $('#keyword').val());

    });






}); 