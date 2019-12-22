/**
 * @author     (Haopeng Zhao <hz2151@nyu.edu>)
 * send message to one person (one friend or neighbor)
 */

(function($) {
    const url = {
        friend_threads_all_funcs: "include/fetch_friends_or_neighbors_threads.php",
        send_single_msg: "include/send_single_msg.php"
    };

    var friend_threads_page = {
        init: function(){
            this.getFriendsFeed(url.friend_threads_all_funcs);
            //this.bind();
        },

        bind: function(){
            this.sendSingleMsg();
        },

        getFriendsFeed: function(friend_threads_url) {
            $.ajax({
                    url: friend_threads_url,
                    method: 'POST',
                    data: {
                        action: 'fetch_friend'
                    },
                    success: function (res) {
                        res = JSON.parse(res);
                        friend_threads_page.fillInMsg(res);
                    },
                    error: function(){
                        alert('HTTP request fail, internal error!');
                    }
                }
            );
        },

        fillInMsg: function(json_data) {
            var bt = baidu.template;
            var html_content = bt('msg_template', json_data);
            document.getElementById('all_threads').innerHTML = html_content;
        },

        sendSingleMsg: function(send_single_msg) {
            $.ajax({
                    url: send_single_msg,
                    method: 'POST',
                    data: {
                        action: 'send',
                        //textbody: '',
                        //threadid: ''
                    },
                    success:function(res) {
                        res = JSON.parse(res);
                        //update smg in front end
                    },
                    error: function() {
                        alert('HTTP request fail, internal error!');
                    }
                }
            );
        }
    };

    $(function () {
            friend_threads_page.init();
        }
    );
})(window.jQuery);