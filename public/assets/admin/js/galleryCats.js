$(document).ready(function(){
    let sortableOptions = {
        handle: ".connect",
        placeholder: "ui-state-highlight",
        forcePlaceholderSize: true,
        update: function() {
        let sort = $(this).sortable("toArray");
        console.log(sort);
        $.ajax({
            method: 'POST',
            url: '/admin/gallery-categories/sortcat',
            data: {
                sort: sort
            },
            success: function(){
                alert('SORTED');
            }
            });
        }
    }
        $( ".sortcat" ).sortable(sortableOptions);
        $('.delete-button').click(function(e){
                e.preventDefault();
                if (confirm('Bạn có chắc chắn muốn xóa?')){
                    var delete_id = $(this).attr('delete-id');
                    $.ajax({
                        url: '/admin/gallery-categories/' + delete_id,
                        async: true,
                        method: 'DELETE',
                        success: function(){
                        alert('DELETED');
                        }
                    });
                }
            });
    });
