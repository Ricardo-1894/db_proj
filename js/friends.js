/**
 * @author     (Haopeng Zhao <hz2151@nyu.edu>)
 * Show the list of all your friends
 */

jQuery.noConflict();

(function($) {
    const url = {
        fetch_friends: 'include/friend_process.php',
        //send_request: 'include/application_process.php'
    };

    var show_friends_page = {
        init: function() {
            this.fetchFriends(url.fetch_friends);
            this.bind();
        },

        bind:function() {
            //pass
        },

        fetchFriends: function(fetch_friend_url){
            $.ajax(
                {
                    url: url.fetch_friends,
                    method: 'POST',
                    data: {
                        action: 'fetch'
                    },
                    success: function(res){
                        res = JSON.parse(res);
                        document.getElementById('friend_table').innerHTML = show_friends_page.generate_friend_table(res);
                        $('zhaohaopeng').DataTable();
                    },
                    error: function(){
                        alert('HTTP request fail, internal error!');
                    }
                }
            );
        },

        generate_friend_table: function(json_data) {
            const table_header_neighbor = "<div class=\"card mb-3\">\n" +
                "          <div class=\"card-header\">\n" +
                "            <i class=\"fas fa-table\"></i>\n" +
                "            Search result</div>\n" +
                "          <div class=\"card-body\">\n" +
                "            <div class=\"table-responsive\">\n" +
                "<div id=\"dataTable_wrapper\" class=\"dataTables_wrapper dt-bootstrap4\"><div class=\"row\"><div class=\"col-sm-12\"><table class=\"table table-bordered dataTable\" id=\"zhaohaopeng\" width=\"100%\" cellspacing=\"0\" role=\"grid\" aria-describedby=\"dataTable_info\" style=\"width: 100%;\">\n" +
                "                <thead>\n" +
                "                  <tr role=\"row\"><th class=\"sorting_asc\" tabindex=\"0\" aria-controls=\"dataTable\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\" aria-label=\"Phone: activate to sort column descending\" style=\"width: 144px;\">Phone</th><th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTable\" rowspan=\"1\" colspan=\"1\" aria-label=\"Name: activate to sort column ascending\" style=\"width: 144px;\">Name</th><th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTable\" rowspan=\"1\" colspan=\"1\" aria-label=\"Block: activate to sort column ascending\" style=\"width: 160px;\">Block</th><th class=\"sorting_asc\" tabindex=\"0\" aria-controls=\"dataTable\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\" aria-label=\"Add: activate to sort column descending\" style=\"width: 144px;\">Add</th></tr>\n" +
                "                </thead>\n" +
                "                <tbody>";
            const table_tail_neighbor = "                </tbody>\n" +
                "              </table>\n" +
                "              </div>\n" +
                "              </div>\n" +
                "              </div>\n" +
                "            </div>\n" +
                "          </div>\n" +
                "        </div>";

            var table_total = table_header_neighbor;

            for(var i = 0; i < json_data["length"]; ++i) {
                var table_row =
                    "                  <tr role=\"row\" class=\"odd\">\n" +
                    "                    <td class=\"sorting_1\">"+ json_data[i]["uid"] +"</td>\n" +
                    "                    <td>"+json_data[i]["unickname"]+"</td>\n" +
                    "                    <td>"+json_data[i]["block_name"]+"</td>\n" +
                    "                    <td><button type=\"button\" class=\"btn btn-primary\" data-mid = "+json_data[i]["uid"]+ ">Delete</button></td>\n" +
                    "                   </tr>";
                table_total += table_row;
            }

            table_total += table_tail_neighbor;
            return table_total;
        },
    };

    $(function() {
        show_friends_page.init();
    });
})(window.jQuery);

