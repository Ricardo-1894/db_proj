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
        getUrlParam: function (name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return unescape(r[2]);
            return null;
        },

        init: function(){
            let type = this.getUrlParam('type');

            switch (type){
                case "0":
                    document.getElementById("content_name").innerText = "Friends";
                    this.getFriendsFeed(url.friend_threads_all_funcs);
                    break;
                case "1":
                    document.getElementById("content_name").innerText = "Neighbors";
                    this.getNeighborsFeed(url.friend_threads_all_funcs);
                    break;
                case "2":
                    document.getElementById("content_name").innerText = "Block";
                    this.getBlockFeed(url.friend_threads_all_funcs);
                    break;
                case "3":
                    document.getElementById("content_name").innerText = "Hood";
                    this.getHoodFeed(url.friend_threads_all_funcs);
                    break;
                default: break;
            }
            this.bind(type);
        },

        bind: function(type){
            this.sendSingleMsg(url.send_single_msg, type);
        },

        getFriendsFeed: function(fetch_threads_url) {
            $.ajax({
                    url: fetch_threads_url,
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

        getNeighborsFeed: function(fetch_threads_url) {
            $.ajax({
                    url: fetch_threads_url,
                    method: 'POST',
                    data: {
                        action: 'fetch_neighbor'
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

        getBlockFeed: function(fetch_threads_url) {
            $.ajax({
                    url: fetch_threads_url,
                    method: 'POST',
                    data: {
                        action: 'fetch_block'
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

        getHoodFeed: function(fetch_threads_url) {
            $.ajax({
                    url: fetch_threads_url,
                    method: 'POST',
                    data: {
                        action: 'fetch_hood'
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

        sendSingleMsg: function(send_single_msg, type) {
            var me = this;
            $('#all_threads').delegate('.send-reply', 'click', function () {
                var textbody = $(this).parents('.reply-input').find('.reply-text').val();
                var thread_id =$(this).parents('.message-container').data('mid');
                $.ajax({
                        url: send_single_msg,
                        method: 'POST',
                        data: {
                            action: 'send',
                            textbody: textbody,
                            threadid: thread_id
                        },
                        success:function() {
                            switch (type){
                                case "0": me.getFriendsFeed(url.friend_threads_all_funcs); break;
                                case "1": me.getNeighborsFeed(url.friend_threads_all_funcs); break;
                                case "2": me.getBlockFeed(url.friend_threads_all_funcs); break;
                                default: me.getHoodFeed(url.friend_threads_all_funcs);break;
                            }
                        },
                        error: function() {
                            alert('HTTP request fail, internal error!');
                        }
                    }
                );
            });

        }
    };

    $(function () {
            friend_threads_page.init();
        }
    );
})(window.jQuery);