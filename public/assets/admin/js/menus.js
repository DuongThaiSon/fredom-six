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
           url: '/admin/menus/sort',
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
})