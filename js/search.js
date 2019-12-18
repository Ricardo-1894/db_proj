jQuery.noConflict();
(
    function($) {
        const url = {
            search: 'include/search_process.php'
        };

        $("#search_form").submit(function(e){
            e.preventDefault();
            var search_select = document.getElementById("search_select").value;
            var search_text = document.getElementById("search_input").value;
            var action = search_select;

            $.ajax({
                url: url.search,
                type: 'post',
                data:{
                    action: action,
                    search_text: search_text
                }
            }).done(function(res){
                var content_wrapper = document.getElementById("content-wrapper");
                content_wrapper.style.visibility = 'hidden';
                console.log(res);
            }).fail(function(){

            });
        });
    }
)(jQuery);