/**
 * @author     (Haopeng Zhao <hz2151@nyu.edu>)
 */

jQuery.noConflict();

(function($) {
    const url = {
        fetch_request: 'include/application_process.php',
        delete_request: 'include/application_process.php'
    };

    var show_friend_apply_page = {
        init: function(){
            this.fetchRequests(url.fetch_request);
            this.bind();
        },

        bind: function() {
            this.send_agree_friend_request(url.delete_request);
        },

        fetchRequests: function(fetch_request_url) {
            $.ajax({
                    url: fetch_request_url,
                    method: 'POST',
                    data: {
                        action: 'fetch_friend_request'
                    },
                    success: function (res) {
                        res = JSON.parse(res);
                        document.getElementById('friend_apply_table').innerHTML = show_friend_apply_page.generate_request_table(res);
                        $('#zhaohaopeng').DataTable();
                    },
                    error: function(){
                        alert('HTTP request fail, internal error!');
                    }
                }
            );
        },

        generate_request_table: function(json_data) {
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
                    "                    <td><button type=\"button\" class=\"btn btn-primary\" data-mid = "+json_data[i]["uid"]+ ">Accept</button></td>\n" +
                    "                   </tr>";
                table_total += table_row;
            }

            table_total += table_tail_neighbor;
            return table_total;
        },

        send_agree_friend_request(send_request_url) {
            var me = this;
            $('#friend_apply_table').delegate('.btn-primary', 'click', function(){
                var target_id = $(this).data('mid');                 //should this 'this' need to use be me?
                $.ajax({
                    url: send_request_url,
                    method: 'POST',
                    data:{
                        action: 'agree_friend',
                        target_id: target_id
                    },
                    success: function() {
                        // res = JSON.parse(res);
                        alert('You are friends! Let\'s talk!');
                        me.fetchRequests(url.fetch_request);
                    },
                    error: function() {
                        alert('HTTP request fail, internal error!');
                    }
                });
            });
        }
    };

    $(function() {
            show_friend_apply_page.init();
        }
    );
})(window.jQuery);

