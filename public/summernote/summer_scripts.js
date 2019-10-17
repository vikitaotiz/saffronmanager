let tool = [
    [ 'style', [ 'style' ] ],
    [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
    [ 'fontname', [ 'fontname' ] ],
    [ 'fontsize', [ 'fontsize' ] ],
    [ 'color', [ 'color' ] ],
    [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
    [ 'table', [ 'table' ] ],
    [ 'insert', [ 'link'] ],
    [ 'view', [ 'undo', 'redo', 'fullscreen' ] ]
];


$(document).ready(function() {
    $('#about_client').summernote({
        toolbar: tool
    });
});

$(document).ready(function() {
    $('#description').summernote({
        toolbar: tool
    });
});

