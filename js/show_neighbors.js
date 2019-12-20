jQuery.noConflict();
(
    function($){
        $(document).ready(function(){
            var url = {
                find_neighbor: 'include/neighbor_process.php'
            };

           $.ajax({
               url: url.find_neighbor,
               method: 'post',
               action: 'fetch'
           }).done(function(res){

           }).fail(function(){
              alert("Check your block registration information!");
              window.location = '../dashboard.php';
           });
        });
    }
)(jQuery);

