/**
 * @author     (Haopeng Zhao <hz2151@nyu.edu>)
 * Show the list of all your neighbors
 */

//jQuery.noConflict();

(function($) {
    const url = {
        fetch_neighbors: 'include/neighbor_process',
        send_request: ''
    };

    var show_neighbors_page = {
        init: function(){
            this.fetchNeighbors(url.fetch_neighbors);
            this.bind();
        },

        bind: function() {
            this.send_add_friend_request(url.send_request);
        },

        fetchNeighbors: function(fetch_neighbors_url) {
            $.ajax({
                    url: fetch_neighbors_url,
                    method: 'POST',
                    data: {
                        action: 'fetch'
                    },
                    success: function (res) {
                        res = JSON.parse(res);
                        //$('#neighbor_table').innerHTML = show_neighbors_page.generate_neighbor_table(res);
                        document.getElementById('neighbor_table').innerHTML = show_neighbors_page.generate_neighbor_table(res);
                        $('#zhaohaopeng').DataTable();
                    },
                    error: function(){
                        alert('HTTP request fail, internal error!');
                    }
                }
            );
        },

        generate_neighbor_table: function(json_data) {
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
                var table_row = "                  <tr role=\"row\" class=\"odd\">\n" +
                    "                    <td class=\"sorting_1\">"+ json_data[i]["uid"] +"</td>\n" +
                    "                    <td>"+json_data[i]["unickname"]+"</td>\n" +
                    "                    <td>"+json_data[i]["block_name"]+"</td>\n" +
                    "                    <td><button type=\"button\" class=\"btn btn-primary\">Add</button></td>\n" +
                    "                   </tr>";
                table_total += table_row;
            }

            table_total += table_tail_neighbor;
            return table_total;
        },

        send_add_friend_request(send_request_url) {
            //pass
        }
    };

    $(function() {
            show_neighbors_page.init();
        }
    );
})(window.jQuery);

